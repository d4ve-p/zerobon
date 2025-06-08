<?php

namespace App\Http\Controllers;

use App\Models\UserVoucher;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VoucherController extends Controller
{
    private function getUserVouchers(): Collection {
        $user_vouchers = UserVoucher::where("user_id", Auth::user()->id)->get();

        return $user_vouchers;
    }

    function vouchers(): View 
    {
        $vouchers = Voucher::all();

        return view('voucher.voucher', [
            "vouchers" => $vouchers,
            "user_vouchers" => $this->getUserVouchers()
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

        $user_voucher = UserVoucher::create([
            "user_id" => $user->id,
            "voucher_id" => $voucher->id,
            "start_date" => Carbon::today(),
            "end_date" => Carbon::today()->addDays(30)
        ]);
        $user_voucher->save();

        DB::commit();

        return response()->json(["status" => true]);
    }
}
