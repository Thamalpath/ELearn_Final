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

    @yield('pageTitle')
    @yield('content')

    <!-- Footer Area Start -->
    @include('layouts.web.partials.footer')
    <!-- Footer Area End -->

    <!-- Search Modal -->
    <x-home.search-modal />

    <!-- Login Modal -->
    <x-home.login-modal />

    <!-- Product Modal -->
    <x-home.product-modal />

    <!-- medium-zoom JS -->

    <!-- Vendor JS -->
    <script src="{{ asset('js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/plugins/countdown.js') }}"></script>
    <script src="{{ asset('js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/plugins/venobox.min.js') }}"></script>
    <script src="{{ asset('js/plugins/ajax-mail.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')

    <!-- Notyf -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/dash/custom.js') }}"></script>
</body>

</html>
