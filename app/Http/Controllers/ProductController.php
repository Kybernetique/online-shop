<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.products', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.product', compact('product'));
    }
}
