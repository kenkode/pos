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

                    <p class="login-box-msg">Forgot Password</p>

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="has-feedback form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus placeholder="Enter your email address" required>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        
                        </div>

                        <div class="row">
                            <div class="col-xs-8">
                                <a href="{{ URL::to('/') }}">Go Back</a>
                            </div>
                        

                        <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
