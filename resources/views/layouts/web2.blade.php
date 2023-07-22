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

    <script>
        const notyf = new Notyf({
            duration: 2000,
            position: {
                x: 'right',
                y: 'top',
            },
        });

        $(document).ready(function() {

            // Add To Cart Button
            $(".add-to-cart").click(function(e) {
                e.preventDefault();

                var product_id = $(this).closest(".product_data").find(".prod_id").val();
                var product_qty = $(this).closest(".product_data").find(".qty-input").val();

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    method: "POST",
                    url: "/add-to-cart",
                    data: {
                        product_id: product_id,
                        product_qty: product_qty,
                    },
                    success: function(response) {
                        notyf.success(response.status);
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 400) {
                            // If the response has 400 status code, show as an error notification
                            notyf.error(xhr.responseJSON.status);
                        } else {
                            // Handle other error scenarios here if needed
                        }
                    },
                });
            });
        });
    </script>


</body>

</html>
