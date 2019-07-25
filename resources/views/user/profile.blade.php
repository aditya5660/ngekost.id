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
                    <h4>My Profile</h4>
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
                    <div class="col-lg-3 col-md-3">
                        <form action="{{ route('users.profile.update', $user) }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <!-- Edit profile photo -->
                            <div class="edit-profile-photo">
                                <img src="{{Storage::url('users/'.auth()->user()->image)}}" alt="{{ auth()->user()->name }}" class="img-circle img-fluid">

                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                    </div>
                                </div>
                            </div>

                            @csrf
                            <div class="form-group mt-4">
                                <input type="file" class="form-control-file" name="image" id="avatarFile"
                                    aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size
                                    of image should not be more than 2MB.</small>
                            </div>
                    </div>
                    <div class="col-lg-9 col-md-9"> <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group name">
                                <label>Your Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder=""
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group name">
                                <label>Your Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder=""
                                    value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group subject">
                                <label>Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group number">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group number">
                                <label>About</label>
                                <input type="text" name="about" id="about" class="form-control"
                                    value="{{ $user->about }}">
                            </div>
                        </div>
                        <input type="hidden" name="oldimage" value="{{ $user->image }}">
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
    <div class="row">
        <div class="col-md-6">
            <div class="dashboard-list">
                <h3 class="heading">Change Password</h3>
                <div class="dashboard-message contact-2">
                    <form action="{{route('users.changepassword.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="form-group name">
                                        <label>Current Password</label>
                                        <input type="password" name="currentpassword" class="form-control"
                                            placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group email">
                                        <label>New Password</label>
                                        <input type="password" name="newpassword" class="form-control"
                                            placeholder="New Password">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group subject">
                                        <label>Confirm New Password</label>
                                        <input type="password" name="newpassword_confirmation" class="form-control"
                                            placeholder="Confirm New Password">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-md button-theme">Change Password</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
                    <div class="dashboard-list">
                        <h3 class="heading">Socials</h3>
                        <div class="dashboard-message contact-2">
                            <form action="#" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group name">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com/">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group email">
                                            <label>Twitter</label>
                                            <input type="text" name="twitter" class="form-control" placeholder="https://twitter.com/">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group subject">
                                            <label>Vkontakte</label>
                                            <input type="text" name="vkontakte" class="form-control" placeholder="vk.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group number">
                                            <label>Whatsapp</label>
                                            <input type="email" name="whatsapp" class="form-control" placeholder="https://www.whatsapp.com/">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="send-btn">
                                            <button type="submit" class="btn btn-md button-theme">Send Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
    </div>
</div>
</div>
@endsection
