<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

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

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('frontend_assets/css/skins/default.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTNPV7L" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    {{-- <div class="page_loader"></div> --}}

    <!-- Main header start -->
    <header class="main-header header-transparent sticky-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand logo" href="index.html">
                    <img src="img/logos/black-logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Index
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="index.html">Index 01</a></li>
                                <li><a class="dropdown-item" href="index-2.html">Index 02</a></li>
                                <li><a class="dropdown-item" href="index-3.html">Index 03</a></li>
                                <li><a class="dropdown-item" href="index-4.html">Index 04</a></li>
                                <li><a class="dropdown-item" href="index-5.html">Index 05</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Properties
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Property
                                        List</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="properties-list-rightside.html">Right
                                                Sidebar</a></li>
                                        <li><a class="dropdown-item" href="properties-list-leftsidebar.html">Left
                                                Sidebar</a></li>
                                        <li><a class="dropdown-item" href="properties-list-fullwidth.html">Fullwidth</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Property
                                        Grid</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="properties-grid-rightside.html">Right
                                                Sidebar</a></li>
                                        <li><a class="dropdown-item" href="properties-grid-leftside.html">Left
                                                Sidebar</a></li>
                                        <li><a class="dropdown-item" href="properties-grid-fullwidth.html">Fullwidth</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Property
                                        Map</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="properties-map-rightside-list.html">Map List
                                                01</a></li>
                                        <li><a class="dropdown-item" href="properties-map-leftside-list.html">Map List
                                                02</a></li>
                                        <li><a class="dropdown-item" href="properties-map-rightside-grid.html">Map Grid
                                                01</a></li>
                                        <li><a class="dropdown-item" href="properties-map-leftside-grid.html">Map Grid
                                                02</a></li>
                                        <li><a class="dropdown-item" href="properties-map-full.html">Map FullWidth</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Property
                                        Detail</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="properties-details.html">Property Detail
                                                01</a></li>
                                        <li><a class="dropdown-item" href="properties-details-2.html">Property Detail
                                                02</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink6"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Agents
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="agent-list.html">Agent List</a></li>
                                <li><a class="dropdown-item" href="agent-grid.html">Agent Grid</a></li>
                                <li><a class="dropdown-item" href="agent-detail.html">Agent Detail</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown megamenu-li">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Pages</a>
                            <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                <div class="megamenu-area">
                                    <div class="row sobuz">
                                        <div class="col-sm-6 col-md-4 col-lg-4">
                                            <div class="megamenu-section">
                                                <h6 class="megamenu-title">Pages</h6>
                                                <a class="dropdown-item" href="about.html">About</a>
                                                <a class="dropdown-item" href="services.html">Services</a>
                                                <a class="dropdown-item" href="elements.html">Elements</a>
                                                <a class="dropdown-item"
                                                    href="properties-list-rightside.html">Properties List</a>
                                                <a class="dropdown-item"
                                                    href="properties-grid-rightside.html">Properties Grid</a>
                                                <a class="dropdown-item"
                                                    href="properties-map-leftside-list.html">Properties Map</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-4">
                                            <div class="megamenu-section">
                                                <h6 class="megamenu-title">Pages</h6>
                                                <a class="dropdown-item" href="pricing-tables.html">Pricing Tables</a>
                                                <a class="dropdown-item" href="properties-comparison.html">Properties
                                                    Comparison</a>
                                                <a class="dropdown-item" href="search-brand.html">Properties Brands</a>
                                                <a class="dropdown-item" href="gallery-3column.html">Gallery 3
                                                    column</a>
                                                <a class="dropdown-item" href="gallery-4column.html">Gallery 4
                                                    column</a>
                                                <a class="dropdown-item" href="typography.html">Typography</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-4">
                                            <div class="megamenu-section">
                                                <h6 class="megamenu-title">Pages</h6>
                                                <a class="dropdown-item" href="faq.html">Faq</a>
                                                <a class="dropdown-item" href="icon.html">Icons</a>
                                                <a class="dropdown-item" href="contact.html">Contact</a>
                                                <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                                <a class="dropdown-item" href="404.html">Error Page</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink5"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Blog
                                        Columns</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="blog-columns-2col.html">2 Columns</a></li>
                                        <li><a class="dropdown-item" href="blog-columns-3col.html">3 Columns</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Blog
                                        Classic</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="blog-classic-sidebar-right.html">Right
                                                Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-classic-sidebar-left.html">Left
                                                Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-classic-fullwidth.html">FullWidth</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Blog
                                        Details</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="blog-single-sidebar-right.html">Right
                                                Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-single-sidebar-left.html">Left
                                                Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-single-fullwidth.html">Fullwidth</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink7"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My Account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="login.html">Login</a></li>
                                <li><a class="dropdown-item" href="signup.html">Register</a></li>
                                <li><a class="dropdown-item" href="forgot-password.html">Forgot Password</a></li>
                                <li><a class="dropdown-item" href="dashboard.html">Dashboard</a></li>
                                <li><a class="dropdown-item" href="my-profile.html">My Profile</a></li>
                                <li><a class="dropdown-item" href="my-properties.html">My Properties</a></li>
                                <li> <a class="dropdown-item" href="my-invoices.html">My Invoices</a></li>
                                <li><a class="dropdown-item" href="favorited-properties.html">Favorited Properties</a>
                                </li>
                                <li><a class="dropdown-item" href="messages.html">Messages</a></li>
                                <li><a class="dropdown-item" href="bookings.html">Bookings</a></li>
                                <li><a class="dropdown-item" href="submit-property.html">Submit Property</a></li>
                            </ul>
                        </li>
                        <li class="nav-item sp">
                            <a href="submit-property.html" class="nav-link link-color"><i class="fa fa-plus"></i> Submit
                                Property</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Main header end -->

    <!-- Banner start -->
@yield('slider')
    <!-- Banner end -->

    <!-- Search Section start -->
    <div class="search-section search-area pb-hediin-12 bg-grea animated fadeInDown" id="search-style-1">
        <div class="container">
            <div class="search-section-area">
                <div class="search-area-inner">
                    <div class="search-contents">
                        <form method="GET">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="any-status">
                                            <option>Any Status</option>
                                            <option>For Rent</option>
                                            <option>For Sale</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="all-type">
                                            <option>All Type</option>
                                            <option>Apartments</option>
                                            <option>Shop</option>
                                            <option>Restaurant</option>
                                            <option>Villa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bedrooms">
                                            <option>Bedrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bathrooms">
                                            <option>Bathrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="location">
                                            <option>location</option>
                                            <option>United States</option>
                                            <option>American Samoa</option>
                                            <option>Belgium</option>
                                            <option>Canada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <button class="search-button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Section end -->

    <!-- Featured Properties start -->
    <div class="featured-properties content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Featured Properties</h1>
                <p>Find your properties in your city</p>
            </div>
            <!-- Slick slider area start -->
            <div class="slick-slider-area">
                <div class="row slick-carousel"
                    data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <div class="slick-slide-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-box"><span>$850.00</span> Per month</div>
                                    <img class="d-block w-100" src="img/properties/properties-1.jpg" alt="properties">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="properties-details.html">Modern Family Home</a>
                                </h1>

                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                                    </a>
                                </div>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <span>Area</span>3600 Sqft
                                </li>
                                <li>
                                    <span>Beds</span> 3
                                </li>
                                <li>
                                    <span>Baths</span> 2
                                </li>
                                <li>
                                    <span>Garage</span> 1
                                </li>
                            </ul>
                            <div class="footer">
                                <a href="#">
                                    <i class="flaticon-people"></i> Jhon Doe
                                </a>
                                <span>
                                    <i class="flaticon-calendar"></i>5 Days ago
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-box"><span>$850.00</span> Per month</div>
                                    <img class="d-block w-100" src="img/properties/properties-2.jpg" alt="properties">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="properties-details.html">Two storey modern flat</a>
                                </h1>

                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                                    </a>
                                </div>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <span>Area</span>3600 Sqft
                                </li>
                                <li>
                                    <span>Beds</span> 3
                                </li>
                                <li>
                                    <span>Baths</span> 2
                                </li>
                                <li>
                                    <span>Garage</span> 1
                                </li>
                            </ul>
                            <div class="footer">
                                <a href="#">
                                    <i class="flaticon-people"></i> Jhon Doe
                                </a>
                                <span>
                                    <i class="flaticon-calendar"></i>5 Days ago
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-box"><span>$850.00</span> Per month</div>
                                    <img class="d-block w-100" src="img/properties/properties-3.jpg" alt="properties">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="properties-details.html">Luxury Villa</a>
                                </h1>

                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                                    </a>
                                </div>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <span>Area</span>3600 Sqft
                                </li>
                                <li>
                                    <span>Beds</span> 3
                                </li>
                                <li>
                                    <span>Baths</span> 2
                                </li>
                                <li>
                                    <span>Garage</span> 1
                                </li>
                            </ul>
                            <div class="footer">
                                <a href="#">
                                    <i class="flaticon-people"></i> Jhon Doe
                                </a>
                                <span>
                                    <i class="flaticon-calendar"></i>5 Days ago
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-box"><span>$850.00</span> Per month</div>
                                    <img class="d-block w-100" src="img/properties/properties-4.jpg" alt="properties">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="properties-details.html">Modern Family Home</a>
                                </h1>

                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                                    </a>
                                </div>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <span>Area</span>3600 Sqft
                                </li>
                                <li>
                                    <span>Beds</span> 3
                                </li>
                                <li>
                                    <span>Baths</span> 2
                                </li>
                                <li>
                                    <span>Garage</span> 1
                                </li>
                            </ul>
                            <div class="footer">
                                <a href="#">
                                    <i class="flaticon-people"></i> Jhon Doe
                                </a>
                                <span>
                                    <i class="flaticon-calendar"></i>5 Days ago
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-box"><span>$850.00</span> Per month</div>
                                    <img class="d-block w-100" src="img/properties/properties-5.jpg" alt="properties">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="properties-details.html">Relaxing Apartment</a>
                                </h1>

                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                                    </a>
                                </div>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <span>Area</span>3600 Sqft
                                </li>
                                <li>
                                    <span>Beds</span> 3
                                </li>
                                <li>
                                    <span>Baths</span> 2
                                </li>
                                <li>
                                    <span>Garage</span> 1
                                </li>
                            </ul>
                            <div class="footer">
                                <a href="#">
                                    <i class="flaticon-people"></i> Jhon Doe
                                </a>
                                <span>
                                    <i class="flaticon-calendar"></i>5 Days ago
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-box"><span>$850.00</span> Per month</div>
                                    <img class="d-block w-100" src="img/properties/properties-6.jpg" alt="properties">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="properties-details.html">Real Luxury Villa</a>
                                </h1>

                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                                    </a>
                                </div>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <span>Area</span>3600 Sqft
                                </li>
                                <li>
                                    <span>Beds</span> 3
                                </li>
                                <li>
                                    <span>Baths</span> 2
                                </li>
                                <li>
                                    <span>Garage</span> 1
                                </li>
                            </ul>
                            <div class="footer">
                                <a href="#">
                                    <i class="flaticon-people"></i> Jhon Doe
                                </a>
                                <span>
                                    <i class="flaticon-calendar"></i>5 Days ago
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-prev slick-arrow-buton">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="slick-next slick-arrow-buton">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Properties end -->

    <!-- Services start -->
    <div class="services content-area bg-grea-3">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1>Working with the Reality</h1>
                <p>Who you work with matters</p>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="service-info">
                        <div class="icon">
                            <i class="flaticon-user"></i>
                        </div>
                        <h3>Personalized Service</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="service-info">
                        <div class="icon">
                            <i class="flaticon-apartment-1"></i>
                        </div>
                        <h3>Luxury Real Estate Experts</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 d-none d-xl-block d-lg-block">
                    <div class="service-info">
                        <div class="icon">
                            <i class="flaticon-discount"></i>
                        </div>
                        <h3>Modern Building For Rent $ Sell</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services end -->

    <!-- Categories strat -->
    <div class="categories content-area-7">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1>Most Popular Places</h1>
                <p>Find Your Properties In Your City</p>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 col-pad">
                    <div class="category">
                        <div class="category_bg_box category_long_bg cat-4-bg">
                            <div class="category-overlay">
                                <div class="category-content">
                                    <h3 class="category-title">
                                        <a href="#">Apartment</a>
                                    </h3>
                                    <h4 class="category-subtitle">12 Properties</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 col-pad">
                            <div class="category">
                                <div class="category_bg_box cat-1-bg">
                                    <div class="category-overlay">
                                        <div class="category-content">
                                            <h3 class="category-title">
                                                <a href="properties-list-rightside.html">Form</a>
                                            </h3>
                                            <h4 class="category-subtitle">27 Properties</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-pad">
                            <div class="category">
                                <div class="category_bg_box cat-2-bg">
                                    <div class="category-overlay">
                                        <div class="category-content">
                                            <h3 class="category-title">
                                                <a href="#">House</a>
                                            </h3>
                                            <h4 class="category-subtitle">98 Properties</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-pad">
                            <div class="category">
                                <div class="category_bg_box cat-3-bg">
                                    <div class="category-overlay">
                                        <div class="category-content">
                                            <h3 class="category-title">
                                                <a href="#">Villa</a>
                                            </h3>
                                            <h4 class="category-subtitle">98 Properties</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-pad">
                            <div class="category">
                                <div class="category_bg_box cat-5-bg">
                                    <div class="category-overlay">
                                        <div class="category-content">
                                            <h3 class="category-title">
                                                <a href="#">Restaurant</a>
                                            </h3>
                                            <h4 class="category-subtitle">98 Properties</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories end -->

    <!-- Counters strat -->
    <div class="counters overview-bgi">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="counter-box">
                        <i class="flaticon-sale"></i>
                        <h1 class="counter">967</h1>
                        <p>Listings For Sale</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="counter-box">
                        <i class="flaticon-rent"></i>
                        <h1 class="counter">1276</h1>
                        <p>Listings For Rent</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="counter-box">
                        <i class="flaticon-user"></i>
                        <h1 class="counter">396</h1>
                        <p>Agents</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="counter-box">
                        <i class="flaticon-work"></i>
                        <h1 class="counter">177</h1>
                        <p>Brokers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counters end -->

    <!-- Our team start -->
    <div class="our-team content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Our Agent</h1>
                <p>We have professional agents</p>
            </div>
            <!-- Slick slider area start -->
            <div class="slick-slider-area">
                <div class="row slick-carousel"
                    data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <div class="slick-slide-item">
                        <div class="row team-2">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                                <div class="photo">
                                    <img src="img/avatar/avatar-10.jpg" alt="avatar-10" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                                <div class="detail">
                                    <h4>
                                        <a href="agent-detail.html">Karen Paran</a>
                                    </h4>
                                    <h5>Office Manager</h5>
                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-mail"></i><a
                                                    href="mailto:info@themevessel.com">info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55
                                                    4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="social-list clearfix">
                                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="row team-2">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                                <div class="photo">
                                    <img src="img/avatar/avatar-9.jpg" alt="avatar-9" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                                <div class="detail">
                                    <h4>
                                        <a href="agent-detail.html">Eliane Pereira</a>
                                    </h4>
                                    <h5>Creative Director</h5>
                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-mail"></i><a
                                                    href="mailto:info@themevessel.com">info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55
                                                    4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="social-list clearfix">
                                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="row team-2">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                                <div class="photo">
                                    <img src="img/avatar/avatar-10.jpg" alt="avatar-10" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                                <div class="detail">
                                    <h4>
                                        <a href="agent-detail.html">Karen Paran</a>
                                    </h4>
                                    <h5>Office Manager</h5>
                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-mail"></i><a
                                                    href="mailto:info@themevessel.com">info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55
                                                    4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="social-list clearfix">
                                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="row team-2">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                                <div class="photo">
                                    <img src="img/avatar/avatar-9.jpg" alt="avatar-9" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                                <div class="detail">
                                    <h4>
                                        <a href="agent-detail.html">Eliane Pereira</a>
                                    </h4>
                                    <h5>Creative Director</h5>
                                    <div class="contact">
                                        <ul>
                                            <li>
                                                <i class="flaticon-pin"></i><a>44 New Design Street,</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-mail"></i><a
                                                    href="mailto:info@themevessel.com">info@themevessel.com</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +55
                                                    4XX-634-7071</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <ul class="social-list clearfix">
                                        <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-prev slick-arrow-buton">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="slick-next slick-arrow-buton">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Our team end -->

    <!-- Blog start -->
    <div class="blog content-area-3">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Our Blog</h1>
                <p>Check out some recent news posts.</p>
            </div>
            <!-- Slick slider area start -->
            <div class="slick-slider-area">
                <div class="row slick-carousel"
                    data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <div class="slick-slide-item">
                        <div class="blog-3">
                            <div class="blog-photo">
                                <img src="img/blog/blog-3.jpg" alt="blog" class="img-fluid">
                                <div class="date-box">
                                    <span>27</span>Feb
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Find Your Dream Real Estate</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="flaticon-people"></i>Amdin</a></span>
                                    <span><a href="#"><i class="flaticon-comment"></i>27</a></span>
                                    <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text</p>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="blog-3">
                            <div class="blog-photo">
                                <img src="img/blog/blog-2.jpg" alt="blog" class="img-fluid">
                                <div class="date-box">
                                    <span>27</span>Feb
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Selling Your Real House</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="flaticon-people"></i>Amdin</a></span>
                                    <span><a href="#"><i class="flaticon-comment"></i>27</a></span>
                                    <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text</p>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="blog-3">
                            <div class="blog-photo">
                                <img src="img/blog/blog-1.jpg" alt="blog" class="img-fluid">
                                <div class="date-box">
                                    <span>27</span>Feb
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Buying a Best House</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="flaticon-people"></i>Amdin</a></span>
                                    <span><a href="#"><i class="flaticon-comment"></i>27</a></span>
                                    <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text</p>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide-item">
                        <div class="blog-3">
                            <div class="blog-photo">
                                <img src="img/blog/blog-1.jpg" alt="blog" class="img-fluid">
                                <div class="date-box">
                                    <span>27</span>Feb
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="blog-single-sidebar-right.html">Buying a Best House</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="flaticon-people"></i>Amdin</a></span>
                                    <span><a href="#"><i class="flaticon-comment"></i>27</a></span>
                                    <span><a href="#"><i class="fa fa-heart-o"></i>27</a></span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-prev slick-arrow-buton">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="slick-next slick-arrow-buton">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog end -->

    <!-- Partners strat -->
    <div class="partners">
        <div class="container">
            <div class="slick-slider-area">
                <div class="row slick-carousel"
                    data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                    <div class="slick-slide-item"><img src="img/brand/brand-1.png" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="img/brand/brand-2.png" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="img/brand/brand-3.png" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="img/brand/brand-4.png" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="img/brand/brand-1.png" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="img/brand/brand-2.png" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="img/brand/brand-3.png" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="img/brand/brand-4.png" alt="brand" class="img-fluid"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partners end -->

    <!-- Footer start -->
    <footer class="footer">
        <div class="container footer-inner">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <img src="img/logos/logo.png" alt="logo" class="f-logo">
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>Contact Us</h4>
                        <div class="f-border"></div>
                        <ul class="contact-info">
                            <li>
                                <i class="flaticon-pin"></i>20/F Green Road, Dhanmondi, Dhaka
                            </li>
                            <li>
                                <i class="flaticon-mail"></i><a
                                    href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                            </li>
                            <li>
                                <i class="flaticon-phone"></i><a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                            </li>
                            <li>
                                <i class="flaticon-fax"></i>+0477 85X6 552
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            Useful Links
                        </h4>
                        <div class="f-border"></div>
                        <ul class="links">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
                            <li>
                                <a href="services.html">Services</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="properties-details.html">Properties Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <h4>Subscribe</h4>
                        <div class="f-border"></div>
                        <div class="Subscribe-box">
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit.</p>
                            <form class="form-inline" action="#" method="GET">
                                <input type="text" class="form-control mb-sm-0" id="inlineFormInputName3"
                                    placeholder="Email Address">
                                <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Sub footer start -->
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <p class="copy">© 2018 <a href="#">Theme Vessel.</a> Trademarks and brands are the property of their
                        respective owners.</p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="social-list clearfix">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub footer end -->

    <!-- Full Page Search -->
    <div id="full-page-search">
        <button type="button" class="close">×</button>
        <form action="http://themevessel-item.s3-website-us-east-1.amazonaws.com/neer/index.html#">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-sm button-theme">Search</button>
        </form>
    </div>

    <script src="{{ asset('frontend_assets/js/jquery-2.2.0.min.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/popper.min.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.min.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/bootstrap-submenu.js')}} "></script>
    <script src="{{ asset('frontend_assets/js/rangeslider.js')}} "></script>
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
</body>

<!-- Mirrored from themevessel-item.s3-website-us-east-1.amazonaws.com/neer/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Apr 2019 14:49:59 GMT -->

</html>
