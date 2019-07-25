<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from themevessel-item.s3-website-us-east-1.amazonaws.com/neer/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:43:34 GMT -->
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PTNPV7L');</script>
    <!-- End Google Tag Manager -->
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap-submenu.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/leaflet.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/map.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/fonts/linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend_assets/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend_assets/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend_assets/css/slick.css')}}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('frontend_assets/css/skins/default.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('frontend_assets/img/favicon.ico')}}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">

</head>
<body>



@include('frontend.partials.navbar')
@yield('content')

@include('frontend.partials.footer')
<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="http://themevessel-item.s3-website-us-east-1.amazonaws.com/neer/index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">CARI</button>
    </form>
</div>

<script src="{{ asset('frontend_assets/js/jquery-2.2.0.min.js')}}"></script>
<script src="{{ asset('frontend_assets/js/popper.min.js')}}"></script>
<script src="{{ asset('frontend_assets/js/bootstrap.min.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/bootstrap-submenu.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/rangeslider.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.mb.YTPlayer.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/bootstrap-select.min.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.easing.1.3.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.scrollUp.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/leaflet.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/leaflet-providers.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/leaflet.markercluster.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/dropzone.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/slick.min.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.filterizr.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.magnific-popup.min.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/jquery.countdown.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/maps.js')}}"></script>
<script  src="{{ asset('frontend_assets/js/app.js')}}"></script>
@stack('script')

</body>


</html>
