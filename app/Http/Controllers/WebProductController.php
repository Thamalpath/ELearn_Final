<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class WebProductController extends Controller
{
    public function index(Request $request)
    {
        $allProducts = Product::all();
        $categories = Category::with('subCategories')->get();
        return view('web.products.list', compact('allProducts', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categories = Category::with('subCategories')->get();
        return view('web.products.show', compact('product', 'categories'));
    }
}

