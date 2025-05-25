<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Product;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

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
}
