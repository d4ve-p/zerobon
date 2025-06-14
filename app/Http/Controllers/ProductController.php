<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
class ProductController extends Controller
{
    public function delete($id) {
        Product::findOrFail($id)->delete();

        return redirect('products');
    }

    public function products(): View {
        return view('products.products', [
            "products" => Product::paginate(6)
        ]);
    }

    static function getProductsByCount($count) {
        $products = Product::all()->take(3);

        return $products;
    }
}
