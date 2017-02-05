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

                            {{-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                                    <select id="affiliation" class="form-control" name="affiliation" value="{{ old('affiliation') }}" required autofocus>
                                    <option value="AffiliationName">Affiliation-1</option>
                                    <option value="AffiliationName">Affiliation-2</option>
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
                                    <input id="password" type="password" class="form-control" name="password" required>

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#termscond">I agree with the terms and conditions</button>
                                    <input type="hidden" name="agree" value="no" />
                                </div>
                             </div> --}}
                            
                            <div class="form-group" >
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" id="registerBtn" name="registerBtn" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>

                <!--Terms and conditions-->

                    <div class="modal fade" id="termscond" tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true" data-fv-callback-callback = "true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Terms and conditions</h3>
                                </div>
                                <div class="modal-body">
                                    <p><h1>Terms and Conditions</h1></p>
                                    <p><h3>Credit</h3>

<p>This document was created using a Contractology template available at http://www.contractology.com.</p>

<p><h2>Introduction</h2></p>

<p>These terms and conditions govern your use of this website; by using this website, you accept these terms and conditions in full.   If you disagree with these terms and conditions or any part of these terms and conditions, you must not use this website. [You must be at least [18] years of age to use this website.  By using this website [and by agreeing to these terms and conditions] you warrant and represent that you are at least [18] years of age.][This website uses cookies.  By using this website and agreeing to these terms and conditions, you consent to our [NAME]'s use of cookies in accordance with the terms of [NAME]'s [privacy policy / cookies policy].] </p>

<p><h2>License to use website</h2></p>

<p>Unless otherwise stated, [NAME] and/or its licensors own the intellectual property rights in the website and material on the website.  Subject to the license below, all these intellectual property rights are reserved.You may view, download for caching purposes only, and print pages [or [OTHER CONTENT]] from the website for your own personal use, subject to the restrictions set out below and elsewhere in these terms and conditions.  </p>

<p><h3>You must not:</h3></p>
<li>
<ul>
republish material from this website (including republication on another website);
</ul>
<ul>sell, rent or sub-license material from the website;</ul>
<ul>show any material from the website in public;</ul>
<ul>reproduce, duplicate, copy or otherwise exploit material on this website for a commercial purpose;]</ul>
<ul>[edit or otherwise modify any material on the website; or]</ul>
<ul>[redistribute material from this website [except for content specifically and expressly made available for redistribution].]</ul>
</li>

<p>[Where content is specifically made available for redistribution, it may only be redistributed [within your organisation].]</p>

<p><h2>Acceptable use</h2></p>

<p>You must not use this website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity.</p>

<p>You must not use this website to copy, store, host, transmit, send, use, publish or distribute any material which consists of (or is linked to) any spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software.</p>

<p>You must not conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to this website without [NAME'S] express written consent.</p>

<p>[You must not use this website to transmit or send unsolicited commercial communications.]</p>

<p>[You must not use this website for any purposes related to marketing without [NAME'S] express written consent.]  </p>

                                    <p>Add Terms and Conditions
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="agreeBtn" onClick="save(this);" value="Yes" data-dismiss="modal">I Agree</button>
                                    <button type="button" class="btn btn-default" id="disagreeBtn" data-dismiss="modal">I Disagree</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
