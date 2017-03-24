@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form id="registrationForm" class="form-horizontal" role="form" method="POST"
                              action="{{ url('/register') }}">

                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" placeholder="E-Mail"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('affiliation') ? ' has-error' : '' }}">
                                <label for="affiliation" class="col-md-4 control-label"
                                       id="affiliation">Affiliation</label>

                                <div class="col-md-6">
                                    <select id="affiliation" class="form-control" placeholder="Affiliation"
                                            name="affiliation" value="{{ old('affiliation') }}" required autofocus>
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
                                    <input id="password" type="password" placeholder="password" class="form-control"
                                           name="password" required>

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
                                    <input id="password-confirm" type="password" placeholder="Confirm Password"
                                           class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group">
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-xs-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="agree" value="agree" / required><a
                                                    data-toggle="modal" data-target=".demo-popup" target="_blank"
                                                    rel="nofollow" href=""> Agree with the terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" id="registerBtn" name="registerBtn" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="modal fade demo-popup" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        <h3 class="modal-title">Terms of use</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>Lorem ipsum dolor sit amet, veniam numquam has te. No suas nonumes recusabo
                                            mea, est ut graeci definitiones. His ne melius vituperata scriptorem, cum
                                            paulo copiosae conclusionemque at. Facer inermis ius in, ad brute nominati
                                            referrentur vis. Dicat erant sit ex. Phaedrum imperdiet scribentur vix no,
                                            ad latine similique forensibus vel.</p>
                                        <p>Dolore populo vivendum vis eu, mei quaestio liberavisse ex. Electram
                                            necessitatibus ut vel, quo at probatus oportere, molestie conclusionemque
                                            pri cu. Brute augue tincidunt vim id, ne munere fierent rationibus mei. Ut
                                            pro volutpat praesent qualisque, an iisque scripta intellegebat eam.</p>
                                        <p>Mea ea nonumy labores lobortis, duo quaestio antiopam inimicus et. Ea natum
                                            solet iisque quo, prodesset mnesarchum ne vim. Sonet detraxit temporibus no
                                            has. Omnium blandit in vim, mea at omnium oblique.</p>
                                        <p>Eum ea quidam oportere imperdiet, facer oportere vituperatoribus eu vix, mea
                                            ei iisque legendos hendrerit. Blandit comprehensam eu his, ad eros veniam
                                            ridens eum. Id odio lobortis elaboraret pro. Vix te fabulas partiendo.</p>
                                        <p>Natum oportere et qui, vis graeco tincidunt instructior an, autem elitr
                                            noster per et. Mea eu mundi qualisque. Quo nemore nusquam vituperata et, mea
                                            ut abhorreant deseruisse, cu nostrud postulant dissentias qui. Postea
                                            tincidunt vel eu.</p>
                                        <p>Ad eos alia inermis nominavi, eum nibh docendi definitionem no. Ius eu stet
                                            mucius nonumes, no mea facilis philosophia necessitatibus. Te eam vidit
                                            iisque legendos, vero meliore deserunt ius ea. An qui inimicus
                                            inciderint.</p>

                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal-->
                    </div> <!-- popup box modal ends -->
                </div>
            </div>
        </div>
    </div>

@endsection
