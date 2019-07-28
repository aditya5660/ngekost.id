@extends('frontend.master')
@section('title','Ngekost.id')
@push('head')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('content')
<!-- Banner start -->
<div class="banner banner" id="banner">
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            @if ($sliders = null )

                @foreach ($sliders as $key => $item)
                <div class="carousel-item banner-max-height @if ($key == 0)
                        {{ 'active'}}
                    @endif">
                    <img class="d-block w-100" src="{{Storage::url('slider/'.$item->image)}}" alt="banner">
                    <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                        <div class="carousel-content container">
                            <div class="text-left">
                                <h1>{{$item->title}}</h1>
                                <p>
                                    {{$item->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100" src="{{Storage::url('slider/banner-1.png')}}" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-left">
                            <h1>Cari Kost? ya di Ngekost.id</h1>
                            <p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif



        </div>
        @if ($sliders)
        <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
        @endif
    </div>

    <!-- Search Section start -->
    <div class="search-section d-none d-xl-block d-lg-block " id="search-style-2">
        <div class="container">
            <div class="search-section-area ssa2 bg-grea" style="">

            <form id="form_search" action="{{route('search')}}" method="GET">
                    <div class="inline-search-area ml-auto mr-auto d-none d-xl-block d-lg-block">
                        <div class="row justify-content-md-center">
                            <div class="col-xl-10 col-lg-10 col-sm-8 col-6 search-col">
                                <div class="form-group ">
                                    <input class="form-control " id="search" name="search" type="text"
                                        placeholder="Ketik nama tempat atau alamat..." required="required">
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-4 col-6 search-col">
                                <button type="submit" class="btn button-theme btn-search btn-block">
                                    <i class="fa fa-search"></i><strong>Search</strong>
                                </button>
                            </div>

                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
<!-- Banner end -->



<!-- Featured Properties start -->
<div class="featured-properties content-area" style="margin-top:50px !important; ">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Rekomendasi Kost</h1>
            <p>Cari Kos Terbaik Di Kotamu</p>
        </div>

        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row slick-carousel"
                data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @foreach($properties as $property)
                <div class="slick-slide-item">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="{{ route('property.show',$property->slug) }}" class="property-img">
                                <div class="listing-badges">
                                    @if ($property->featured == 1 )
                                        @php echo '<span class="featured">Featured</span>'; @endphp
                                    @endif
                                </div>
                                <div class="price-box"><span>{{ $property->monthly_price }}</span> Per month</div>
                            <img class="d-block w-100" src="{{Storage::url('property/'.$property->image)}}" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                            <a href="{{ route('property.show',$property->slug) }}">{{ $property->title}}</a>
                            </h1>

                            <div class="location">
                                <a href="">
                                    <i class="flaticon-pin"></i>{{$property->address}},
                                </a>
                            </div>
                        </div>
                        <?php $fasilitas = explode('//', $property->amenities_id); ?>
                        <ul class="facilities-list clearfix">
                        @foreach($fasilitas as $fasilitas )
                            @foreach ($amenities as $key => $value)
                            <li><i class="<?php if($fasilitas==$value->id){echo $value->icon;}; ?>"></i></li>
                            @endforeach
                        @endforeach
                        </ul>
                        <div class="footer">
                            <a href="#">
                                <i class="flaticon-people"></i> {{$property->user->name}}
                            </a>
                            <span>
                                <i class="flaticon-calendar"></i> {{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $property->created_at)->diffForHumans()}}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
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

<!-- Categories strat -->
<div class="categories content-area-7">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1>Kota Besar</h1>
                <p>Temukan Rumah Kost Di Kota Favorit mu.</p>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 col-pad">
                    <div class="category">
                        <div class="category_bg_box category_long_bg cat-4-bg">
                            <div class="category-overlay">
                                <div class="category-content">
                                    <h3 class="category-title">
                                        <a href="{{route('property.city',34)}}">Jakarta</a>
                                    </h3>
                                    <h4 class="category-subtitle">128 Kost</h4>
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
                                                <a href="{{route('property.city',34)}}">Jogja</a>
                                            </h3>
                                            <h4 class="category-subtitle">27 Kost</h4>
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
                                                <a href="{{route('property.city',34)}}">Semarang</a>
                                            </h3>
                                            <h4 class="category-subtitle">98 Kost</h4>
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
                                                <a href="{{route('property.city',34)}}">Surabaya</a>
                                            </h3>
                                            <h4 class="category-subtitle">98 Kost</h4>
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
                                                <a href="{{route('property.city',34)}}">Bandung</a>
                                            </h3>
                                            <h4 class="category-subtitle">98 Kost</h4>
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
@include('frontend.partials.counter')

<!-- Our team start -->
<div style=" padding: 40px 0 30px; " class="bg-grea">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-4 col-xs-12 col-sm-12">
                <div class="heading-primary">
                    <h2>Apakah Anda Pemilik Kosan? </h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                <div class="form-group text-center">
                    <a href="{{route('register')}}" class="search-button">Pasang Iklan Disini</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our team end -->

<!-- Blog start -->
<div class="blog content-area-3 " style="margin-top:50px !important;margin-bottom:80px !important">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Seputar Ngekost</h1>
            <p>Temukan Tips dan Trik Ngekost Disini</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}' style="display:block ;">
                @foreach($posts as $post)
                <div class="slick-slide-item" >
                    <div class="blog-3">
                        <div class="blog-photo">
                            <img src="{{Storage::url('posts/'.$post->image)}}" alt="blog" class="img-fluid">
                            <div class="date-box">

                                <span>12</span>
                            </div>
                        </div>
                        <div class="detail">
                            <h3><a href="{{ route('blog.show',$post->slug) }}"><?= $post->title ?> </a></h3>
                            <div class="post-meta">
                                <span><a href="#"><i class="flaticon-people"></i>Admin</a></span>
                            </div>
                            <p><?= substr($post->body,0,150) ?></p>
                        </div>
                    </div>
                </div>
                @endforeach
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
                <div class="slick-slide-item"><img src="frontend_assets/img/brand/brand-1.png" alt="brand"
                        class="img-fluid"></div>
                <div class="slick-slide-item"><img src="frontend_assets/img/brand/brand-2.png" alt="brand"
                        class="img-fluid"></div>
                <div class="slick-slide-item"><img src="frontend_assets/img/brand/brand-3.png" alt="brand"
                        class="img-fluid"></div>
                <div class="slick-slide-item"><img src="frontend_assets/img/brand/brand-4.png" alt="brand"
                        class="img-fluid"></div>
                <div class="slick-slide-item"><img src="frontend_assets/img/brand/brand-1.png" alt="brand"
                        class="img-fluid"></div>
                <div class="slick-slide-item"><img src="frontend_assets/img/brand/brand-2.png" alt="brand"
                        class="img-fluid"></div>
                <div class="slick-slide-item"><img src="frontend_assets/img/brand/brand-3.png" alt="brand"
                        class="img-fluid"></div>
                <div class="slick-slide-item"><img src="frontend_assets/img/brand/brand-4.png" alt="brand"
                        class="img-fluid"></div>
            </div>
        </div>
    </div>
</div>
<!-- Partners end -->
@endsection
@push('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

$(document).ready(function() {
    $( "#search" ).autocomplete({
        source: function(request, response) {
            $.ajax({
            url: "{{route('search.autocomplete')}}",
            data: {
                term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    //console.log(obj.city_name);
                    return obj.title;
               });

               response(resp);
            }
        });
    },
    minLength: 1
 });
});

</script>
@endpush
