<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class PayhereController extends Controller
{
    public function pay(Request $request)
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

        return view('payment.payhere.pay', compact('hash'));
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
