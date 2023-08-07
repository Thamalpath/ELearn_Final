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
    <!-- SweetAlert CDN -->
    <script script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/dash/custom.js') }}"></script>

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

    <script>
        function redirectToLogin() {
            window.location.href = "{{ route('login') }}";
        }
    </script>

    @yield('scripts')
</body>

</html>
