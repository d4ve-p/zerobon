<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class VoucherController extends Controller
{
    //
    private function getPurchaseableVoucher(): array {
        return [];
    }

    private function getUserVouchers(): array {
        return [];
    }

    function vouchers(): View {
        return view('voucher.voucher');
    }
}
