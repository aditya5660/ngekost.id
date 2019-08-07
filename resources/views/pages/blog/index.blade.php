@extends('frontend.master')
@section('title','Blog - Ngekost.id')


@section('content')

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Blog</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Blog</li>
                </ul>
                <br>
                <form id="form_search" action="http://kosan.web.id/home/search " method="get">
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
                            @foreach($posts as $item)
                            <div class="col-lg-6 col-md-6">
                                <div class="blog-1">
                                    <div class="blog-photo">
                                        <img src="{{asset('storage/posts/'.$item->image)}}" alt="small-blog" class="img-fluid">
                                        <div class="date-box">
                                        <span>{{$item->created_at->format('d')}}</span>{{$item->created_at->format('M')}}
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h3>
                                            <a href="{{route('blog.show',$item->slug)}}">{{$item->title}} </a>
                                        </h3>
                                        <div class="post-meta">
                                            <span><a href="#"><i class="flaticon-people"></i>Admin</a></span>
                                        </div>
                                        <p><?= substr($item->body,0,100) ?></p>
                                        <a href="{{route('blog.show',$item->slug)}}" class="read-more">Read more</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="m-t-30 m-b-60 center">
                                {{ $posts->appends(['month' => Request::get('month'), 'year' => Request::get('year')])->links() }}
                            </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                        <div class="sidebar-right">
                            <!-- Recent properties start -->
                            <div class="widget recent-properties">
                                <h3 class="sidebar-title">Post Terbaru</h3>
                                <div class="s-border"></div>
                                @foreach($recentpost as $item )
                                <div class="media mb-4">
                                    <a class="pr-3" href="{{ route('blog.show',$item->slug) }}">
                                        <img class="media-object" src="{{asset('storage/posts/'.$item->image)}}" alt="Img {{$item->slug}}"></a>
                                    <div class="media-body align-self-center">
                                        <h5>
                                            <a href="{{ route('blog.show',$item->slug) }}">{{ $item->title}} </a>
                                        </h5>
                                        <div class="listing-post-meta">
                                            Admin| <a href="#"><i class="fa fa-calendar"></i>  {{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans()}} </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Posts by category Start -->
                            <div class="posts-by-category widget">
                                <h3 class="sidebar-title"> Post Category</h3>
                                <div class="s-border"></div>
                                <ul class="list-unstyled list-cat">
                                    @foreach ($postcategory as $item)
                                    <li><a href="">{{$item->name}}<span></span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <!-- Properties details page end -->

@endsection

