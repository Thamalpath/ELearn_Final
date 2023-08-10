<header>
    <div class="header-main sticky-nav ">
        <div class="container position-relative">
            <div class="row">
                <div class="col-auto align-self-center">
                    <div class="header-logo text-center">
                        <a href="{{ url('/') }}" class="d-block">
                            <img src="images/logo/Logo.png" class="img-fluid mx-auto py-2" alt="Site Logo"
                                style="max-height: 80px; width: auto;" />
                            <span class="d-inline-block mx-2" style="color: #4c4c4c">Daisy</span><span
                                style="color: #fb5d5d" class="d-inline-block">
                                Wardrobe</span>
                        </a>
                    </div>
                </div>

                <div class="col align-self-center d-none d-lg-block">
                    <div class="main-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="dropdown position-static">
                                <a href="{{ route('all.products') }}">Shop <i class="pe-7s-angle-down"></i></a>
                                <ul class="mega-menu d-block">
                                    <li class="d-flex">
                                        <ul class="d-block">
                                            <div class="image-wrapper mt-4">
                                                <img src="{{ asset('images/banner/Shop_Image.jpg') }}" alt="Shop Image"
                                                    width="250px" height="auto" class="shop-image">
                                                @foreach ($categories as $category)
                                                    @foreach ($category->subCategories as $subCategory)
                                                        <img src="{{ asset('storage/' . $subCategory->image) }}"
                                                            alt="{{ $subCategory->name }} Image" width="250px"
                                                            height="auto" class="sub-category-image">
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </ul>
                                        @foreach ($categories as $category)
                                            <ul class="d-block">
                                                <li class="title"><a href="#">{{ $category->name }}</a></li>
                                                @foreach ($category->subCategories as $subCategory)
                                                    <li>
                                                        <a href="{{ route('subcategory.products', $subCategory->slug) }}"
                                                            class="sub-category-link">{{ $subCategory->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                            <li><a href="about.html">About us</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Action Start -->
                <div class="col col-lg-auto align-self-center pl-0">
                    <div class="header-actions">
                        @auth
                            @if (auth()->check() && auth()->user()->role_as == '0')
                                <div class="dropdown">
                                    <a href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        {{ auth()->user()->fname }} <i class="pe-7s-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                                        <li><a class="dropdown-item" href="{{ url('my-account') }}">Account</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="header-action-btn login-btn">Sign In</a>
                        @endauth

                        <a href="#" class="header-action-btn" data-bs-toggle="modal"
                            data-bs-target="#searchActive">
                            <i class="pe-7s-search"></i>
                        </a>

                        @auth
                            @if (auth()->user()->role_as == '0')
                                <a href="{{ route('cart') }}" class="header-action-btn header-action-btn-cart pr-0">
                                    <i class="pe-7s-shopbag"></i>
                                    <span class="header-action-num cart-count">0</span>
                                </a>
                            @endif
                        @else
                            <a href="{{ route('cart') }}" class="header-action-btn header-action-btn-cart pr-0">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num cart-count">0</span>
                            </a>
                        @endauth


                        <a href="#offcanvas-mobile-menu"
                            class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                            <i class="pe-7s-menu"></i>
                        </a>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
</header>

<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas-close"></button>

    <div class="inner customScroll">

        <div class="offcanvas-menu mb-4">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>

                <li class="dropdown position-static">
                    <a href="#">Shop <i class="pe-7s-angle-down"></i></a>
                    <ul class="mega-menu d-block">
                        <li class="d-flex">
                            <ul class="d-block">
                                <div class="image-wrapper mt-4">
                                    <img src="{{ asset('images/banner/Shop_Image.jpg') }}" alt="Shop Image"
                                        width="250px" height="auto" class="shop-image">
                                    @foreach ($categories as $category)
                                        @foreach ($category->subCategories as $subCategory)
                                            <img src="{{ asset('storage/' . $subCategory->image) }}"
                                                alt="{{ $subCategory->name }} Image" width="250px" height="auto"
                                                class="sub-category-image">
                                        @endforeach
                                    @endforeach
                                </div>
                            </ul>
                            @foreach ($categories as $category)
                                <ul class="d-block">
                                    <li class="title"><a href="#">{{ $category->name }}</a></li>
                                    @foreach ($category->subCategories as $subCategory)
                                        <li>
                                            <a href="{{ route('subcategory.products', $subCategory->slug) }}"
                                                class="sub-category-link">{{ $subCategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </li>
                    </ul>
                </li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </div>
        <!-- OffCanvas Menu End -->
        <div class="offcanvas-social mt-auto">
            <ul>
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
