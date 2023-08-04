<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Mail\OrderPlaced;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;

class WebCheckoutController extends Controller
{
    /**
     * Display the checkout page.
     */
    public function index()
    {
        $categories = Category::with('subCategories')->get();

        // Retrieve cart items for the authenticated user
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('web.cart.checkout', compact('categories', 'cartItems'));
    }

    /**
     * Place an order and process the checkout.
     */
    public function placeOrder (Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        // Calculate the total price before creating the order
        $total = 0;
        foreach ($cartItems as $item) {
            $subtotal = $item->products->selling_price * $item->prod_qty;
            $total += $subtotal;
        }
        
        // Create a new Order instance and save order details in the database
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->zipcode = $request->input('zipcode');
        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');
        $order->total = $total;

        $order->tracking_no = 'daisy' . rand(1111, 9999);
        $order->save();

        // Retrieve the order ID after saving the order
        $order->id;

        // Process each cart item and create order items in the database
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
                'color' => $item->color,
                'size' => $item->size,
            ]);

            // Update product quantity after placing the order
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        // Update user information if address1 is NULL
        if (Auth::user()->address1 == NULL) {
            $user = User::find(Auth::id());
            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->zipcode = $request->input('zipcode');
            $user->update();
        }

        // Remove cart items after placing the order
        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        if($request->input('payment_mode') == "Paid by Razorpay")
        {
            return response()->json(['status'=> "Order Placed Successfully"]);
        }
        return redirect('/')->with('status', "Order Placed Successfully");
    }

    public function razorPayCheck(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->products->selling_price * $item->prod_qty;
        }

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $zipcode = $request->input('zipcode');

        return response()->json([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'zipcode' => $zipcode,
            'total' => $total,
        ]);
    }

    // public function email(){
    //     $order = Order::find(5);
    //     $mail =Mail::to('thamalpathsathimantha3@gmail.com')->send(new OrderPlaced(['order'=>$order]));
    //     // return view('emails.orders.placed', [
    //     //     'order'=>$order
    //     // ]);
    // }
}
