@extends('frontend.master')
@section('title')
{{ $property->title  }}
@endsection
@section('head')
<link rel="stylesheet" href="{{asset('vendor/floating-wpp/floating-wpp.css') }}">

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
                    <div class="mb-30"><span class="property-price">Rp {{ number_format($property->monthly_price) }} / Bulan</span> <span class="rent">ADA {{ $property->available_room }} KAMAR </span> <span class="location"><i class="flaticon-pin"></i>{{ $property->address }},{{ $property->district->name }},{{ $property->regency->name }},{{ $property->province->name }}</span></div>
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
                                        <img src="{{asset('storage/property/gallery/'.$gallery->name)}}" class="img-fluid" alt="slider-properties">
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
                                        <img src="{{asset('storage/property/gallery/'.$gallery->name)}}" class="img-fluid" alt="properties-small">
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
                                <li>Harga Harian  = Rp {{ number_format($property->daily_price)  }} ,-</li>
                                <li>Harga Bulanan  = Rp {{ number_format($property->monthly_price)  }} ,-</li>
                                <li>Harga Tahunan  = Rp {{ number_format($property->yearly_price) }} ,-</li>
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

                                @foreach ($amenities as $item)
                                    <?php foreach ($fasilitas as $key => $value) :  ?>
                                    @if ($value == $item->id)
                                        <?php echo '<li><i class="'.$item->icon.'"></i>'.$item->name.'</li>'?>
                                    @endif
                                    <?php endforeach ?>
                                @endforeach

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
                    <a class="btn btn-md btn-primary" href="{{route('login')}}"> Login to Chat & Booking</a>
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
                                            <img class="d-block w-100" src="{{asset('storage/property/'.$relatedproperty->image)}}" alt="properties">
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
                                        <img class="media-object" src="{{asset('storage/property/'.$recentproperty->image)}}" alt="Img {{$recentproperty->slug}}"></a>
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
                <form id="donation" onsubmit="return submitForm();" class="form-horizontal" method="post">

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
                                    <option value="1">Payment Gateway <span>powered by midtrans</span></option>
                                    <option value="2" disabled>Cash On Delivery - Soon</option>
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
    @guest
    @else
        @if(!$property->user->phone == null )
            <div class="floating-wpp"></div>
        @endif
    @endguest
@endsection
@push('script')
    {{-- Tombol Share --}}
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    {{-- Setup Map --}}
    <script src="{{asset('vendor/floating-wpp/floating-wpp.js')}}"></script>
    <script>

            $('.floating-wpp').floatingWhatsApp({
                phone: '<?= $property->user->phone ?>',
                popupMessage: 'Selamat datang di ngekost.id',
                message: "Hi,Apakah kamar <?= $property->title ?> di masih tersedia?",
                showPopup: true,
                showOnIE: false,
                headerTitle: 'Hubungi Pemilik Kamar!',
                headerColor: '#25D366',
                position: 'right',
                backgroundColor: '#25D366',
                buttonImage: '<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2%0D%0AZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8v%0D%0Ad3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0iaXNvbGF0aW9uOmlzb2xhdGUiIHZpZXdCb3g9%0D%0AIjAgMCA4MDAgODAwIiB3aWR0aD0iODAwIiBoZWlnaHQ9IjgwMCI+PGRlZnM+PGNsaXBQYXRoIGlk%0D%0APSJfY2xpcFBhdGhfQTNnOEc1aFBFR0cyTDBCNmhGQ3hhbVU0Y2M4cmZxelEiPjxyZWN0IHdpZHRo%0D%0APSI4MDAiIGhlaWdodD0iODAwIi8+PC9jbGlwUGF0aD48L2RlZnM+PGcgY2xpcC1wYXRoPSJ1cmwo%0D%0AI19jbGlwUGF0aF9BM2c4RzVoUEVHRzJMMEI2aEZDeGFtVTRjYzhyZnF6USkiPjxnPjxwYXRoIGQ9%0D%0AIiBNIDc4Ny41OSA4MDAgTCAxMi40MSA4MDAgQyA1LjU1NiA4MDAgMCA3OTMuMzMyIDAgNzg1LjEw%0D%0AOCBMIDAgMTQuODkyIEMgMCA2LjY2NyA1LjU1NiAwIDEyLjQxIDAgTCA3ODcuNTkgMCBDIDc5NC40%0D%0ANDQgMCA4MDAgNi42NjcgODAwIDE0Ljg5MiBMIDgwMCA3ODUuMTA4IEMgODAwIDc5My4zMzIgNzk0%0D%0ALjQ0NCA4MDAgNzg3LjU5IDgwMCBaICIgZmlsbD0icmdiKDM3LDIxMSwxMDIpIi8+PC9nPjxnPjxw%0D%0AYXRoIGQ9IiBNIDUwOC41NTggNDUwLjQyOSBDIDUwMi42NyA0NDcuNDgzIDQ3My43MjMgNDMzLjI0%0D%0AIDQ2OC4zMjUgNDMxLjI3MyBDIDQ2Mi45MjkgNDI5LjMwOCA0NTkuMDAzIDQyOC4zMjggNDU1LjA3%0D%0AOCA0MzQuMjIgQyA0NTEuMTUzIDQ0MC4xMTQgNDM5Ljg2OSA0NTMuMzc3IDQzNi40MzQgNDU3LjMw%0D%0ANyBDIDQzMyA0NjEuMjM2IDQyOS41NjUgNDYxLjcyOSA0MjMuNjc3IDQ1OC43OCBDIDQxNy43OSA0%0D%0ANTUuODM0IDM5OC44MTggNDQ5LjYxNyAzNzYuMzI4IDQyOS41NTYgQyAzNTguODI1IDQxMy45NDMg%0D%0AMzQ3LjAwOCAzOTQuNjYzIDM0My41NzQgMzg4Ljc2OCBDIDM0MC4xMzkgMzgyLjg3MyAzNDMuMjA3%0D%0AIDM3OS42ODcgMzQ2LjE1NSAzNzYuNzUyIEMgMzQ4LjgwNCAzNzQuMTEzIDM1Mi4wNDQgMzY5Ljg3%0D%0ANCAzNTQuOTg3IDM2Ni40MzYgQyAzNTcuOTMxIDM2Mi45OTkgMzU4LjkxMiAzNjAuNTQxIDM2MC44%0D%0ANzUgMzU2LjYxNCBDIDM2Mi44MzcgMzUyLjY4MyAzNjEuODU3IDM0OS4yNDYgMzYwLjM4MyAzNDYu%0D%0AMjk5IEMgMzU4LjkxMiAzNDMuMzUyIDM0Ny4xMzYgMzE0LjM2OSAzNDIuMjMxIDMwMi41NzkgQyAz%0D%0AMzcuNDUxIDI5MS4wOTkgMzMyLjU5NyAyOTIuNjU0IDMyOC45ODMgMjkyLjQ3MiBDIDMyNS41NTIg%0D%0AMjkyLjMwMSAzMjEuNjIyIDI5Mi4yNjUgMzE3LjY5OCAyOTIuMjY1IEMgMzEzLjc3MyAyOTIuMjY1%0D%0AIDMwNy4zOTQgMjkzLjczOSAzMDEuOTk2IDI5OS42MzIgQyAyOTYuNiAzMDUuNTI3IDI4MS4zODkg%0D%0AMzE5Ljc3MiAyODEuMzg5IDM0OC43NTIgQyAyODEuMzg5IDM3Ny43MzUgMzAyLjQ4NyA0MDUuNzMx%0D%0AIDMwNS40MzEgNDA5LjY2MSBDIDMwOC4zNzYgNDEzLjU5MiAzNDYuOTQ5IDQ3My4wNjIgNDA2LjAx%0D%0ANSA0OTguNTY2IEMgNDIwLjA2MiA1MDQuNjM0IDQzMS4wMyA1MDguMjU2IDQzOS41ODEgNTEwLjk2%0D%0AOSBDIDQ1My42ODUgNTE1LjQ1MSA0NjYuNTIxIDUxNC44MTggNDc2LjY2NiA1MTMuMzAyIEMgNDg3%0D%0ALjk3OCA1MTEuNjEzIDUxMS41MDIgNDk5LjA2IDUxNi40MDkgNDg1LjMwNyBDIDUyMS4zMTUgNDcx%0D%0ALjU1IDUyMS4zMTUgNDU5Ljc2MiA1MTkuODQyIDQ1Ny4zMDcgQyA1MTguMzcxIDQ1NC44NTEgNTE0%0D%0ALjQ0NiA0NTMuMzc3IDUwOC41NTggNDUwLjQyOSBaICBNIDQwMS4xMjYgNTk3LjExNyBMIDQwMS4w%0D%0ANDcgNTk3LjExNyBDIDM2NS45MDIgNTk3LjEwNCAzMzEuNDMxIDU4Ny42NjEgMzAxLjM2IDU2OS44%0D%0AMTcgTCAyOTQuMjA4IDU2NS41NzIgTCAyMjAuMDggNTg1LjAxNyBMIDIzOS44NjYgNTEyLjc0MyBM%0D%0AIDIzNS4yMSA1MDUuMzMyIEMgMjE1LjYwNCA0NzQuMTQ5IDIwNS4yNDggNDM4LjEwOCAyMDUuMjY0%0D%0AIDQwMS4xIEMgMjA1LjMwNyAyOTMuMTEzIDI5My4xNyAyMDUuMjU3IDQwMS4yMDQgMjA1LjI1NyBD%0D%0AIDQ1My41MTggMjA1LjI3NSA1MDIuNjkzIDIyNS42NzQgNTM5LjY3MyAyNjIuNjk2IEMgNTc2LjY1%0D%0AMSAyOTkuNzE2IDU5Ny4wMDQgMzQ4LjkyNSA1OTYuOTgzIDQwMS4yNTggQyA1OTYuOTM5IDUwOS4y%0D%0ANTQgNTA5LjA3OCA1OTcuMTE3IDQwMS4xMjYgNTk3LjExNyBaICBNIDU2Ny44MTYgMjM0LjU2NSBD%0D%0AIDUyMy4zMjcgMTkwLjAyNCA0NjQuMTYxIDE2NS40ODQgNDAxLjEyNCAxNjUuNDU4IEMgMjcxLjI0%0D%0AIDE2NS40NTggMTY1LjUyOSAyNzEuMTYxIDE2NS40NzcgNDAxLjA4NSBDIDE2NS40NiA0NDIuNjE3%0D%0AIDE3Ni4zMTEgNDgzLjE1NCAxOTYuOTMyIDUxOC44OTIgTCAxNjMuNTAyIDY0MSBMIDI4OC40MjEg%0D%0ANjA4LjIzMiBDIDMyMi44MzkgNjI3LjAwNSAzNjEuNTkxIDYzNi45MDEgNDAxLjAzIDYzNi45MTMg%0D%0ATCA0MDEuMTI2IDYzNi45MTMgTCA0MDEuMTI3IDYzNi45MTMgQyA1MzAuOTk4IDYzNi45MTMgNjM2%0D%0ALjcxNyA1MzEuMiA2MzYuNzcgNDAxLjI3NCBDIDYzNi43OTQgMzM4LjMwOSA2MTIuMzA2IDI3OS4x%0D%0AMDUgNTY3LjgxNiAyMzQuNTY1IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9InJnYigyNTUsMjU1%0D%0ALDI1NSkiLz48L2c+PC9nPjwvc3ZnPg==">',
                autoOpen: true,
                autoOpenTimer: 5000,
                zIndex:999999,
            });

    </script>
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

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRLaJEjRudGCuEi1_pqC4n3hpVHIyJJZA&callback=initMap"> </script>

    <script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>

    <script>
    function submitForm() {

        $.post("{{ route('booking.store') }}",
        {
            _method: 'POST',
            _token: '{{ csrf_token() }}',
            booking_range: $('#booking_range').val(),
            start_booking_date: $('input#start_booking_date').val(),
            property_id: $('input#property_id').val(),
        },
        function (data, status) {
            snap.pay(data.snap_token, {
                // Optional
                onSuccess: function (result) {
                    location.redirect({{route('users.transaction.index')}});
                },
                // Optional
                onPending: function (result) {
                    location.reload();
                },
                // Optional
                onError: function (result) {
                    location.reload();
                }
            });
        });
        return false;
    }
    </script>

@endpush
