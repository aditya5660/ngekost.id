@extends('layouts.admin')
@section('title')
Owner Dashboard - ngekost.id
@endsection
@section('content')
<div class="content-area5">
    <div class="dashboard-content">
        <div class="dashboard-header clearfix">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4>Hello , Tom</h4>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="breadcrumb-nav">
                        <ul>
                            <li>
                                <a href="index.html">Index</a>
                            </li>
                            <li>
                                <a href="#" class="active">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-success alert-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Your listing</strong> YOUR LISTING HAS BEEN APPROVED!
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="ui-item bg-success">
                    <div class="left">
                        <h4>242</h4>
                        <p>Active Property</p>
                    </div>
                    <div class="right">
                        <i class="fa fa-map-marker"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="ui-item bg-warning">
                    <div class="left">
                        <h4>1242</h4>
                        <p>Pending Property</p>
                    </div>
                    <div class="right">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="ui-item bg-active">
                    <div class="left">
                        <h4>786</h4>
                        <p>Reviews</p>
                    </div>
                    <div class="right">
                        <i class="fa fa-comments-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="ui-item bg-dark">
                    <div class="left">
                        <h4>42</h4>
                        <p>Favorited</p>
                    </div>
                    <div class="right">
                        <i class="fa fa-heart-o"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="dashboard-list">
                    <div class="dashboard-message bdr clearfix ">
                        <div class="tab-box-2">
                            <div class="clearfix mb-30 comments-tr">
                                <span>Comments</span>
                                <ul class="nav nav-pills float-right" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="pills-profile-tab"
                                            data-toggle="pill" href="#pills-profile" role="tab"
                                            aria-controls="pills-profile"
                                            aria-selected="false">Pending</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab"
                                            data-toggle="pill" href="#pills-contact" role="tab"
                                            aria-controls="pills-contact"
                                            aria-selected="true">Approved</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-3.jpg"
                                                    alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>Maikel Alisa</h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#"><img src="img/avatar/avatar-1.jpg"
                                                    alt="comments-user"></a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                    Maikel Alisa
                                                </h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                    <div class="comment mb-0">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-2.jpg"
                                                    alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                    Maikel Alisa
                                                </h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="pills-profile"
                                    role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-2.jpg"
                                                    alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                    Maikel Alisa
                                                </h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-3.jpg"
                                                    alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                    Maikel Alisa
                                                </h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                    <div class="comment mb-0">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-1.jpg"
                                                    alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                    Maikel Alisa
                                                </h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="dashboard-list">
                    <div class="dashboard-message bdr clearfix ">
                        <div class="tab-box-2">
                            <div class="clearfix mb-30 comments-tr">
                                <span>New Member</span>
                                <ul class="nav nav-pills float-right" id="pills-tab2"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="pills-profile-tab2"
                                            data-toggle="pill" href="#pills-profile2" role="tab"
                                            aria-controls="pills-profile"
                                            aria-selected="false">Pending</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab2"
                                            data-toggle="pill" href="#pills-contact2" role="tab"
                                            aria-controls="pills-contact"
                                            aria-selected="true">Approved</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="pills-tabContent2">
                                <div class="tab-pane fade" id="pills-contact2" role="tabpanel"
                                    aria-labelledby="pills-contact-tab2">
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-3.jpg"
                                                    alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>Maikel Alisa</h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#"><img src="img/avatar/avatar-1.jpg"
                                                    alt="comments-user"></a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                    Maikel Alisa
                                                </h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                    <div class="comment mb-0">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-2.jpg"
                                                    alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                    Maikel Alisa
                                                </h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="pills-profile2"
                                    role="tabpanel" aria-labelledby="pills-profile-tab2">
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-2.jpg"
                                                    alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                    Maikel Alisa
                                                </h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-3.jpg"
                                                    alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                    Maikel Alisa
                                                </h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
                                        </div>
                                    </div>
                                    <div class="comment mb-0">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="img/avatar/avatar-1.jpg"
                                                    alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>
                                                    Maikel Alisa
                                                </h5>
                                                <div class="comment-meta">
                                                    8:42 PM 1/28/2017<a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Donec luctus tincidunt aliquam. Aliquam
                                                gravida massa at sem </p>
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
    <p class="sub-banner-2 text-center">© 2018 Theme Vessel. Trademarks and brands are the property
        of their respective owners.</p>
</div>

@endsection
