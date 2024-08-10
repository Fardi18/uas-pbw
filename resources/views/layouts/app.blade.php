{{-- <!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS Custom -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/icon-bengkel.png') }}" rel="Shorcut Icon" type="image/png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Bengkelin | @yield('title')</title>

</head>

<body>

    @include('layouts.navbar')
    <div>
        @yield('content')
        @include('sweetalert::alert')
    </div>

    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    @stack('javascript')

</body>

</html> --}}
<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
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
    <title>Repair X Shop | @yield('title')</title>
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

</html>
