<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    private function getCart(): array {
        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::user()->id]
        );

        $cart_items = $cart->items;

        return [
            'items' => $cart_items,
            'subtotal' => $cart->calculateTotalPrice()
        ];
    }

    function cartPage(): View {
        return view('carts.cart', $this->getCart());
    }

    function checkOutPage(): View {
        return view('checkout.checkout', $this->getCart());
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

}
