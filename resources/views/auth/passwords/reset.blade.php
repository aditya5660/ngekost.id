@extends('layouts.auth')
@section('title')
Reset Password Confirmation
@endsection
@section('content')
<div class="contact-section overview-bgi">
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="form-content-box">
                    @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                  @endif
                  @if (session('warning'))
                    <div class="alert alert-warning">
                      {{ session('warning') }}
                    </div>
                  @endif
                  <div class="details">
                        <!-- Logo -->
                        <a href="">
                            <img src="{{asset('logo/logo-blue.png')}}" class="cm-logo" alt="black-logo">
                        </a>
                        <!-- Name -->
                        <h3>{{ __('Reset Password') }}</h3>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group ">

                                <input id="email" type="email" class="input-text form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group ">

                                <input id="password" type="password" class="input-text form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group ">

                                <input id="password-confirm" type="password" class="input-text form-control" name="password_confirmation" placeholder="Password Confirmation" required>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn-md button-theme btn-block">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
