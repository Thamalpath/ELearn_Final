<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up" data-aos-delay="200">
    <!-- Single Prodect -->
    <div class="product">
        <div class="thumb">
            <a href="{{ route('product.show', $product->slug) }}" class="image">
                <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" alt="{{ $product->name }}" />
                <img class="hover-image" src="{{ asset('storage/' . json_decode($product->images)[1]) }}"
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
                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="pe-7s-like"></i></a>
                <a href="#" class="action quickview" data-link-action="quickview" title="Quick view"
                    data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
            </div>
        </div>
        <div class="content">
            <span class="ratings">
                <span class="rating-wrap">
                    <span class="star" style="width: 100%"></span>
                </span>
                <span class="rating-num">(5 Review)</span>
            </span>
            <h5 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->meta_title }}</a></h5>
            <span class="price">
                <span class="new">Rs.{{ $product->selling_price }}.00</span>
            </span>
        </div>
    </div>
    <!-- Single Prodect -->
</div>
