@extends('layouts.web2')

@section('title')
    Register
@endsection

@section('pageTitle')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Register</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('login') }}">Login</a></li>
                        <li class="breadcrumb-item active">Register</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
@endsection

@section('content')
    <!-- Register area start -->
    <div class="login-register-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active">
                                <h4>Register Form</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form method="post" action="{{ route('register') }}">
                                            @csrf

                                            <div class="input-group mb-3">
                                                <input type="text" name="fname" value="{{ old('fname') }}"
                                                    class="form-control @error('fname') is-invalid @enderror"
                                                    placeholder="First Name">
                                                @error('fname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-3">
                                                <input type="text" name="lname" value="{{ old('lname') }}"
                                                    class="form-control @error('lname') is-invalid @enderror"
                                                    placeholder="Last Name">
                                                @error('lname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-3">
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-3">
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-3">
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    placeholder="Retype password">
                                            </div>

                                            <div class="button-box mb-4">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                                    <label for="agreeTerms">
                                                        I agree to the <a class="ms-1" href="#">terms</a>
                                                    </label>
                                                </div>
                                                <button type="submit">Register</button>
                                            </div>
                                        </form>
                                        <a class="text-center" href="{{ route('login') }}">I already have a
                                            membership</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register area end -->
@endsection
