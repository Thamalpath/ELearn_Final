<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class WebCartController extends Controller
{
    public function addProduct(Request $request)
    {
        // Get product_id and product_qty from the request input
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        // Check if the user is authenticated (logged in)
        if (Auth::check()) {
            // Check if the user is authenticated (logged in)
            $prod_check = Product::where('id', $product_id)->first();

            // If the product exists
            if ($prod_check) {
                // Check if the product with the same $product_id is already in the user's cart
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . " Already Added To Cart"]);
                } else {
                    // Check if the product with the same $product_id is already in the user's cart
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;

                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . " Added To Cart"]);
                }
            }
        } else {
            return response()->json(['status' => "Login To Continue"]);
        }
    }

    public function show()
    {
    }
}
