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

    public function viewcart()
    {
        $categories = Category::with('subCategories')->get();
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view ('web.cart.cart', compact('categories', 'cartItems'));
    }

    public function updateCart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        // Check if the user is authenticated (logged in)
        if (Auth::check()) 
        {
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status'=> "Quantity Updated"]);
            }
        }
    }

    public function deleteProduct(Request $request)
    {
        // Check if the user is authenticated (logged in)
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product Deleted Successfully"]);
            }
        } 
        else {
            return response()->json(['status' => "Login To Continue"], Response::HTTP_BAD_REQUEST);
        }
    }

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

    public function validateCartProducts()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $outOfStockProducts = [];

        foreach ($cartItems as $item) {
            $product = Product::find($item->prod_id);
            if ($product->status === 'Out of Stock') {
                // If any product in the cart is out of stock, add its name to the array
                $outOfStockProducts[] = $product->name;
            }
        }

        if (count($outOfStockProducts) > 0) {
            return response()->json([
                'status' => 'error',
                'product_names' => $outOfStockProducts,
            ]);
        }

        // All products in the cart are available
        return response()->json(['status' => 'success']);
    }
}
