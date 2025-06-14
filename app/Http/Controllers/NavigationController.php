<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NavigationController extends Controller
{
    //
    public function home(): View
    {
        $articles = ArticleController::getArticlesByCount(3);
        $products = ProductController::getProductsByCount(3);

        return view('welcome', [
            "articles" => $articles,
            "products" => $products
        ]);
    }

    function donate(): View {
        return view('tree-fund.index');
    }
}
