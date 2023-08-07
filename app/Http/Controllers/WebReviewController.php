<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;

class WebReviewController extends Controller
{
    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', 'Available')->first();

        if (!$product) {
            return redirect()->back()->with('status', "The link you followed was broken");
        }

        if (!Auth::check()) {
            return redirect()->back()->with('status', "You need to be logged in to write a review");
        }

        $userHasPurchased = Order::where('user_id', Auth::id())
            ->join('order_items', 'orders.id', 'order_items.order_id')
            ->where('order_items.prod_id', $product_id)
            ->exists();

        if (!$userHasPurchased) {
            return redirect()->back()->with('status', "You can only write a review for products you've purchased");
        }

        $user_review = $request->input('user_review');
        $new_review = Review::create([
            'user_id' => Auth::id(),
            'prod_id' => $product_id,
            'user_review' => $user_review
        ]);

        $prod_slug = $product->slug;
        if ($new_review) {
            return redirect('product/' . $prod_slug)->with('status', "Thank you for writing a review");
        }
    }
}