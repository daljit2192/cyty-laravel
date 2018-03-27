@extends('layouts.backend.app')

@section('content')

<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="form-vertical login-form" method="POST" action="{{ route('admin.login') }}">
        {{ csrf_field() }}
        <h3 class="form-title">Login to your account</h3>
        <div class="alert alert-error hide">
            <button class="close" data-dismiss="alert"></button>
            <span>Enter any username and passowrd.</span>
        </div>
        <div class="control-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="controls">
                <div class="input-icon left {{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="icon-user"></i>
                    <input id="email" placeholder="Username" type="email" class="m-wrap placeholder-no-fix" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="controls">
                <div class="input-icon left {{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="icon-lock"></i>
                    <input id="password" type="password" placeholder="password" class="form-control m-wrap placeholder-no-fix" name="password" required>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <label class="checkbox">
                <div class="checker" id="uniform-undefined"><span><input type="checkbox" name="remember" value="1" style="opacity: 0;"></span></div> Remember me
            </label>
            <button type="submit" class="btn green pull-right">
                Login <i class="m-icon-swapright m-icon-white"></i>
            </button>            
        </div>
        <div class="forget-password">
            <h4>Forgot your password ?</h4>
            <p>
                no worries, click <a href="javascript:;" class="" id="forget-password">here</a>
                to reset your password.
            </p>
        </div>
        <div class="create-account">
            <p>
                Don't have an account yet ?&nbsp; 
                <a href="javascript:;" id="register-btn" class="">Create an account</a>
            </p>
        </div>
    </form>
</div>

@endsection
