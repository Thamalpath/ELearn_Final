@extends('layouts.web2')

@section('title')
    My Cart
@endsection

@section('pageTitle')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">My Cart</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
@endsection


@section('content')
    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if ($cartItems->count() > 0)
                                    <tbody>
                                        @php $total = 0; @endphp
                                        @foreach ($cartItems as $item)
                                            @php
                                                $subtotal = $item->products->selling_price * $item->prod_qty;
                                                $total += $subtotal;
                                            @endphp
                                            <tr class="product_data">
                                                <td class="product-thumbnail">
                                                    <a href="#"><img class="img-responsive ml-15px"
                                                            src="{{ asset('storage/' . json_decode($item->products->images)[0]) }}"
                                                            alt="" /></a>
                                                </td>
                                                <td class="product-name">{{ $item->products->name }}</td>
                                                <td class="product-thumbnail">{{ $item->color }}</td>
                                                <td class="product-thumbnail">{{ $item->size }}</td>

                                                <td class="product-price-cart"><span
                                                        class="amount">Rs.{{ $item->products->selling_price }}.00</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <input type="hidden" value="{{ $item->prod_id }}" class="prod_id">
                                                    <div class="cart-plus-minus changeQuantity">
                                                        <input class="cart-plus-minus-box qty-input" type="text"
                                                            name="qtybutton" value="{{ $item->prod_qty }}" />
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">Rs.{{ $subtotal }}.00</td>
                                                <td class="product-remove">
                                                    <button class="btn btn-danger delete-cart-item">
                                                        <i class="fa fa-trash" style="margin-right: 5px;"></i>
                                                        Remove
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6"></td>
                                            <td class="product-total" style="font-weight: 700; font-size: 18px">Total:
                                                Rs.{{ $total }}.00
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                @else
                                    <tbody>
                                        <td colspan="6" style="text-align: center;">
                                            <p style="font-weight: 700; font-size: 22px;">
                                                Your <i class="fa fa-shopping-cart"></i> Cart is Empty
                                            </p>
                                            <p style="font-weight: 700; font-size: 18px;">
                                                Continue Shopping
                                            </p>
                                        </td>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="{{ url('all-products') }}">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <a href="#">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-md-30px">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                <div class="total-shipping">
                                    <h5>Total shipping</h5>
                                    <ul>
                                        @php $total = 0; @endphp
                                        @foreach ($cartItems as $item)
                                            @php
                                                $subtotal = $item->products->selling_price * $item->prod_qty;
                                                $total += $subtotal;
                                            @endphp
                                            <li> {{ $item->products->name }}
                                                <span>Rs.{{ $subtotal }}.00</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <h4 class="grand-totall-title">Grand Total <span>Rs.{{ $total }}.00</span></h4>
                                <a href="{{ url('checkout') }}" class="proceed-to-checkout-btn">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Cart Area End -->
@endsection
