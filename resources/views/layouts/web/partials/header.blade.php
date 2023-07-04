<header>
    <div class="header-main sticky-nav ">
        <div class="container position-relative">
            <div class="row">
                <div class="col-auto align-self-center">
                    <div class="header-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Site Logo" /></a>
                    </div>
                </div>
                <div class="col align-self-center d-none d-lg-block">
                    <div class="main-menu">
                        <ul>
                            <li class="dropdown"><a href="#">Home <i class="pe-7s-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                </ul>
                            </li>
                            <li class="dropdown position-static"><a href="#">Shop <i
                                        class="pe-7s-angle-down"></i></a>
                                <ul class="mega-menu d-block">
                                    <li class="d-flex">
                                        <ul class="d-block">

                                            <li class="title"><a href="#">Shop Page</a></li>
                                            <li><a href="shop-3-column.html">Shop 3 Column</a></li>
                                            <li><a href="shop-4-column.html">Shop 4 Column</a></li>
                                            <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                            <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
                                            </li>
                                            <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a>
                                            </li>
                                        </ul>
                                        <ul class="d-block">
                                            <li class="title"><a href="#">product Details Page</a></li>
                                            <li><a href="single-product.html">Product Single</a></li>
                                            <li><a href="single-product-variable.html">Product Variable</a></li>
                                            <li><a href="single-product-affiliate.html">Product Affiliate</a></li>
                                            <li><a href="single-product-group.html">Product Group</a></li>
                                            <li><a href="single-product-tabstyle-2.html">Product Tab 2</a></li>
                                            <li><a href="single-product-tabstyle-3.html">Product Tab 3</a></li>
                                        </ul>
                                        <ul class="d-block">
                                            <li class="title"><a href="#">Single Product Page</a></li>
                                            <li><a href="single-product-slider.html">Product Slider</a></li>
                                            <li><a href="single-product-gallery-left.html">Product Gallery Left</a>
                                            </li>
                                            <li><a href="single-product-gallery-right.html">Product Gallery
                                                    Right</a>
                                            </li>
                                            <li><a href="single-product-sticky-left.html">Product Sticky Left</a>
                                            </li>
                                            <li><a href="single-product-sticky-right.html">Product Sticky Right</a>
                                            </li>
                                        </ul>
                                        <ul class="d-block">
                                            <li class="title"><a href="#">Other Shop Pages</a></li>
                                            <li><a href="cart.html">Cart Page</a></li>
                                            <li><a href="checkout.html">Checkout Page</a></li>
                                            <li><a href="compare.html">Compare Page</a></li>
                                            <li><a href="wishlist.html">Wishlist Page</a></li>
                                            <li><a href="my-account.html">Account Page</a></li>
                                            <li><a href="login.html">Login & Register Page</a></li>
                                            <li><a href="empty-cart.html">Empty Cart Page</a></li>
                                        </ul>
                                        <ul class="d-block">
                                            <li class="title"><a href="#">Pages</a></li>
                                            <li><a href="404.html">404 Page</a></li>
                                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                            <li><a href="faq.html">Faq Page</a></li>
                                            <li><a href="coming-soon.html">Coming Soon Page</a></li>

                                        </ul>
                                    </li>
                                    <li>

                                        <ul class="menu-banner w-100">
                                            <li>
                                                <a class="p-0" href="shop-left-sidebar.html"><img
                                                        class="img-responsive w-100"
                                                        src="assets/images/banner/7.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="p-0" href="shop-left-sidebar.html"><img
                                                        class="img-responsive w-100"
                                                        src="assets/images/banner/8.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="p-0" href="shop-left-sidebar.html"><img
                                                        class="img-responsive w-100"
                                                        src="assets/images/banner/9.jpg" alt=""></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown "><a href="#">Blogs <i class="pe-7s-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid.html">Blog Grid Page</a></li>
                                    <li><a href="blog-grid-left-sidebar.html">Grid Left Sidebar</a></li>
                                    <li><a href="blog-grid-right-sidebar.html">Grid Right Sidebar</a></li>
                                    <li><a href="blog-single.html">Blog Single Page</a></li>
                                    <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                                    <li><a href="blog-single-right-sidebar.html">Single Right Sidbar</a>
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
                            <a href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ auth()->user()->name }} <i class="pe-7s-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                                <li><a class="dropdown-item" href="#">Account</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                    
                        @else
                            <a href="login.html" class="header-action-btn login-btn" data-bs-toggle="modal"
                                data-bs-target="#loginActive">Sign In</a>
                        @endauth

                
                        <!-- Single Wedge Start -->
                        <a href="#" class="header-action-btn" data-bs-toggle="modal" data-bs-target="#searchActive">
                            <i class="pe-7s-search"></i>
                        </a>
                        <!-- Single Wedge End -->
                        <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart pr-0">
                            <i class="pe-7s-shopbag"></i>
                            <span class="header-action-num">01</span>
                            <!-- <span class="cart-amount">€30.00</span> -->
                        </a>
                        <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
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
                <li><a href="#"><span class="menu-text">Home</span></a>
                    <ul class="sub-menu">
                        <li><a href="index.html"><span class="menu-text">Home 1</span></a></li>
                        <li><a href="index-2.html"><span class="menu-text">Home 2</span></a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="menu-text">Shop</span></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#"><span class="menu-text">Shop Page</span></a>
                            <ul class="sub-menu">
                                <li class="title"><a href="#">Shop Page</a></li>
                                <li><a href="shop-3-column.html">Shop 3 Column</a></li>
                                <li><a href="shop-4-column.html">Shop 4 Column</a></li>
                                <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                                <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">product Details Page</span></a>
                            <ul class="sub-menu">
                                <li><a href="single-product.html">Product Single</a></li>
                                <li><a href="single-product-variable.html">Product Variable</a></li>
                                <li><a href="single-product-affiliate.html">Product Affiliate</a></li>
                                <li><a href="single-product-group.html">Product Group</a></li>
                                <li><a href="single-product-tabstyle-2.html">Product Tab 2</a></li>
                                <li><a href="single-product-tabstyle-3.html">Product Tab 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">Single Product Page</span></a>
                            <ul class="sub-menu">
                                <li><a href="single-product-slider.html">Product Slider</a></li>
                                <li><a href="single-product-gallery-left.html">Product Gallery Left</a>
                                </li>
                                <li><a href="single-product-gallery-right.html">Product Gallery Right</a>
                                </li>
                                <li><a href="single-product-sticky-left.html">Product Sticky Left</a></li>
                                <li><a href="single-product-sticky-right.html">Product Sticky Right</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">Other Shop Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href="cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout Page</a></li>
                                <li><a href="compare.html">Compare Page</a></li>
                                <li><a href="wishlist.html">Wishlist Page</a></li>
                                <li><a href="my-account.html">Account Page</a></li>
                                <li><a href="login.html">Login & Register Page</a></li>
                                <li><a href="empty-cart.html">Empty Cart Page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href="404.html">404 Page</a></li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="faq.html">Faq Page</a></li>
                                <li><a href="coming-soon.html">Coming Soon Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><span class="menu-text">Blog</span></a>
                    <ul class="sub-menu">
                        <li><a href="blog-grid.html">Blog Grid Page</a></li>
                        <li><a href="blog-grid-left-sidebar.html">Grid Left Sidebar</a></li>
                        <li><a href="blog-grid-right-sidebar.html">Grid Right Sidebar</a></li>
                        <li><a href="blog-single.html">Blog Single Page</a></li>
                        <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                        <li><a href="blog-single-right-sidebar.html">Single Right Sidbar</a>
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
                    <a href="#"><i class="fa fa-google"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>