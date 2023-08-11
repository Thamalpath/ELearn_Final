<meta charset="UTF-8">
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="robots" content="index, follow" />

{{-- CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>
    @hasSection('title')
        @yield('title')@else{{ config('app.name', 'Laravel') }}
    @endif
</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<!-- Add site Favicon -->
<link rel="shortcut icon" href="images/logo/Logo.png" type="image/png">

<!-- vendor css (Icon Font) -->
<link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.bundle.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/vendor/pe-icon-7-stroke.css') }}" />
<link rel="stylesheet" href="{{ asset('css/vendor/font.awesome.css') }}" />

<!-- plugins css (All Plugins Files) -->
<link rel="stylesheet" href="{{ asset('css/plugins/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/plugins/jquery-ui.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/plugins/nice-select.css') }}" />
<link rel="stylesheet" href="{{ asset('css/plugins/venobox.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/dash/custom.css') }}" />

{{-- Notyf CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
