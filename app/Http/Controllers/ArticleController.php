<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
         // Headline (artikel terbaru)
        $headline = Article::orderBy('publish_date', 'desc')->first();

        // Artikel selain headline untuk daftar utama
        $articles = Article::where('id', '!=', optional($headline)->id)
            ->orderBy('publish_date', 'desc')
            ->paginate(4);

        // Ambil 5 artikel terbaru selain headline untuk sidebar (tidak ikut paginate)
        $sidebarArticles = Article::where('id', '!=', optional($headline)->id)
            ->orderBy('publish_date', 'desc')
            ->take(5)
            ->get();

        return view('articles.articles', compact('headline', 'articles', 'sidebarArticles'));
    }
}
