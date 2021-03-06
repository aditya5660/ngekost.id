<!DOCTYPE html>
<html lang="zxx">


<head>

    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap-submenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/leaflet.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/map.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/fonts/linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend_assets/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend_assets/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend_assets/css/slick.css')}}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('frontend_assets/css/skins/default.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">

</head>
<body>


<!-- Contact section start -->
@yield('content')
<!-- Contact section end -->


<script src="{{ asset('frontend_assets/js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/bootstrap-submenu.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/rangeslider.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.mb.YTPlayer.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/bootstrap-select.min.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.easing.1.3.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.scrollUp.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/leaflet.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/leaflet-providers.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/leaflet.markercluster.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/dropzone.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/slick.min.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.filterizr.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.magnific-popup.min.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.countdown.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/maps.js') }}"></script>
<script  src="{{ asset('frontend_assets/js/app.js') }}"></script>

</body>


</html>
