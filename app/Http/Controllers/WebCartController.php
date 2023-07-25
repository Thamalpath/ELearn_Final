<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class WebCartController extends Controller
{
    /**
    *Add a product to the user's cart.
    */
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
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) 
                {
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
        } 
        else {
            return response()->json(['status' => "Login To Continue"], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
    * Display the user's cart.  
    */
    public function viewCart()
    {
        $categories = Category::with('subCategories')->get();
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view ('web.cart.cart', compact('categories', 'cartItems'));
    }

    /**
    * Update the quantity of a product in the user's cart.
    */
    public function updateCart(Request $request)
    {
        // Get the product ID and new quantity from the request input
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        // Check if the user is authenticated (logged in)
        if (Auth::check()) {
            // Check if the cart item with the given product ID exists for the logged-in user
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                // Find the cart item associated with the product ID and user ID
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();

                // Update the quantity of the cart item with the new product quantity
                $cart->prod_qty = $product_qty;
                $cart->update();

                return response()->json(['status' => "Quantity Updated"]);
            }
        }
    }

    /**
    * Delete a product from the user's cart.
    */
    public function deleteProduct(Request $request)
    {
        // Check if the user is authenticated (logged in)
        if (Auth::check()) {
            // Get the product ID from the request input
            $prod_id = $request->input('prod_id');
            // Check if the cart item with the given product ID exists for the logged-in user
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                // Find the cart item associated with the product ID and user ID
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete(); // Delete the cart item
                return response()->json(['status' => "Product Deleted Successfully"]);
            }
        } 
        else {
            return response()->json(['status' => "Login To Continue"], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
    * Clear all cart items for the authenticated user.
    */
    public function clearCart()
    {
        // Check if the user is authenticated (logged in)
        if (Auth::check()) {
            // Clear the cart items for the logged-in user
            Cart::where('user_id', Auth::id())->delete();

            return response()->json(['status' => "Shopping Cart Cleared Successfully"]);
        } else {
            return response()->json(['status' => "Login To Continue"], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
    * Validate products in the user's cart.
    */
    public function validateCartProducts()
    {
        // Get all cart items for the authenticated user
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $outOfStockProducts = []; // Get all cart items for the authenticated user

        // Loop through each cart item and check if the product is out of stock
        foreach ($cartItems as $item) {
            $product = Product::find($item->prod_id);
            if ($product->status === 'Out of Stock') {
                // If any product in the cart is out of stock, add its name to the array
                $outOfStockProducts[] = $product->name;
            }
        }

        // If there are out-of-stock products in the cart, return an error response with the product names
        if (count($outOfStockProducts) > 0) {
            return response()->json([
                'status' => 'error',
                'product_names' => $outOfStockProducts,
            ]);
        }

        // If there are out-of-stock products in the cart, return an error response with the product names
        return response()->json(['status' => 'success']);
    }
}
