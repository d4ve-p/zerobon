<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TreeFundController extends Controller
{
    //
    function donate(): View {
        return view('tree-fund.index');
    }
}
