@extends('layouts.app')

@section('content')
<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo">
    <img src="{{asset('public/uploads/logo1.png')}}" alt="Logo" style="margin-right: 10px;" width="50" height="50">
    <a href="{{URL::to('/')}}"><b>TB</b> MIS</a>
  </div>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="login-box-msg">Reset Password</p>
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="has-feedback form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Enter your email address" required autofocus>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="has-feedback form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                           <input id="password" type="password" class="form-control" placeholder="Enter Password"  name="password" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="has-feedback form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="row">
                         <div class="col-xs-4 pull-right">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
