@extends('frontend.master')

@section('title')
{{ $post->title  }}
@endsection

@section('content')

    <section class="section">
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>{{ $post->title  }} </h1>
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">{{ $post->title  }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Blog body start -->
    <div class="blog-body content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-left">
                        <!-- Search box -->
                        <div class="widget search-box">
                            <h3 class="sidebar-title">Search</h3>
                            <div class="s-border"></div>
                            <form class="form-inline form-search" method="GET">
                                <div class="form-group">
                                    <label class="sr-only" for="textsearch2">Looking for something</label>
                                    <input type="text" class="form-control" id="textsearch2" placeholder="Looking for something">
                                </div>
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Recent properties start -->
                        <div class="widget recent-properties">
                            <h3 class="sidebar-title">Post Terbaru</h3>
                            <div class="s-border"></div>

                            @foreach ($recentpost as $recentpost)

                            <div class="media mb-4">
                                <a class="pr-3" href=" ">
                                    <img class="media-object" src="{{Storage::url('posts/'.$recentpost->image)}}"
                                        alt="Img">
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href=" "><?= $recentpost->title ?></a>
                                    </h5>
                                    <div class="listing-post-meta">
                                        <a href="#">Post by Admin | <i class="fa fa-calendar">{{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $recentpost->created_at)->diffForHumans()}}</i></a>
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
                                @foreach ($postcategory as $item)
                                    <li><a href="">{{$item->name}}<span>()</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Social links Start -->
                        <div class="widget social-links">
                            <h3 class="sidebar-title">Social Links</h3>
                            <div class="s-border"></div>
                            <ul class="social-list clearfix">
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="pinterest-bg"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <!-- Blog 1 start -->
                    <div class="blog-1 blog-big">
                        <div class="blog-photo">
                            <img src="{{Storage::url('posts/'.$post->image)}}" alt="" class="img-fluid">
                        </div>
                        <div class="detail">
                            <h3>
                                <a href="#">{{ $post->title  }}</a>
                            </h3>
                            <?= $post->body ?>
                            <br>
                            <br>
                            <i>Post by Admin </i>
                            <p><i>{{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->diffForHumans()}}</i></p>
                            <br>

                        </div>
                    </div>

                    <!-- Contact 2 start -->

                </div>
            </div>
        </div>
    </div>
    <!-- Blog body end -->

    </section>


@endsection
