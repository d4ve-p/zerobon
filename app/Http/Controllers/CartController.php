<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartUserVouchers;
use App\Models\PendingPurchase;
use App\Models\PendingPurchaseItem;
use App\Models\Product;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CartController extends Controller
{
    function addToCart(Request $request): RedirectResponse {
        $user = Auth::user();

        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id] 
        );

        $productId = $request->input('item_id');
        $quantity = $request->input('item_number');

        $product = Product::find($productId);
        if(!$product) {
            return back()->with('error', 'Product not found');
        }
        
        $cartItem = $cart->items()->where('product_id', $productId)->first();
        if($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }

        DB::commit();

        return redirect(route("products"));
    }

    function applyVoucher(Request $request): JsonResponse {
        $user = Auth::user();

        $vouchers = $request->input("vouchers");

        CartUserVouchers::where("cart_id", $user->cart->id)->delete();

        $newVouchers = [];
        foreach($vouchers as $voucher) {
            $userVoucher = CartUserVouchers::create([
                "cart_id" => $user->cart->id,
                "user_voucher_id" => $voucher
            ]);
            
            array_push($newVouchers, $userVoucher);
        }

        
        DB::commit();

        return response()->json(['vouchers' => $newVouchers]);
    }


    private function getCart(): array {
        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::user()->id]
        );

        $cart_items = $cart->items;
        $vouchers = $cart->vouchers;
        $availableVouchers = Auth::user()->userVouchers;

        return [
            'items' => $cart_items,
            'subtotal' => $cart->calculateTotalPrice(),
            'cart_user_vouchers' => $vouchers,
            'availableVouchers' => $availableVouchers
        ];
    }

    function cartPage(): View {
        return view('carts.cart', $this->getCart());
    }

    function checkOutPage(): View|RedirectResponse {
        $user = Auth::user();

        $cart = $this->getCart();
        $totalVoucher = 0;

        foreach($cart["cart_user_vouchers"] as $voucher) {
            $totalVoucher = min($totalVoucher + $voucher->user_voucher->voucher->amount, $cart["subtotal"]);
        }

        $pending = PendingPurchase::where("user_id", $user->id)->first();

        if($cart["items"]->isEmpty() && $pending === null) {
            return redirect(route("products"));
        }

        return view('checkout.checkout', [
            "cart" => $cart,
            "pending" => $pending,
            "total_voucher" => $totalVoucher
        ]);
    }

    function removeItemFromCart(Request $request): JsonResponse {
        $user = Auth::user();
        $id = $request->input("id");

        $cart = Cart::where('user_id', $user->id)->first();

        $cartItem = $cart->items->where('id', $id)->first();
        $cartItem->delete();

        DB::commit();

        return response()->json(['total_price' => $cart->calculateTotalPrice()]);
    }

    function editCartItem(Request $request): JsonResponse {
        $user = Auth::user();
        $id = $request->input("id");
        $quantity = $request->input("quantity");

        $cart = Cart::where('user_id', $user->id)->first();

        $cartItem = $cart->items->where('id', $id)->first();
        $cartItem->quantity = $quantity;
        $cartItem->save();

        DB::commit();

        return response()->json(['total_price' => $cart->calculateTotalPrice()]);
    }

    function finalizeCheckout(): RedirectResponse {
        return redirect(route("checkout"));
    }

    function checkoutCart(): RedirectResponse {
        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)->first();
        $pendingPurchase = PendingPurchase::where('user_id', $user->id)->first();

        if(!$cart) return redirect("/products");

        if($pendingPurchase) {
            $pendingPurchase->items()->delete();
            $pendingPurchase->delete();
        }

        $pendingPurchase = PendingPurchase::create([
            "user_id" => $user->id,
            "address" => $user->address,
            "total" => 10000
        ]);

        foreach($cart->items as $cartItem) {
            PendingPurchaseItem::create([
                "pending_purchase_id" => $pendingPurchase->id,
                "product_id" => $cartItem->product->id,
                "quantity" => $cartItem->quantity,
                "product_price" => $cartItem->product->price
            ]);
            $pendingPurchase->total += $cartItem->product->price * $cartItem->quantity;

            $cartItem->delete();
        }

        $totalVoucher = 0;
        
        foreach($cart->vouchers as $cartVoucher) {
            $user_voucher =  $cartVoucher->user_voucher;
            $totalVoucher += $user_voucher->voucher->amount;
            $cartVoucher->delete();
            $user_voucher->delete();
        }

        $pendingPurchase->total -= $totalVoucher;
        $pendingPurchase->save();

        $cart->delete();

        DB::commit();

        return redirect(route("checkout"));
    }
}
