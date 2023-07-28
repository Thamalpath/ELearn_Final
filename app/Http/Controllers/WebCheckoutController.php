<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

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
    public function confirm (Request $request)
    {
        // Calculate the total price before creating the order
        $cartItems = Cart::where('user_id', Auth::id())->get();
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
            ]);

            // Update product quantity after placing the order
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        // Update user information if address1 is NULL
        if (Auth::user()->address1 == NULL) {
            $user = User::find(Auth::id())->first();
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
        // $cartItems = Cart::where('user_id', Auth::id())->get();
        // Cart::destroy($cartItems);

        if($request->input('payment_mode') == "Paid by Payhere")
        {
            return response()->json(['status'=> 'Order Details Stored Successfully']);
        }
        return redirect()->route('cart.place-order')->with('status', 'Order Details Stored Successfully');
    }

    public function payCheck(Request $request)
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

        // Retrieve the order instance
        $orderId = $request->input('order_id');
        
        $hash = strtoupper(
            md5(
                env('PAYHERE_MERCHANT_ID') .
                $orderId .
                number_format($total, 2, '.', '') .
                'LKR' .
                strtoupper(md5(env('PAYHERE_SECRET')))
            )
        );

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
            'hash' => $hash
        ]);
    }

    public function return($orderId)
    {
        return 'Payment Successful';
    }

    public function cancel($orderId)
    {
        return 'Payment Cancelled';
    }

    public function notify(Request $request)
    {
        Log::debug('request to noyify'.json_encode($request->all(),JSON_PRETTY_PRINT));

        $orderId = $request->order_id;
        $order = Order::find($orderId);
        
        if($order && $order->payment_status == 'pending'){
            
            $local_md5sig = strtoupper(
                md5(
                    env('PAYHERE_MERCHANT_ID') . 
                    $orderId . 
                    $request->payhere_amount . 
                    $request->payhere_currency . 
                    $request->status_code . 
                    strtoupper(md5(env('PAYHERE_SECRET'))) 
                ) 
            );

            if($local_md5sig == $request->md5sig && $request->status_code == 2){
                
                $payment_meta = [];

                if($order->payment_meta){
                    $payment_meta[] = json_decode($order->payment_meta);
                    $payment_meta[] = $request->all();
                }else{
                    $payment_meta[] = $request->all();
                }
                
                if($order->update([
                    'payment_status' => 'paid',
                    'payment_id' => $request->payment_id ,
                    'payment_meta' => json_encode($payment_meta),
                ])){
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Payment Successfull',
                    ]);
                }
            }
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Payment Failed',
        ]);
    }
}
