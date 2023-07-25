@extends('layouts.web2')

@section('title')
    Checkout
@endsection

@section('pageTitle')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Checkout</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/./') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('cart') }}">Cart</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <form action="{{ url('place-order') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>First Name</label>
                                        <input type="text" value="{{ Auth::user()->fname }}" name="fname" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Last Name</label>
                                        <input type="text" value="{{ Auth::user()->lname }}" name="lname" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Email Address</label>
                                        <input type="text" value="{{ Auth::user()->email }}" name="email" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Phone</label>
                                        <input type="text" value="{{ Auth::user()->phone }}" name="phone" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Street Address</label>
                                        <input class="billing-address" placeholder="House number and street name"
                                            type="text" value="{{ Auth::user()->address1 }}" name="address1" />
                                        <input placeholder="Apartment, suite, unit etc." type="text"
                                            value="{{ Auth::user()->address2 }}" name="address2" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Town / City</label>
                                        <input type="text" value="{{ Auth::user()->city }}" name="city" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>State</label>
                                        <input type="text" value="{{ Auth::user()->state }}" name="state" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Country</label>
                                        <input type="text" value="{{ Auth::user()->country }}" name="country" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Postcode / ZIP</label>
                                        <input type="text" value="{{ Auth::user()->zipcode }}" name="zipcode" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Order Details</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">

                                    <div class="your-order-top">
                                        <ul>
                                            <li>Products</li>
                                            <li>Quantity</li>
                                            <li>Total</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        @foreach ($cartItems as $item)
                                            <ul>
                                                <li>
                                                    <span class="order-middle-left">
                                                        {{ $item->products->name }}
                                                    </span>
                                                    <span class="order-quantity">
                                                        <span class="product-quantity">{{ $item->prod_qty }}</span>
                                                    </span>
                                                    <span
                                                        class="order-price">Rs.{{ $item->products->selling_price * $item->prod_qty }}</span>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>

                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Shipping</li>
                                            <li>Free shipping</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Total</li>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($cartItems as $item)
                                                @php
                                                    $subtotal = $item->products->selling_price * $item->prod_qty;
                                                    $total += $subtotal;
                                                @endphp
                                            @endforeach
                                            <li>Rs.{{ $total }}.00</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion element-mrg">
                                        <div id="faq" class="panel-group">
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-1" class="collapsed"
                                                            aria-expanded="true">Direct bank transfer</a>
                                                    </h4>
                                                </div>
                                                <div id="my-account-1" class="panel-collapse collapse show"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-2" aria-expanded="false"
                                                            class="collapsed">Check payments</a></h4>
                                                </div>
                                                <div id="my-account-2" class="panel-collapse collapse"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-3">Cash on delivery</a></h4>
                                                </div>
                                                <div id="my-account-3" class="panel-collapse collapse"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order mt-25">
                                <a class="btn-hover" type="submit" href="#">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout area end -->
@endsection
