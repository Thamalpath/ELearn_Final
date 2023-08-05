<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Order;

class WebRatingController extends Controller
{
    public function rate(Request $request, Product $product)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'product_rating' => 'required|integer|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return Response::json(['status' => 'error', 'message' => 'Invalid rating value']);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has a verified purchase for the given product
        $verified_purchase = Order::where('user_id', $user->id)
            ->join('order_items', 'orders.id', 'order_items.order_id')
            ->where('order_items.prod_id', $product->id)->get();

        if ($verified_purchase->count() === 0) {
            return Response::json(['status' => 'error', 'message' => "You cannot rate a product without a purchase"]);
        }

        // Check if the user has already rated the product
        $existing_rating = Rating::where('user_id', $user->id)->where('prod_id', $product->id)->first();
        if ($existing_rating) {
            $existing_rating->stars_rated = $request->input('product_rating');
            $existing_rating->update();
        } else {
            Rating::create([
                'user_id' => $user->id,
                'prod_id' => $product->id,
                'stars_rated' => $request->input('product_rating'),
            ]);
        }

        return Response::json(['status' => 'success', 'message' => "Thank you for rating this product"]);
    }
}
