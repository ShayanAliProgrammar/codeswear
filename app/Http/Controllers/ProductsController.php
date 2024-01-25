<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductsController extends Controller
{
    public function allProducts()
    {
        $products = Cache::remember('products-all', 60, function () {
            return Product::latest()->get();
        });
        return view('user.products.all', compact('products'));
    }

    public function showProduct(Product $product)
    {
        return view('user.products.show', compact('product'));
    }
}
