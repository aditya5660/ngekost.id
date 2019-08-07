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
                <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/jquery.mCustomScrollbar.css')}}">
                <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/dropzone.css')}}">
                <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/slick.css')}}">

                <link  href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

                <!-- Custom stylesheet -->
                <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/style.css')}}">
                <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('frontend_assets/css/skins/default.css')}}">

                <!-- Favicon icon -->
                <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

                <!-- Google fonts -->
                <link rel="stylesheet" type="text/css"
                    href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
                @stack('head')
                @toastr_css
            </head>
<body>

    <!-- Main header start -->
    <header class="main-header header-2 fixed-header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand logo pad-0" href="{{route('home')}}">
                    <img src="{{asset('logo/logo-blue.png')}}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if(Request::is('admin','admin/*'))
                        @include('layouts.admin_mobile_sidebar')
                    @elseif(Request::is('users','users/*'))
                        @include('layouts.user_mobile_sidebar')
                    @elseif(Request::is('owner','owner/*'))
                        @include('layouts.owner_mobile_sidebar')
                    @endif
                    <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
                        <ul>
                            <li>
                                <div class="dropdown btns">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{asset('storage/users/'.auth()->user()->image)}}" alt="avatar">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu">
                                        @if(Request::is('admin','admin/*'))
                                            <a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a>
                                            <a class="dropdown-item" href="{{route('admin.profile')}}">Profile</a>
                                        @elseif(Request::is('users','users/*'))
                                            <a class="dropdown-item" href="{{route('users.dashboard')}}">Dashboard</a>
                                            <a class="dropdown-item" href="{{route('users.profile')}}">Profile</a>
                                        @elseif(Request::is('owner','owner/*'))
                                            <a class="dropdown-item" href="{{route('owner.dashboard')}}">Dashboard</a>
                                            <a class="dropdown-item" href="{{route('owner.profile')}}">Profile</a>
                                        @endif
                                        <a class="dropdown-item" href="{{route('home')}}">Go To Site</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- Main header end -->

    <!-- Dashbord start -->
    <div class="dashboard">
        <div class="container-fluid">
            <div class="row">
                    @if(Request::is('admin','admin/*'))
                        @include('layouts.admin_sidebar')
                    @elseif(Request::is('users','users/*'))
                        @include('layouts.user_sidebar')
                    @elseif(Request::is('owner','owner/*'))
                        @include('layouts.owner_sidebar')
                    @endif
                    <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Dashbord end -->


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="{{ asset('frontend_assets/js/popper.min.js')}} "></script>
    {{-- <script src="{{ asset('frontend_assets/js/bootstrap.min.js')}} "></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap-submenu.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/jquery.mb.YTPlayer.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/bootstrap-select.min.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/jquery.easing.1.3.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/jquery.scrollUp.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/jquery.mCustomScrollbar.concat.min.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/leaflet.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/leaflet-providers.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/leaflet.markercluster.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/dropzone.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/slick.min.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/jquery.filterizr.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/jquery.magnific-popup.min.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/jquery.countdown.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/maps.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/app.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/numberic.js')}} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    @toastr_js
    @toastr_render

    @stack('script')

</body>



</html>
