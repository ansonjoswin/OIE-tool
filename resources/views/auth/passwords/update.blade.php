@extends('layouts.app')

@section('content')
<div class="container">
	 <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default"> 
                <div class="panel-heading">Update Password</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/updatePassword') }}">
                        {{ csrf_field() }}

                        
	                   
	                    <div class="form-group floating-label-form-group controls {{ $errors->has('oldpassword') ? ' has-error' : '' }}">
	                        <label for="oldpassword" class="col-md-4 control-label" style="color:#2c3e50;">Old Password</label>

	                        <div class="col-md-6">
	                            <input id="oldpassword" type="password" class="form-control" placeholder="Old Password"  name="oldpassword" required>

	                            @if ($errors->has('oldpassword'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('oldpassword') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                   
	                   
	                    <div class="form-group floating-label-form-group controls {{ $errors->has('password') ? ' has-error' : '' }}">
	                        <label for="password" class="col-md-4 control-label" style="color:#2c3e50;">Password</label>

	                        <div class="col-md-6">
	                            <input id="txtNewPassword" type="password" class="form-control" placeholder="Password"  name="password" required>

	                            @if ($errors->has('password'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('password') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group floating-label-form-group controls{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	                        <label for="password_confirmation" class="col-md-4 control-label" style="color:#2c3e50;">Confirm Password</label>

	                        <div class="col-md-6">
	                            <input id="txtConfirmPassword" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" onchange="checkPasswordMatch();" required>

	                            @if ($errors->has('password_confirmation'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

                		<div style="color:red;" class="form-group registrationFormAlert" id="divCheckPasswordMatch"></div>

	                    <div class="form-group">
	                        <div class="col-md-8 text-center">
	                        <button type="submit" class="btn btn-primary" style="margin: 0px 0px 0px 142px;">
	                                Reset Password
	                            </button>
	                        </div>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>	
    
@endsection
