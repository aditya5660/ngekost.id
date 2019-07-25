@extends('layouts.auth')
@section('title')
Reset Password
@endsection
@section('content')
<div class="contact-section overview-bgi">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form content box start -->
                    <div class="form-content-box">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="details">
                            <!-- Logo -->
                            <a href="index.html">
                                <img src="{{asset('logo/logo-blue.png')}}" class="cm-logo" alt="black-logo">
                            </a>
                            <!-- Name -->
                            <h3>Recover your password</h3>
                            <!-- Form start -->
                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="input-text form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn-md button-theme btn-block">{{ __('Send Password Reset Link') }}</button>
                                </div>
                            </form>
                            <!-- Social List -->
                            <ul class="social-list clearfix">
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!-- Footer -->
                        <div class="footer">
                        <span>Already a member? <a href="{{ route('login')}}">{{ __('Login Here') }}</a></span>
                        </div>
                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>

@endsection
