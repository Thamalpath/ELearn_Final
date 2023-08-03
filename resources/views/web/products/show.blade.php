@extends('layouts.web2')

@section('title', $product->name)

@section('pageTitle')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">{{ $product->name }}</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url('all-products') }}">Products</a></li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->
@endsection


@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Rate {{ $product->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if ($user_rating)
                                    @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" checked
                                            id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                        <input type="radio" value="{{ $j }}" name="product_rating"
                                            id="rating{{ $j }}">
                                        <label for="rating{{ $j }}" class="fa fa-star"></label>
                                    @endfor
                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-custom-close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-custom-save">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Product Details Area Start -->
    <div class="product-details-area pt-100px pb-100px product_data">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                    <div class="main-image zoom-image-hover">
                        <img class="img-responsive m-auto" src="{{ asset('storage/' . json_decode($product->images)[0]) }}"
                            alt="{{ $product->name }}"
                            data-zoom-image="{{ asset('storage/' . json_decode($product->images)[0]) }}">
                    </div>
                    <div class="swiper-container zoom-thumbs mt-3 mb-3">
                        <div class="swiper-wrapper">
                            @foreach (json_decode($product->images) as $image)
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto small-image" src="{{ asset('storage/' . $image) }}"
                                        alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content">
                        <h2>{{ $product->meta_title }}</h2>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">Rs.{{ $product->selling_price }}.00</li>
                            </ul>
                        </div>

                        @php $ratenum = number_format($rating_value) @endphp
                        <div class="pro-details-rating-wrap mb-4">
                            <div class="rating-product">
                                @for ($i = 1; $i <= $ratenum; $i++)
                                    <i class="fa fa-star checked"></i>
                                @endfor
                                @for ($j = $ratenum + 1; $j <= 5; $j++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>
                            <span class="read-review">
                                @if ($ratings->count() > 0)
                                    <p class="reviews">({{ $ratings->count() }} Ratings)</p>
                                @else
                                    (No Ratings)
                                @endif
                            </span>
                        </div>

                        @if ($product->status === 'Available')
                            <li>
                                <h5 style="color: #009900; font-weight: 700;">{{ $product->status }}</h5>
                            </li>
                        @elseif($product->status === 'Out of Stock')
                            <li>
                                <h5 style="color: red; font-weight: 700;">{{ $product->status }}</h5>
                            </li>
                        @endif

                        <div class="pro-details-color-info d-flex align-items-center">
                            <span>Color</span>
                            <div class="pro-details-color">
                                <ul>
                                    @foreach ($productColors as $color)
                                        <li>
                                            <a class="color-selection" style="background-color: {{ $color }};"
                                                href="#" data-color="{{ $color }}"></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="pro-details-size-info d-flex align-items-center">
                            <span>Size</span>
                            <div class="pro-details-size">
                                <ul>
                                    @foreach ($productSizes as $size)
                                        <li>
                                            <a class="gray" href="#"
                                                data-size="{{ $size }}">{{ $size }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <p class="m-0">{{ $product->meta_description }}</p>

                        <div class="pro-details-quality">
                            <input type="hidden" value="{{ $product->id }}" class="prod_id">
                            <input type="hidden" value="" class="selected_color">
                            <input type="hidden" value="" class="selected_size">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box qty-input" type="text" name="qtybutton"
                                    value="1" />
                            </div>

                            @if ($product->status === 'Available')
                                <div class="pro-details-cart">
                                    <button class="add-to-cart" href="#"> Add To Cart</button>
                                </div>
                            @elseif($product->status === 'Out of Stock')
                            @endif
                        </div>

                        <div class="pro-details-sku-info pro-details-same-style  d-flex mb-2">
                            <span>SKU: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">{{ $product->number }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="pro-details-sku-info pro-details-same-style  d-flex mb-2">
                            <span>Material: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">{{ $product->material }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="pro-details-sku-info pro-details-same-style  d-flex mb-2">
                            <span>Quantity: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">{{ $product->qty }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="pro-details-social-info pro-details-same-style d-flex mb-2">
                            <span>Share: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- product details description area start -->
    <div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a class="active" data-bs-toggle="tab" href="#des-details1">Description</a>
                    <a data-bs-toggle="tab" href="#des-details2">Rating</a>
                    <a data-bs-toggle="tab" href="#des-details3">Reviews ()</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-wrapper">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                    <div id="des-details2" class="tab-pane">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Rate this product
                            </button>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="review-wrapper">
                                    <div class="single-review">
                                        <div class="review-img">
                                            <img src="assets/images/review-image/1.png" alt="" />
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>White Lewis</h4>
                                                    </div>
                                                    <div class="rating-product">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>
                                                    Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                    cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper
                                                    euismod vehicula. Phasellus quam nisi, congue id nulla.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-review child-review">
                                        <div class="review-img">
                                            <img src="assets/images/review-image/2.png" alt="" />
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>White Lewis</h4>
                                                    </div>
                                                    <div class="rating-product">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="review-left">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                    cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                                                    euismod vehicula.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="ratting-form-wrapper pl-50">
                                    <h3>Add a Review</h3>
                                    <div class="ratting-form">
                                        <form action="#">
                                            <div class="star-box">
                                                <span>Your rating:</span>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="rating-form-style">
                                                        <input placeholder="Name" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="rating-form-style">
                                                        <input placeholder="Email" type="email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <textarea name="Your Review" placeholder="Message"></textarea>
                                                        <button class="btn btn-primary btn-hover-color-primary "
                                                            type="submit" value="Submit">Submit</button>
                                                    </div>
                                                </div>
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
    <!-- product details description area end -->

    <!-- Related product Area Start -->
    <div class="related-product-area pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30px0px line-height-1">
                        <h2 class="title m-0">Related Products</h2>
                    </div>
                </div>
            </div>

            <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                <div class="new-product-wrapper swiper-wrapper">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="new-product-item swiper-slide">
                            <!-- Single Prodect -->
                            <div class="product">
                                <div class="thumb">
                                    <a href="{{ route('product.show', $relatedProduct->slug) }}" class="image">
                                        <img src="{{ asset('storage/' . json_decode($relatedProduct->images)[0]) }}"
                                            alt="{{ $relatedProduct->name }}" />
                                        <img class="hover-image"
                                            src="{{ asset('storage/' . json_decode($relatedProduct->images)[1]) }}"
                                            alt="{{ $relatedProduct->name }}" />
                                    </a>
                                    <span class="badges">
                                        @if ($relatedProduct->trending)
                                            <span class="new">Trending</span>
                                        @endif
                                        @if ($relatedProduct->popular)
                                            <span class="new">Popular</span>
                                        @endif
                                    </span>
                                    <div class="actions">
                                        <a href="#" class="action wishlist" title="Wishlist"><i
                                                class="pe-7s-like"></i></a>
                                        <a href="#" class="action quickview" title="Quick view"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="pe-7s-search"></i></a>
                                    </div>
                                    <button title="Add To Cart" class="add-to-cart">Add To Cart</button>
                                </div>
                                <div class="content">
                                    <span class="ratings">
                                        <span class="rating-wrap">
                                            <span class="star" style="width: 100%"></span>
                                        </span>
                                        <span class="rating-num">(5 Review)</span>
                                    </span>
                                    <h5 class="title"><a
                                            href="{{ route('product.show', $relatedProduct->slug) }}">{{ $relatedProduct->meta_title }}</a>
                                    </h5>
                                    <span class="price">
                                        <span class="new">Rs.{{ $relatedProduct->selling_price }}.00</span>
                                    </span>
                                </div>
                            </div>
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
    </div>
    <!-- Related product Area End -->
@endsection
