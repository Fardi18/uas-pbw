<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/user-tamplate') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('/user-tamplate') }}/css/tiny-slider.css" rel="stylesheet">
    <link href="{{ asset('/user-tamplate') }}/css/style.css" rel="stylesheet">
    <!-- CSS Custom -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>CARS | @yield('title')</title>
    <title></title>
</head>

<body>

    <!-- Start Header/Navigation -->
    @include('layouts.navbar')
    <!-- End Header/Navigation -->

    <div>
        @yield('content')
        @include('sweetalert::alert')
    </div>

    @include('layouts.footer')
    <!-- End Footer Section -->


    <script src="{{ asset('/user-tamplate') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/user-tamplate') }}/js/tiny-slider.js"></script>
    <script src="{{ asset('/user-tamplate') }}/js/custom.js"></script>
    @stack('javascript')
</body>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>


</html>
