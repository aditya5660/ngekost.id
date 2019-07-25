@extends('frontend.master')
@section('title')
{{ $property->title  }}
@endsection
@section('content')

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>{{ $property->title  }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">{{ $property->title  }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->
    <!-- Properties details page start -->
    <div class="properties-details-page content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Heading properties 3 start -->
                    <div class="heading-properties-3">
                        <h1>{{ $property->title }}</h1>
                    <div class="mb-30"><span class="property-price"> {{ $property->monthly_price }} / Bulan</span> <span class="rent">ADA {{ $property->available_room }}KAMAR </span> <span class="location"><i class="flaticon-pin"></i>{{ $property->address }},{{ $property->district->name }},{{ $property->regency->name }},{{ $property->province->name }}</span></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <!-- main slider carousel items -->
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                            <div class="carousel-inner">
                                @foreach ($property->gallery as $key => $gallery)
                                    <div class="item carousel-item <?php ($key == 1) ? print 'active' : '' ;  ?>" data-slide-number="{{$gallery->id}}">
                                        <img src="{{Storage::url('property/gallery/'.$gallery->name)}}" class="img-fluid" alt="slider-properties">
                                    </div>
                                @endforeach

                                <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                            </div>
                            <!-- main slider carousel nav controls -->
                            <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                                @foreach ($property->gallery as $key => $gallery)
                                <li class="list-inline-item <?php ($key == 1) ? print 'active' : '' ;  ?>">
                                <a id="carousel-selector-0" class="selected" data-slide-to="{{$gallery->id}}" data-target="#propertiesDetailsSlider">
                                        <img src="{{Storage::url('property/gallery/'.$gallery->name)}}" class="img-fluid" alt="properties-small">
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <!-- main slider carousel items -->
                        </div>

                    <!-- Properties description start -->
                    <div class="properties-description mb-40">
                        <h3 class="heading-2">
                            Description
                        </h3>
                        <p>
                            <ul class="amenities">
                                <li>Tipe Kost   = {{ $property->category->category_name  }}</li>
                                <li>Ukuran Kamar  = {{ $property->p_room_size  }}</li>
                                <li>Harga Harian  = {{ $property->daily_price  }} ,-</li>
                                <li>Harga Bulanan  = {{ $property->monthly_price  }} ,-</li>
                                <li>Harga Tahunan  = {{ $property->yearly_price }} ,-</li>
                            </ul>
                        </p>
                        <p><?= $property->description  ?></p>
                    </div>
                    <!-- Properties amenities start -->
                    <div class="properties-amenities mb-40">
                        <h3 class="heading-2">
                            Features
                        </h3>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <ul class="amenities">
                                <?php $fasilitas = explode('//', $property->amenities_id);  ?>

                                    <?php foreach ($amenities as $key => $value) :  ?>
                                    <li><i class="fa fa-check"></i> <?php if ($fasilitas = $value->id) { echo $value->name; }  ?></li>
                                    <?php endforeach ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Location start -->
                    <div class="location mb-50">
                        <div class="map">
                            <h3 class="heading-2">Lokasi Kos</h3>
                            <div id="map" class="contact-map"></div>

                        </div>
                    </div>
                    <!-- contact -->
                    <div class="col-lg-12" style="display:flex;">
                    @guest
                    <div class="send-btn ">
                    <a class="btn btn-md btn-primary" href="{{route('login')}}"> Login to Booking</a>
                    </div>
                    @else
                        <div class="send-btn " style="margin-right:10px;">
                            <a href="" title="Love it" class="btn btn-md " style="background-color:#b12f27" data-count="0"><i class="fa fa-heart"></i> Love it</a>
                        </div>
                        <div class="send-btn ">
                            <a class="btn btn-md btn-primary" data-toggle="modal" data-target="#ajaxModal">Booking Kost</a>
                        </div>
                    @endguest
                    </div>
                    <br>
                    <br>
                    <div id="disqus_thread"></div>
                    <br>
                    <br>
                    <h3 class="heading-2">Rekomendasi Kost</h3>
                    <div class="row similar-properties">
                        @foreach($relatedproperty as $relatedproperty )
                        <div class="col-md-6">
                                <div class="property-box">
                                        <div class="property-thumbnail">
                                            <a href="" class="property-img">

                                                <div class="price-box"><span>{{ $relatedproperty->monthly_price }}</span> Per month</div>
                                            <img class="d-block w-100" src="{{Storage::url('property/'.$relatedproperty->image)}}" alt="properties">
                                            </a>
                                        </div>
                                        <div class="detail">
                                            <h1 class="title">
                                            <a href="{{ route('property.show',$relatedproperty->slug) }}">{{ $relatedproperty->title}}</a>
                                            </h1>

                                            <div class="location">
                                                <a href="properties-details.html">
                                                    <i class="flaticon-pin"></i>{{$relatedproperty->address}},
                                                </a>
                                            </div>
                                        </div>
                                        <?php $fasilitas = explode('//', $relatedproperty->amenities_id); ?>
                                        <ul class="facilities-list clearfix">
                                        @foreach($fasilitas as $fasilitas )
                                            @foreach ($amenities as $key => $value)
                                            <li><i class="<?php if($fasilitas==$value->id){echo $value->icon;}; ?>"></i></li>
                                            @endforeach
                                        @endforeach
                                        </ul>
                                        <div class="footer">
                                            <a href="#">
                                                <i class="flaticon-people"></i> {{$relatedproperty->user->name}}
                                            </a>
                                            <span>
                                                <i class="flaticon-calendar"></i> {{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $property->created_at)->diffForHumans()}}
                                            </span>
                                        </div>
                                    </div>
                        </div>
                        <?php endforeach ?>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12">
                        <div class="sidebar-right">
                            <!-- Recent properties start -->
                            <div class="widget recent-properties">
                                <h3 class="sidebar-title">Kost Terbaru</h3>
                                <div class="s-border"></div>
                                @foreach($recentproperty as $recentproperty )
                                <div class="media mb-4">
                                    <a class="pr-3" href="{{ route('property.show',$recentproperty->slug) }}">
                                        <img class="media-object" src="{{Storage::url('property/'.$recentproperty->image)}}" alt="Img {{$recentproperty->slug}}"></a>
                                    <div class="media-body align-self-center">
                                        <h5>
                                            <a href="{{ route('property.show',$recentproperty->slug) }}">{{ $recentproperty->title}} </a>
                                        </h5>
                                        <div class="listing-post-meta">
                                            Rp. <?= $recentproperty->monthly_price ?> | <a href="#"><i class="fa fa-calendar"></i>  {{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $recentproperty->created_at)->diffForHumans()}} </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Posts by category Start -->
                            <div class="posts-by-category widget">
                                <h3 class="sidebar-title">Category</h3>
                                <div class="s-border"></div>
                                <ul class="list-unstyled list-cat">
                                    @foreach ($category as $item)
                                    <li><a href="">{{$item->category_name}}<span></span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Social links start -->
                            <div class="widget social-links">
                                <h3 class="sidebar-title">Social Links</h3>
                                <div class="s-border"></div>
                                <ul class="social-list clearfix ">
                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style"  data-a2a-title="Ngekost.id">
                                            <li><a class="a2a_dd" href="https://www.addtoany.com/share"></a></li>
                                            <li><a class="a2a_button_facebook"></a></li>
                                            <li><a class="a2a_button_twitter"></a></li>
                                            <li><a class="a2a_button_whatsapp"></a></li>
                                            <li><a class="a2a_button_google_gmail"></a></li>
                                            <li><a class="a2a_button_telegram"></a></li>
                                        </div>
                                </ul>
                            </div>
                            <!-- Our agent sidebar start -->

                        </div>
                    </div>
        </div>
    </div>
    <!-- Properties details page end -->
    <div class="modal fade" id="ajaxModal" aria-hidden="true" style="z-index:10000">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle"></h4>
                </div>
                <div class="modal-body">
                <form id="" name="" action="{{route('property.booking')}}"class="form-horizontal" method="post">

                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Property</label>
                            <div class="col-sm-12">

                                <input type="hidden" name="property_id" id="property_id" value="{{$property->id}}">
                                <input type="text" class="form-control" id="property_name" name="property_name" placeholder="{{$property->title}}" value="{{$property->title}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label">Bookings Range</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="booking_range" id="booking_range">
                                    <option value="1" <?php if($property->daily_price == null){ print 'disabled';} ?> >Harian - {{$property->daily_price}}</option>
                                    <option value="2" <?php if($property->monthly_price == null){ print 'disabled';} ?> >Bulanan - {{$property->monthly_price}}</option>
                                    <option value="3" <?php if($property->yearly_price == null){ print 'disabled';} ?> >Tahunan - {{$property->yearly_price}}</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Start Bookings</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="start_booking_date" name="start_booking_date" required="">
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label">Pembayaran</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="payments" id="payments">
                                    <option value="1">Transfer Manual</option>
                                    <option value="2">OVO </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

<script async src="https://static.addtoany.com/menu/page.js"></script>
    <script>
        function initMap() {
            var propLatLng = {
                lat: <?= $property->location_latitude;  ?>,
                lng: <?= $property->location_longitude; ?>
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: propLatLng
            });
            var marker = new google.maps.Marker({
                position: propLatLng,
                map: map,
                title: '<?= $property->title;  ?>'
            });
        };
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRLaJEjRudGCuEi1_pqC4n3hpVHIyJJZA&callback=initMap">
    </script>



@endpush
