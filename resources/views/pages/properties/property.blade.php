@extends('frontend.master')
@section('title','Cari Kost - Ngekost.id')


@section('content')

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Cari Kost</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Cari Kost</li>
                </ul>
                <br>
                <form id="form_search" action="{{route('search')}}" method="get">
                    <div class="inline-search-area ml-auto mr-auto d-none d-xl-block d-lg-block" >
                        <div class="row justify-content-md-center">
                            <div class="col-xl-8 col-lg-8 col-sm-8 col-6 search-col">
                                <div class="form-group ">
                                    <input class="form-control " id="title" name="title" type="text" placeholder="Ketik nama tempat atau alamat..." required="required">
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
    <!-- Sub Banner end -->
    <!-- Properties details page start -->
    <div class="properties-details-page content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                            @foreach($property as $property)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="property-box">
                                    <div class="property-thumbnail">
                                        <a href="{{ route('property.show',$property->slug) }}" class="property-img">
                                        <div class="price-box"><span>{{$property->monthly_price}}</span> Per bulan</div>
                                        <img class="d-block w-100" src="{{asset('storage/property/'.$property->image)}}" alt="{{ $property->title}}">
                                        </a>
                                    </div>
                                    <div class="detail">
                                        <h1 class="title">
                                            <a href="{{ route('property.show',$property->slug) }}">{{ $property->title}}</a>
                                        </h1>

                                        <div class="location">
                                            <a href="">
                                                <i class="flaticon-pin"></i>{{$property->address}}
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="facilities-list clearfix">
                                        <?php $fasilitas = explode('//', $property->amenities_id); ?>
                                        <ul class="facilities-list clearfix">
                                        @foreach ($fasilitas as $fasilitas )
                                            @foreach ($amenities as $key => $value)
                                                <li><i class="<?php if($fasilitas==$value->id){echo $value->icon;}; ?>"></i></li>
                                            @endforeach
                                        @endforeach
                                        </ul>
                                        <div class="footer">
                                            <a href="#">
                                                <i class="flaticon-people"></i> {{ $property->user->name }}
                                            </a>
                                        <a href="{{route('property.city',$property->province->id)}}" class="float-right">{{ $property->province->name }} <i class="flaticon-pin"></i>
                                            </a>
                                        </div>
                                </div>

                            </div>
                            @endforeach
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
                                            {{ $recentproperty->monthly_price}}  | <a href="#"><i class="fa fa-calendar"></i>  {{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $recentproperty->created_at)->diffForHumans()}} </a>
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
                                    <li><a href="{{route('property.category',$item->slug)}}">{{$item->category_name}} <span></span></a></li>
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

