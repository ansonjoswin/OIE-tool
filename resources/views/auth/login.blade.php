@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="padding-top: 2%">
        <div class="col-md-8 col-md-offset-2">
        <h4 class="spiked-title grey" style="text-align: center; width: 100%">Login <i class="fa fa-btn fa-user"></i></h4>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Enter your login credentials</strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                    
                       
                        <strong><div style="color:#b32d00;text-align: center;">{!! Session::has('inactive') ? Session::get("inactive") : '' !!}</div></strong>
                        <br/>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label" id = "email">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="E-Mail" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" placeholder="Password"name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="login">
                                <i class="fa fa-btn fa-sign-in"></i>
                                    Login

                                </button>

                                <a class="btn btn-link" id="forgotpassword" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
