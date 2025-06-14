<?php

namespace App\Http\Controllers;

use App\Models\PendingPurchase;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Carbon\Carbon;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PurchaseController extends Controller
{
    //
    public function makePurchase(): RedirectResponse {
        $user = Auth::user();

        $pendingPurchase = PendingPurchase::where('user_id', $user->id)->first();

        if(!$pendingPurchase || $pendingPurchase->items->isEmpty
        ()) {
            if($pendingPurchase) {
                $pendingPurchase->delete();
            }
            
            DB::commit();

            return redirect(route("checkout"));
        }

        $purchase = Purchase::create([
            "user_id" => $user->id,
            "status" => "In Packing",
            "total" => $pendingPurchase->total,
            "purchaseDate" => Carbon::now() 
        ]);

        foreach($pendingPurchase->items as $pendingItem) {
            PurchaseItem::create([
                "purchase_id" => $purchase->id,
                "product_id" => $pendingItem->product->id,
                "quantity" => $pendingItem->quantity,
                "product_price" => $pendingItem->product_price
            ]);
        }

        $pendingPurchase->items()->delete();
        $pendingPurchase->delete();

        DB::commit();

        return redirect(route("purchases"));
    }

    function getAllPurchase(): View {
        $user = Auth::user();

        $purchases = Purchase::where('user_id', $user->id)->get();

        return view('order.order', ["purchases" => $purchases]);
    }
}
