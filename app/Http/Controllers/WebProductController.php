<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Rating;
use App\Models\Order;

class WebProductController extends Controller
{
    public function index(Request $request)
    {
        $allProducts = Product::with('ratings')->get();
        $categories = Category::with('subCategories')->get();
        return view('web.products.list', compact('allProducts', 'categories'));
    }

    public function productsBySubcategory(SubCategory $subcategory)
    {
        $allProducts = Product::with('ratings')->where('sub_category_id', $subcategory->id)->get();
        $categories = Category::with('subCategories')->get();
        
        return view('web.products.list', compact('allProducts', 'categories', 'subcategory'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categories = Category::with('subCategories')->get();
        $ratings = Rating::where('prod_id', $product->id)->get();
        $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
        $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
        $verified_purchase = Order::where('user_id', Auth::id())
            ->join('order_items', 'orders.id', 'order_items.order_id')
            ->where('order_items.prod_id', $product->id)->exists();
        $reviews = Review::where('prod_id', $product->id)->get();

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
        return view('web.products.show', compact('product', 'ratings', 'reviews', 'verified_purchase', 'rating_value', 'user_rating', 'categories', 'productColors', 'productSizes', 'relatedProducts'));
    }
}

