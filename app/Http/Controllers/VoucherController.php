<?php

namespace App\Http\Controllers;

use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VoucherController extends Controller
{
    private function getUserVouchers(): array {
        return [];
    }

    function vouchers(): View 
    {
        $vouchers = Voucher::all();

        return view('voucher.voucher', [
            "vouchers" => $vouchers
        ]);
    }

    function redeem(Request $request): JsonResponse {
        $user = Auth::user();
        $voucher = Voucher::where("id", $request->input("id"))->first();

        if($user->points < $voucher->point_price) {
            return response()->json(["status" => false]);
        }

        $user->points = $user->points - $voucher->point_price;
        $user->save();

        $user_voucher = UserVoucher::where('user_id', $user->id)
                                    ->where('voucher_id', $voucher->id)
                                    ->lockForUpdate()
                                    ->first();
        
        if($user_voucher) {
            $user_voucher->increment('quantity');
        } else {
            UserVoucher::create([
                'user_id' => $user->id,
                'voucher_id' => $voucher->id,
                'quantity' => 1
            ]);
        }

        DB::commit();

        return response()->json(["status" => true]);
    }
}
