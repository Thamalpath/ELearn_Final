<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;


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
        $ratings = Rating::where('prod_id', $product->id)->get();
        $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
        $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();

        // Fetch related products by filtering products with the same subcategory name
        $relatedProducts = Product::where('sub_category_name', $product->sub_category_name)
        ->where('id', '<>', $product->id)
        ->limit(6)
        ->get();
        
        // Convert the comma-separated colors and sizes stored in the database to arrays
        $productColors = explode(',', $product->color);
        $productSizes = explode(',', $product->size);

        if($ratings->count() > 0)
        {
            $rating_value = $rating_sum/$ratings->count();
        }
        else
        {
            $rating_value = 0;
        }
        return view('web.products.show', compact('product', 'ratings', 'rating_value', 'user_rating', 'categories', 'productColors', 'productSizes', 'relatedProducts'));
    }

}

