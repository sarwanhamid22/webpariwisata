<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Wisata Wakatobi | @yield('title', 'Beranda')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Tour & Travels Agency Tailwind CSS Template" name="description">
    <meta
        content="Tour, Travels, agency, business, corporate, tour packages, journey, trip, tailwind css, Admin, Landing"
        name="keywords">
    <meta name="author" content="Shreethemes">
    <meta name="website" content="https://shreethemes.in">
    <meta name="email" content="support@shreethemes.in">
    <meta name="version" content="1.5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">


    <!-- Photo Sphere Viewer CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/photo-sphere-viewer@4/dist/photo-sphere-viewer.min.css" />

    <!-- Local Assets -->
    <link href="{{ asset('assets/libs/swiper/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/js-datepicker/datepicker.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/tailwind.css') }}" rel="stylesheet" type="text/css">

    @yield('head')



    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


</head>

<body class="dark:bg-slate-900">
    <!-- Loader Start -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader End -->

    @php
        $authUser = Auth::user();
    @endphp


    @if (Request::is('/'))
        @include('partials.tagline')
    @endif

    @include('layouts.alert')

    @include('partials.header')

    <div>
        @yield('content')
    </div>



    @include('partials.footer')

    <!-- JAVASCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/three@0.147/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uevent@2/browser.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/photo-sphere-viewer@4/dist/photo-sphere-viewer.min.js"></script>
    <script src="{{ asset('assets/libs/swiper/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tobii/js/tobii.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tiny-slider/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/libs/js-datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('scripts')

    <!-- JAVASCRIPTS -->

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800, // Durasi animasi
            offset: 100, // Offset sebelum animasi berjalan
        });
    </script>



</body>

</html>
