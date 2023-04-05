<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products() {
        $products = Product::all();
        return view('products.products', compact('products'));
    }

    public function product($id) {
        $product =  Product::find($id);
        return view('products.product', compact('product'));
    }
}
