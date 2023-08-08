<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('layouts.web.partials.head')
    @stack('css')
</head>

<body>

    <!-- Top Bar -->
    <!-- Header Area Start -->
    <!-- OffCanvas Menu Start -->
    @include('layouts.web.partials.header')
    <!-- Header Area End -->
    <!-- OffCanvas Menu End -->
    <div class="offcanvas-overlay"></div>

    <!-- Hero/Intro Slider Start -->
    <div class="section ">
        <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
            <!-- Hero slider Active -->
            <div class="swiper-wrapper">
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex bg-color1">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">Offer 2023</span>
                                    <h2 class="title-1">Sale Up To </h2>
                                    <h2 class="title-2"><span>50%</span> Off</h2>
                                    <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark"> Shop
                                        Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div
                                class="col-xl-7 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                                <div class="show-case">
                                    <div class="hero-slide-image">
                                        <img src="images/slider-image/slider-1.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex bg-color2">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">Offer 2023</span>
                                    <h2 class="title-1">Sale Up To </h2>
                                    <h2 class="title-2"><span>50%</span> Off</h2>
                                    <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark"> Shop
                                        Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div
                                class="col-xl-7 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                                <div class="show-case">
                                    <div class="hero-slide-image">
                                        <img src="images/slider-image/slider-2.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <!-- Hero/Intro Slider End -->

    <!-- Feature Area Srart -->
    <div class="feature-area pt-100px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6  ">
                    <!-- single item -->
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="images/icons/1.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h4 class="title">Free Shipping</h4>
                            <span class="sub-title">Capped at $39 per order</span>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-4 col-md-6 mb-md-30px mb-lm-30px mt-lm-30px">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="images/icons/2.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h4 class="title">Card Payments</h4>
                            <span class="sub-title">12 Months Installments</span>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-4 col-md-6 ">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="images/icons/3.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h4 class="title">Easy Returns</h4>
                            <span class="sub-title">Shop With Confidence</span>
                        </div>
                    </div>
                    <!-- single item -->
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Area End -->

    <!-- Product Area Start -->
    <div class="product-area pt-100px pb-100px">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-12">
                    <div class="section-title text-center mb-0">
                        <h2 class="title">Products</h2>
                        <!-- Tab Start -->
                        <div class="nav-center">
                            <ul class="product-tab-nav nav align-items-center justify-content-center">
                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                        href="#tab-product--all">All</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                        href="#tab-product-men">Men</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                        href="#tab-product-women">Women</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                        href="#tab-product-kids">Kids</a></li>
                            </ul>
                        </div>
                        <!-- Tab End -->
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
            <!-- Section Title & Tab End -->

            <div class="row">
                <div class="col">
                    <div class="tab-content mb-30px0px">
                        <!-- All tab start -->
                        <div class="tab-pane fade show active" id="tab-product--all">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px"
                                        data-aos="fade-up" data-aos-delay="200">
                                        <!-- Single Product -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="{{ route('product.show', $product->slug) }}" class="image">
                                                    <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}"
                                                        alt="{{ $product->name }}" />
                                                    <img class="hover-image"
                                                        src="{{ asset('storage/' . json_decode($product->images)[1]) }}"
                                                        alt="{{ $product->name }}" />
                                                </a>

                                                <span class="badges">
                                                    @if ($product->trending)
                                                        <span class="new">Trending</span>
                                                    @endif
                                                    @if ($product->popular)
                                                        <span class="new">Popular</span>
                                                    @endif
                                                </span>
                                                <div class="actions">
                                                    <a href="#" class="action quickview" title="Quick view"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                            class="pe-7s-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star"
                                                            style="width: {{ $product->ratings->avg('stars_rated') * 20 }}%"></span>
                                                    </span>
                                                    <span class="rating-num">({{ $product->ratings->count() }}
                                                        Review{{ $product->ratings->count() !== 1 ? 's' : '' }})</span>
                                                </span>
                                                <h5 class="title"><a
                                                        href="{{ route('product.show', $product->slug) }}">{{ $product->meta_title }}</a>
                                                </h5>
                                                <span class="price">
                                                    <span class="new">Rs.{{ $product->selling_price }}.00</span>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Single Product -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- All tab end -->

                        <!-- Men tab start -->
                        <div class="tab-pane fade" id="tab-product-men">
                            <div class="row">
                                @foreach ($menProducts as $product)
                                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px"
                                        data-aos="fade-up" data-aos-delay="200">
                                        <!-- Single Product -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="{{ route('product.show', $product->slug) }}" class="image">
                                                    <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}"
                                                        alt="{{ $product->name }}" />
                                                    <img class="hover-image"
                                                        src="{{ asset('storage/' . json_decode($product->images)[1]) }}"
                                                        alt="{{ $product->name }}" />
                                                </a>

                                                <span class="badges">
                                                    @if ($product->trending)
                                                        <span class="new">Trending</span>
                                                    @endif
                                                    @if ($product->popular)
                                                        <span class="new">Popular</span>
                                                    @endif
                                                </span>
                                                <div class="actions">
                                                    <a href="#" class="action quickview" title="Quick view"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                            class="pe-7s-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star"
                                                            style="width: {{ $product->ratings->avg('stars_rated') * 20 }}%"></span>
                                                    </span>
                                                    <span class="rating-num">({{ $product->ratings->count() }}
                                                        Review{{ $product->ratings->count() !== 1 ? 's' : '' }})</span>
                                                </span>
                                                <h5 class="title"><a
                                                        href="{{ route('product.show', $product->slug) }}">{{ $product->meta_title }}</a>
                                                </h5>
                                                <span class="price">
                                                    <span class="new">Rs.{{ $product->selling_price }}.00</span>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Single Product -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Men tab end -->

                        <!-- Women tab start -->
                        <div class="tab-pane fade" id="tab-product-women">
                            <div class="row">
                                @foreach ($womenProducts as $product)
                                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px"
                                        data-aos="fade-up" data-aos-delay="200">
                                        <!-- Single Product -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="{{ route('product.show', $product->slug) }}" class="image">
                                                    <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}"
                                                        alt="{{ $product->name }}" />
                                                    <img class="hover-image"
                                                        src="{{ asset('storage/' . json_decode($product->images)[1]) }}"
                                                        alt="{{ $product->name }}" />
                                                </a>

                                                <span class="badges">
                                                    @if ($product->trending)
                                                        <span class="new">Trending</span>
                                                    @endif
                                                    @if ($product->popular)
                                                        <span class="new">Popular</span>
                                                    @endif
                                                </span>
                                                <div class="actions">
                                                    <a href="#" class="action quickview" title="Quick view"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                            class="pe-7s-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star"
                                                            style="width: {{ $product->ratings->avg('stars_rated') * 20 }}%"></span>
                                                    </span>
                                                    <span class="rating-num">({{ $product->ratings->count() }}
                                                        Review{{ $product->ratings->count() !== 1 ? 's' : '' }})</span>
                                                </span>
                                                <h5 class="title"><a
                                                        href="{{ route('product.show', $product->slug) }}">{{ $product->meta_title }}</a>
                                                </h5>
                                                <span class="price">
                                                    <span class="new">Rs.{{ $product->selling_price }}.00</span>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Single Product -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Women tab end -->

                        <!-- Kids tab start -->
                        <div class="tab-pane fade" id="tab-product-kids">
                            <div class="row">
                                @foreach ($kidsProducts as $product)
                                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px"
                                        data-aos="fade-up" data-aos-delay="200">
                                        <!-- Single Product -->
                                        <div class="product">
                                            <div class="thumb">
                                                <a href="{{ route('product.show', $product->slug) }}" class="image">
                                                    <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}"
                                                        alt="{{ $product->name }}" />
                                                    <img class="hover-image"
                                                        src="{{ asset('storage/' . json_decode($product->images)[1]) }}"
                                                        alt="{{ $product->name }}" />
                                                </a>

                                                <span class="badges">
                                                    @if ($product->trending)
                                                        <span class="new">Trending</span>
                                                    @endif
                                                    @if ($product->popular)
                                                        <span class="new">Popular</span>
                                                    @endif
                                                </span>
                                                <div class="actions">
                                                    <a href="#" class="action quickview" title="Quick view"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                            class="pe-7s-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star"
                                                            style="width: {{ $product->ratings->avg('stars_rated') * 20 }}%"></span>
                                                    </span>
                                                    <span class="rating-num">({{ $product->ratings->count() }}
                                                        Review{{ $product->ratings->count() !== 1 ? 's' : '' }})</span>
                                                </span>
                                                <h5 class="title"><a
                                                        href="{{ route('product.show', $product->slug) }}">{{ $product->meta_title }}</a>
                                                </h5>
                                                <span class="price">
                                                    <span class="new">Rs.{{ $product->selling_price }}.00</span>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Single Product -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Kids tab end -->
                    </div>
                    <a href="{{ url('all-products') }}" class="btn btn-lg btn-primary btn-hover-dark m-auto">Load
                        More <i class="fa fa-arrow-right ml-15px" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End -->

    <!-- Deal Area Start -->
    <div class="deal-area deal-bg deal-bg-2 pt-100px" data-bg-image="images/deal-img/deal-bg-2.jpg">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="deal-inner position-relative pt-100px pb-100px">
                        <div class="deal-wrapper">
                            <span class="category">#FASHION SHOP</span>
                            <h3 class="title">Deal Of The Day</h3>
                            <div class="deal-timing">
                                <div data-countdown="2023/12/31"></div>
                            </div>
                            <a href="{{ url('all-products') }}" class="btn btn-lg btn-primary btn-hover-dark m-auto">
                                Shop
                                Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                        </div>
                        <div class="deal-image">
                            <img class="img-fluid" src="images/deal-img/woman.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Area End -->

    <!-- Banner Area Start -->
    <div class="banner-area pt-100px">
        <div class="row m-0">
            <div class="col-12 col-lg-4 mb-md-30px mb-lm-30px">
                <div class="single-banner-2">
                    <img src="images/banner/Women's Wear.jpg" alt="">
                    <div class="item-disc">
                        <h4 class="title">Best Collection <br>
                            For Women</h4>
                        <a href="shop-left-sidebar.html" class="shop-link btn btn-primary ">Shop Now <i
                                class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 center-col mb-md-30px mb-lm-30px">
                <div class="single-banner-2">
                    <img src="images/banner/Men's Wear.jpg" alt="">
                    <div class="item-disc">
                        <h4 class="title">Best Collection <br>
                            For Men</h4>
                        <a href="shop-left-sidebar.html" class="shop-link btn btn-primary">Shop Now <i
                                class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="single-banner-2">
                    <img src="images/banner/Kid's Wear.jpg" alt="">
                    <div class="item-disc">
                        <h4 class="title">New Collection <br>
                            For Kids</h4>
                        <a href="shop-left-sidebar.html" class="shop-link btn btn-primary">Shop Now <i
                                class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Product Area Start -->
    <div class="product-area pt-100px pb-100px">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg col-md col-12">
                    <div class="section-title mb-0">
                        <h2 class="title">New Arrivals</h2>
                    </div>
                </div>
                <!-- Section Title End -->

                <!-- Tab Start -->
                <div class="col-lg-auto col-md-auto col-12">
                    <ul class="product-tab-nav nav">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                href="#tab-product-all">All</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                href="#tab-product-trending">Trending</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                href="#tab-product-popular">Popular</a></li>
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <!-- Section Title & Tab End -->

            <div class="row">
                <div class="col">
                    <div class="tab-content top-borber">
                        <!-- All tab start -->
                        <div class="tab-pane fade show active" id="tab-product-all">
                            <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                                <div class="new-product-wrapper swiper-wrapper">
                                    @foreach ($products as $product)
                                        <div class="new-product-item swiper-slide">
                                            <!-- Single Product -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="{{ route('product.show', $product->slug) }}"
                                                        class="image">
                                                        <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}"
                                                            alt="{{ $product->name }}" />
                                                        <img class="hover-image"
                                                            src="{{ asset('storage/' . json_decode($product->images)[1]) }}"
                                                            alt="{{ $product->name }}" />
                                                    </a>

                                                    <span class="badges">
                                                        @if ($product->trending)
                                                            <span class="new">Trending</span>
                                                        @endif
                                                        @if ($product->popular)
                                                            <span class="new">Popular</span>
                                                        @endif
                                                    </span>
                                                    <div class="actions">
                                                        <a href="#" class="action quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                                class="pe-7s-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <span class="ratings">
                                                        <span class="rating-wrap">
                                                            <span class="star"
                                                                style="width: {{ $product->ratings->avg('stars_rated') * 20 }}%"></span>
                                                        </span>
                                                        <span class="rating-num">({{ $product->ratings->count() }}
                                                            Review{{ $product->ratings->count() !== 1 ? 's' : '' }})</span>
                                                    </span>
                                                    <h5 class="title"><a
                                                            href="{{ route('product.show', $product->slug) }}">{{ $product->meta_title }}</a>
                                                    </h5>
                                                    <span class="price">
                                                        <span
                                                            class="new">Rs.{{ $product->selling_price }}.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- Single Product -->
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-buttons">
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                        <!-- All tab end -->

                        <!-- Trending tab -->
                        <div class="tab-pane fade show" id="tab-product-trending">
                            <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                                <div class="new-product-wrapper swiper-wrapper">
                                    @foreach ($trendingProducts as $product)
                                        <div class="new-product-item swiper-slide">
                                            <!-- Single Product -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="{{ route('product.show', $product->slug) }}"
                                                        class="image">
                                                        <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}"
                                                            alt="{{ $product->name }}" />
                                                        <img class="hover-image"
                                                            src="{{ asset('storage/' . json_decode($product->images)[1]) }}"
                                                            alt="{{ $product->name }}" />
                                                    </a>

                                                    <span class="badges">
                                                        @if ($product->trending)
                                                            <span class="new">Trending</span>
                                                        @endif
                                                        @if ($product->popular)
                                                            <span class="new">Popular</span>
                                                        @endif
                                                    </span>
                                                    <div class="actions">
                                                        <a href="#" class="action quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                                class="pe-7s-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <span class="ratings">
                                                        <span class="rating-wrap">
                                                            <span class="star"
                                                                style="width: {{ $product->ratings->avg('stars_rated') * 20 }}%"></span>
                                                        </span>
                                                        <span class="rating-num">({{ $product->ratings->count() }}
                                                            Review{{ $product->ratings->count() !== 1 ? 's' : '' }})</span>
                                                    </span>
                                                    <h5 class="title"><a
                                                            href="{{ route('product.show', $product->slug) }}">{{ $product->meta_title }}</a>
                                                    </h5>
                                                    <span class="price">
                                                        <span
                                                            class="new">Rs.{{ $product->selling_price }}.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- Single Product -->
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-buttons">
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Trending tab end -->

                        <!-- Popular tab start -->
                        <div class="tab-pane fade show" id="tab-product-popular">
                            <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                                <div class="new-product-wrapper swiper-wrapper">
                                    @foreach ($popularProducts as $product)
                                        <div class="new-product-item swiper-slide">
                                            <!-- Single Product -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="{{ route('product.show', $product->slug) }}"
                                                        class="image">
                                                        <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}"
                                                            alt="{{ $product->name }}" />
                                                        <img class="hover-image"
                                                            src="{{ asset('storage/' . json_decode($product->images)[1]) }}"
                                                            alt="{{ $product->name }}" />
                                                    </a>

                                                    <span class="badges">
                                                        @if ($product->trending)
                                                            <span class="new">Trending</span>
                                                        @endif
                                                        @if ($product->popular)
                                                            <span class="new">Popular</span>
                                                        @endif
                                                    </span>
                                                    <div class="actions">
                                                        <a href="#" class="action quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                                class="pe-7s-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <span class="ratings">
                                                        <span class="rating-wrap">
                                                            <span class="star"
                                                                style="width: {{ $product->ratings->avg('stars_rated') * 20 }}%"></span>
                                                        </span>
                                                        <span class="rating-num">({{ $product->ratings->count() }}
                                                            Review{{ $product->ratings->count() !== 1 ? 's' : '' }})</span>
                                                    </span>
                                                    <h5 class="title"><a
                                                            href="{{ route('product.show', $product->slug) }}">{{ $product->meta_title }}</a>
                                                    </h5>
                                                    <span class="price">
                                                        <span
                                                            class="new">Rs.{{ $product->selling_price }}.00</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- Single Product -->
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-buttons">
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Popular tab end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End -->

    <!-- Testimonial Area Start -->
    <div class="testimonial-area pb-40px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-0">
                        <h2 class="title line-height-1">#testimonials</h2>
                    </div>
                </div>
            </div>
            <!-- Slider Start -->
            <div class="testimonial-wrapper swiper-container">
                <div class="swiper-wrapper">
                    <!-- Slider Single Item -->
                    <div class="swiper-slide">
                        <div class="testi-inner">
                            <div class="reating-wrap">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="testi-content">
                                <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                </p>
                            </div>
                            <div class="testi-author">
                                <div class="author-img">
                                    <img src="assets/images/testimonial-image/1.png" alt="">
                                </div>
                                <div class="author-name">
                                    <h4 class="name">Daisy Morgan</h4>
                                    <span class="title">Happy Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item -->
                    <div class="swiper-slide">
                        <div class="testi-inner">
                            <div class="reating-wrap">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="testi-content">
                                <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                </p>
                            </div>
                            <div class="testi-author">
                                <div class="author-img">
                                    <img src="assets/images/testimonial-image/2.png" alt="">
                                </div>
                                <div class="author-name">
                                    <h4 class="name">Leah Chatman</h4>
                                    <span class="title">Happy Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item -->
                    <div class="swiper-slide">
                        <div class="testi-inner">
                            <div class="reating-wrap">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="testi-content">
                                <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                </p>
                            </div>
                            <div class="testi-author">
                                <div class="author-img">
                                    <img src="assets/images/testimonial-image/3.png" alt="">
                                </div>
                                <div class="author-name">
                                    <h4 class="name">Reyna Chung</h4>
                                    <span class="title">Happy Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item -->
                    <div class="swiper-slide">
                        <div class="testi-inner">
                            <div class="reating-wrap">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="testi-content">
                                <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                </p>
                            </div>
                            <div class="testi-author">
                                <div class="author-img">
                                    <img src="assets/images/testimonial-image/1.png" alt="">
                                </div>
                                <div class="author-name">
                                    <h4 class="name">Daisy Morgan</h4>
                                    <span class="title">Happy Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item -->
                    <div class="swiper-slide">
                        <div class="testi-inner">
                            <div class="reating-wrap">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="testi-content">
                                <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                </p>
                            </div>
                            <div class="testi-author">
                                <div class="author-img">
                                    <img src="assets/images/testimonial-image/2.png" alt="">
                                </div>
                                <div class="author-name">
                                    <h4 class="name">Reyna Chung</h4>
                                    <span class="title">Happy Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item -->
                </div>
            </div>
            <!-- Slider Start -->
        </div>
    </div>
    <!-- Testimonial Area End -->

    <!-- Brand area start -->
    <div class="brand-area pb-100px">
        <div class="container">
            <div class="brand-slider swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="images/brand-logo/1.png"
                                alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="images/brand-logo/2.png"
                                alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="images/brand-logo/3.png"
                                alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="images/brand-logo/4.png"
                                alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="images/brand-logo/5.png"
                                alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand area end -->

    <!-- Whatsapp Chat Start -->
    <div class="whatsapp-chat">
        <a href="https://wa.me/+94717578964?text=Thank%20you%20for%20contact%20us" target="_blank">
            <img src="{{ asset('images/icons/whatsapp.png') }}" alt="whatsapp-logo" height="60px" width="60px">
        </a>
    </div>
    <!-- Whatsapp Chat End -->

    <!-- Footer Area Start -->
    @include('layouts.web.partials.footer')
    <!-- Footer Area End -->

    <!-- Search Modal -->
    <x-home.search-modal />

    <!-- Product Modal -->
    <x-home.product-modal />

    <!-- Vendor JS -->
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="js/vendor/jquery-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/plugins/swiper-bundle.min.js"></script>
    <script src="js/plugins/jquery-ui.min.js"></script>
    <script src="js/plugins/jquery.nice-select.min.js"></script>
    <script src="js/plugins/countdown.js"></script>
    <script src="js/plugins/scrollup.js"></script>
    <script src="js/plugins/jquery.zoom.min.js"></script>
    <script src="js/plugins/venobox.min.js"></script>
    <script src="js/plugins/ajax-mail.js"></script>
    <script src="js/main.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/64cfb2db94cf5d49dc68c418/1h75lo68a';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>

    @if (session('status'))
        <script>
            swal("Good job!", "{{ session('status') }}", "success");
        </script>
    @endif
</body>

</html>
