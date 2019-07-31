@extends('frontend.master')
@section('title','About Ngekost.id')
@section('content')

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Tentang Kami</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Tentang Kami</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->
<!-- About city estate start -->
<div class="about-real-estate  content-area-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    <div class="about-slider-box simple-slider">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="http://kosan.web.id/assets/img/about.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="about-text">
                        <h3>Selamat Datang di {{$settings->name}}</h3>
                        <p>{{$settings->aboutus }}</p>
                        <a href="#" class="btn btn-md button-theme">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About city estate end -->



    @include('frontend.partials.counter')

    <!-- Helping sentar start -->
    <div class="helping-sentar">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 align-self-center">
                    <!-- Contact 1 start -->
                    <div class="contact-2 pb-hediin-60">
                        <h5 class="clearfix">Always Support You</h5>
                        <h3 class="heading">How can we help</h3>
                        <form action="#" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group name">
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group email">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group number">
                                        <input type="text" name="phone" class="form-control" placeholder="Number">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group message">
                                        <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-md button-theme">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact 1 end -->
                </div>
                <div class="offset-xl-1 col-xl-5 col-lg-6">
                    <img src="http://kosan.web.id/assets/img/about.jpg" alt="avatar-10" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    {{ TawkTo::widgetCode() }}
    <!-- Helping sentar end -->
@endsection
