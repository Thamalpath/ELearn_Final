@extends('layouts.web2')

@section('title')
    @if (Route::currentRouteName() == 'all.products')
        All Products
    @elseif (Route::currentRouteName() == 'subcategory.products')
        {{ $subcategory->name }}
    @endif
@endsection

@section('pageTitle')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">
                        @if (Route::currentRouteName() == 'all.products')
                            All Products
                        @elseif (Route::currentRouteName() == 'subcategory.products')
                            {{ $subcategory->name }}
                        @endif
                    </h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">
                            @if (Route::currentRouteName() == 'all.products')
                                All Products
                            @elseif (Route::currentRouteName() == 'subcategory.products')
                                {{ $subcategory->name }}
                            @endif
                        </li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
@endsection


@section('content')
    <!-- Shop Page Start  -->
    <div class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-lg-last col-md-12 order-md-first">

                    <!-- Shop Bottom Area Start -->
                    <div class="shop-bottom-area">

                        <!-- Tab Content Area Start -->
                        <div class="row">
                            <div class="col">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="shop-grid">
                                        <div class="row mb-n-30px">
                                            @foreach ($allProducts as $product)
                                                <x-product.list-item :product="$product" />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Content Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page End  -->
@endsection
