<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with('subCategories')->get();
        $products = Product::inRandomOrder()->limit(8)->get();

        $menProducts = Product::where('category_name', 'Men\'s Wear')->inRandomOrder()->limit(8)->get();
        $womenProducts = Product::where('category_name', 'Women\'s Wear')->inRandomOrder()->limit(8)->get();
        $kidsProducts = Product::where('category_name', 'Kids\'s Wear')->inRandomOrder()->limit(8)->get();

        $trendingProducts = Product::where('trending', 1)->inRandomOrder()->limit(8)->get();
        $popularProducts = Product::where('popular', 1)->inRandomOrder()->limit(8)->get();

        return view('home.index', compact('categories', 'products', 'menProducts', 'womenProducts', 'kidsProducts', 'trendingProducts', 'popularProducts'));
    }
}
