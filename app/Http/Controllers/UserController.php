<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;

class UserController extends Controller
{
    public function index()
    {
        $categories = Category::with('subCategories')->get();
        $orders = Order::where('user_id', Auth::id())->get();

        return view('web.account.index', compact('orders', 'categories'));
    }
}

