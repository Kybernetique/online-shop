<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.categories', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('products.products', compact('category'), compact('products'));
    }
}
