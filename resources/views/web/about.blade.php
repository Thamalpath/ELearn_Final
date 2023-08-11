@extends('layouts.web2')

@section('title')
    About Us
@endsection

@section('content')
    <!-- About Intro Area start-->
    <div class="about-intro-area">
        <div class="container position-relative h-100 d-flex align-items-center">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-intro-content">
                        <h2 class="title">About Us</h2>
                        <p>Welcome to Daisy Wardrobe, your ultimate destination for fashion and style. At Daisy Wardrobe, we
                            believe that fashion is not just about clothing; it's a statement, an expression of your unique
                            personality and taste.
                        </p><br>
                        <p>
                            Founded with a passion for fashion and a dedication to quality, Daisy Wardrobe is your go-to
                            online clothing store for all things stylish and trendy. Our carefully curated collection
                            features a wide range of clothing items that cater to different tastes, occasions, and
                            lifestyles.
                        </p>
                    </div>
                </div>
            </div>
            <div class="intro-left">
                <img src="images/about-image/intro-left.png" alt="" class="intro-left-image">
            </div>
            <div class="intro-right">
                <img src="images/about-image/intro-right.png" alt="" class="intro-right-image">
            </div>
        </div>
    </div>

    <!-- About Intro Area End-->

    <!-- Service Area Start -->

    <div class="service-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="service-left align-self-center align-items-center">
                        <img src="images/about-image/srevice-left-img.png" alt="" class="service-left-image">
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="service-right-content align-self-center align-items-center">
                        <span class="sami-title">100% Guaranteed Pure Cotton</span>
                        <h2 class="title">Best Products Here
                            Every Day</h2>
                        <p>Thank you for choosing Daisy Wardrobe as your fashion companion. Join us on this exciting journey
                            of self-discovery and style, and let your wardrobe speak volumes about who you are.</p>
                        <a href="{{ route('all.products') }}" class="btn btn-primary service-btn"> Shop Now <i
                                class="fa fa-shopping-basket ml-10px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Area End -->

    <!-- Team Area Start -->

    <div class="team-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30px0px">
                        <h2 class="title line-height-1">OUR TEAM</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-lm-30px">
                    <!-- Single Team -->
                    <div class="team-wrapper">
                        <div class="team-image overflow-hidden">
                            <img src="images/team/1.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <h6 class="title">Howard Burns</h6>
                            <span class="sub-title">Our Team</span>
                        </div>
                        <ul class="team-social d-flex">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    <!-- Single Team -->
                </div>
                <div class="col-md-4 mb-lm-30px">
                    <!-- Single Team -->
                    <div class="team-wrapper">
                        <div class="team-image overflow-hidden">
                            <img src="images/team/2.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <h6 class="title">Lester Houser</h6>
                            <span class="sub-title">Our Team</span>
                        </div>
                        <ul class="team-social d-flex">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    <!-- Single Team -->
                </div>
                <div class="col-md-4">
                    <!-- Single Team -->
                    <div class="team-wrapper">
                        <div class="team-image overflow-hidden">
                            <img src="images/team/3.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <h6 class="title">Craig Chaney</h6>
                            <span class="sub-title">Our Team</span>
                        </div>
                        <ul class="team-social d-flex">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                    <!-- Single Team -->
                </div>
            </div>
        </div>
    </div>

    <!-- Team Area End -->
@endsection
