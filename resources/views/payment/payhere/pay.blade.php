@extends('layouts.web2')

@section('title')
    Place Order
@endsection

@section('pageTitle')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Place Order</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/./') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('cart') }}">Cart</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('checkout') }}">Cart</a></li>
                        <li class="breadcrumb-item active">Place Order</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container d-flex justify-content-center text-center">
        <div class="">
            <h2>Payhere Payment</h2>
            <h3>Order ID: {{ $order->id }}</h3>
            <h4>Total: {{ $order->total }}</h4>
            <form method="post" action="{{ env('PAYHERE_ENDPOINT') }}">
                <input type="hidden" name="merchant_id" value="{{ env('PAYHERE_MERCHANT_ID') }}">

                <input type="hidden" name="return_url"
                    value="{{ route('payhere.return', urlencode(base64_encode($order->id))) }}">
                <input type="hidden" name="cancel_url"
                    value="{{ route('payhere.cancel', urlencode(base64_encode($order->id))) }}">
                <input type="hidden" name="notify_url" value="{{ route('payhere.notify') }}">

                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <input type="hidden" name="items" value="{{ $order->id }}">
                <input type="hidden" name="currency" value="LKR">
                <input type="hidden" name="amount" value="{{ $order->total }}">

                <input type="hidden" name="first_name" value="{{ $order->firstname ?? '' }}">
                <input type="hidden" name="last_name" value="Perera">
                <input type="hidden" name="email" value="samanp@gmail.com">
                <input type="hidden" name="phone" value="0771234567">
                <input type="hidden" name="address" value="No.1, Galle Road">
                <input type="hidden" name="city" value="Colombo">
                <input type="hidden" name="country" value="Sri Lanka">
                <input type="hidden" name="hash" value="098F6BCD4621D373CADE4E832627B4F6">
                <!-- Replace with generated hash -->
                <input type="submit" value="Buy Now">
                <div class="Place-order mt-25">
                    <button class="btn-hover btn-full-width" type="button">Buy
                        Now</button>
                </div>
            </form>
        </div>
    </div>
@endsection