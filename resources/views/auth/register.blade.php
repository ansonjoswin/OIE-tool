@extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form id="registrationForm" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">

                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" placeholder="E-Mail" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('affiliation') ? ' has-error' : '' }}">
                                <label for="affiliation" class="col-md-4 control-label">Affiliation</label>

                                <div class="col-md-6">
                                    <select id="affiliation" class="form-control" placeholder="Affiliation" name="affiliation" value="{{ old('affiliation') }}" required autofocus>
                                    <option value="Higher Education">Higher Education</option>
                                    <option value="Journalism">Journalism</option>
                                    <option value="Government">Government</option>
                                    <option value="Policy Analyst">Policy Analyst</option>
                                    <option value="Accreditation">Accreditation</option>
                                    </select>

                                    @if ($errors->has('affiliation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('affiliation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#termscond" >I agree with the terms and conditions</button>
                                    <input type="hidden" name="agree" value="no" />
                                </div>
                             </div> --}}
                            
                            

                <!--Terms and conditions-->

                <div class="form-group">
        </div>

    <div class="form-group">
        <div class="col-md-6 col-xs-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="agree" value="agree" / required><a data-toggle="modal" data-target=".demo-popup" target="_blank" rel="nofollow" href=""> Agree with the terms and conditions</a>
                </label>
            </div>
        </div>
    </div>

    <div class="form-group" >
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" id="registerBtn" name="registerBtn" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>

<div class="modal fade demo-popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h3 class="modal-title">Terms of use</h3>
            </div>
            <div class="modal-body">
                <p>Kavya is great</p>
            </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal-->
<!-- popup box modal ends -->
</div>
</div>
</div>
</div>
</div>
@endsection
