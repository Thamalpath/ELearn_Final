<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class WebCheckoutController extends Controller
{
    public function index()
    {
        $categories = Category::with('subCategories')->get();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('web.cart.checkout', compact('categories', 'cartItems'));
    }

    public function placeOrder(Request $request)
    {

    }
}
