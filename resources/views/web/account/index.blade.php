@extends('layouts.web2')

@section('title')
    My Account
@endsection

@section('pageTitle')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">My Account</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Account</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- account area start -->
    <div class="account-dashboard pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                            <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>
                            <li><a href="#address" data-bs-toggle="tab" class="nav-link">Addresses</a></li>
                            <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Account details</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h4>Dashboard </h4>
                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent
                                    orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a
                                    href="#">Edit your password and account details.</a></p>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h4>Orders</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Tracking No</th>
                                            <th>Date</th>
                                            <th>Product Name</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Qty</th>
                                            <th>Image</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Shipping Address</th>
                                            <th>Zip Code</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            @foreach ($order->orderItems as $index => $item)
                                                <tr>
                                                    @if ($index === 0)
                                                        <td rowspan="{{ count($order->orderItems) }}">
                                                            {{ $order->tracking_no }}</td>
                                                        <td rowspan="{{ count($order->orderItems) }}">
                                                            {{ $order->created_at }}</td>
                                                    @endif
                                                    <td>{{ $item->products->name }}</td>
                                                    <td>{{ $item->color }}</td>
                                                    <td>{{ $item->size }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td><img src="{{ asset('storage/' . json_decode($item->products->images)[0]) }}"
                                                            width="60px" height="auto" alt="Product Image"></td>
                                                    @if ($index === 0)
                                                        <td rowspan="{{ count($order->orderItems) }}"
                                                            style="text-transform: none;">
                                                            {{ $order->email }}</td>
                                                        <td rowspan="{{ count($order->orderItems) }}">
                                                            {{ $order->phone }}</td>
                                                        <td rowspan="{{ count($order->orderItems) }}">
                                                            {{ $order->address1 }},
                                                            {{ $order->address2 }},
                                                            {{ $order->city }},
                                                            {{ $order->state }},
                                                            {{ $order->country }}
                                                        </td>
                                                        <td rowspan="{{ count($order->orderItems) }}">
                                                            {{ $order->zipcode }}</td>
                                                        <td rowspan="{{ count($order->orderItems) }}">
                                                            Rs.{{ $order->total }}.00</td>
                                                        <td rowspan="{{ count($order->orderItems) }}">
                                                            <span
                                                                class="success">{{ $order->status == '0' ? 'pending' : 'completed' }}</span>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <h5 class="billing-address">Billing address</h5>
                            @if ($user)
                                <p class="mb-2"><strong>{{ $user->fname }} {{ $user->lname }}</strong></p>
                                <address>
                                    <span class="mb-1 d-inline-block"><strong>Address1:</strong>
                                        {{ $user->address1 }}</span>,
                                    <br>
                                    <span class="mb-1 d-inline-block"><strong>Address2:</strong>
                                        {{ $user->address2 }}</span>,
                                    <br>
                                    <span class="mb-1 d-inline-block"><strong>City:</strong> {{ $user->city }}</span>,
                                    <br>
                                    <span class="mb-1 d-inline-block"><strong>State:</strong> {{ $user->state }}</span>,
                                    <br>
                                    <span class="mb-1 d-inline-block"><strong>ZIP:</strong> {{ $user->zipcode }}</span>,
                                    <br>
                                    <span><strong>Country:</strong> {{ $user->country }}</span>
                                </address>
                            @else
                                <p>No billing address available.</p>
                            @endif
                        </div>


                        <div class="tab-pane fade" id="account-details">
                            <h3>Account details</h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form id="update-account-form" method="POST" action="{{ route('my-account') }}">
                                            @csrf
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 default-form-box mb-20">
                                                        <label>First Name</label>
                                                        <input type="text" name="fname"
                                                            value="{{ Auth::user()->fname }}">
                                                    </div>
                                                    <div class="col-md-6 default-form-box mb-20">
                                                        <label>Last Name</label>
                                                        <input type="text" name="lname"
                                                            value="{{ Auth::user()->lname }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 default-form-box mb-20">
                                                        <label>Email</label>
                                                        <input type="text" name="email"
                                                            value="{{ Auth::user()->email }}" readonly>
                                                    </div>
                                                    <div class="col-md-6 default-form-box mb-20">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone"
                                                            value="{{ Auth::user()->phone }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 default-form-box mb-20">
                                                        <label>Address1</label>
                                                        <input type="text" name="address1"
                                                            value="{{ Auth::user()->address1 }}">
                                                    </div>
                                                    <div class="col-md-4 default-form-box mb-20">
                                                        <label>Address2</label>
                                                        <input type="text" name="address2"
                                                            value="{{ Auth::user()->address2 }}">
                                                    </div>
                                                    <div class="col-md-4 default-form-box mb-20">
                                                        <label>City</label>
                                                        <input type="text" name="city"
                                                            value="{{ Auth::user()->city }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 default-form-box mb-20">
                                                        <label>State</label>
                                                        <input type="text" name="state"
                                                            value="{{ Auth::user()->state }}">
                                                    </div>
                                                    <div class="col-md-4 default-form-box mb-20">
                                                        <label>Country</label>
                                                        <input type="text" name="country"
                                                            value="{{ Auth::user()->country }}">
                                                    </div>
                                                    <div class="col-md-4 default-form-box mb-20">
                                                        <label>Zip Code</label>
                                                        <input type="text" name="zipcode"
                                                            value="{{ Auth::user()->zipcode }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="save_button mt-3">
                                                <button class="btn" type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account area start -->
@endsection
