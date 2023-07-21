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

        // Fetch related products by filtering products with the same subcategory name
        $relatedProducts = Product::where('sub_category_name', $product->sub_category_name)
        ->where('id', '<>', $product->id)
        ->limit(6)
        ->get();
        
        // Convert the comma-separated colors and sizes stored in the database to arrays
        $productColors = explode(',', $product->color);
        $productSizes = explode(',', $product->size);

        return view('web.products.show', compact('product', 'categories', 'productColors', 'productSizes', 'relatedProducts'));
    }

}

