@extends('layouts.admin')
@section('title')
Profile
@endsection
@section('content')

<div class="content-area5">
    <div class="dashboard-content">
        <div class="dashboard-header clearfix">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4>Site Settings</h4>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="breadcrumb-nav">
                        <ul>
                            <li>
                                <a href="index.html">Index</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li class="active">My Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-list">
            <h3 class="heading">Profile Details</h3>
            <div class="dashboard-message contact-2 bdr clearfix">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                    <form action="{{route('admin.setting.store' )}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group name">
                                <label>Site Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder=""
                                    value="{{ $settings->name }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group name">
                                <label>Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder=""
                                    value="{{ $settings->email }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group subject">
                                <label>Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ $settings->phone }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group number">
                                <label>Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ $settings->address }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group number">
                                <label>About Us</label>
                                <textarea type="text" name="aboutus" id="aboutus" class="form-control"
                                    value="" rows="3">{{ $settings->aboutus }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group number">
                                <label>Footer</label>
                                <input type="text" name="footer" id="footer" class="form-control"
                                    value="{{ $settings->footer }}">
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group number">
                                <label>Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control"
                                    value="{{ $settings->facebook }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group number">
                                <label>Twitter</label>
                                <input type="text" name="twitter" id="twitter" class="form-control"
                                    value="{{ $settings->twitter }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group number">
                                <label>Linkedin</label>
                                <input type="text" name="linkedin" id="linkedin" class="form-control"
                                    value="{{ $settings->linkedin }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="send-btn">
                                <button type="submit" class="btn btn-sm btn-theme">Send Changes</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

@endsection
