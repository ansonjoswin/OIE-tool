@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-6" style="padding-top: 50px">
                <div class="panel panel-default">
                    <div class="panel-heading">Contact Us</div>
                    <div class="panel-body">
                    <!-- This is a form to send information about the person who contacted the page. -->
                    <form name="sentMessage" id="contactForm" novalidate>

                            {{-- {{ csrf_field() }} --}}
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" placeholder="Name" name="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>

                                    {{-- @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif --}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email Address</label>
                                <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                          </div>
                        </div>
                        <div class="form-group">
                            
                                <label for="phone" class="col-md-4 control-label">Phone Number</label>
                                <div class="col-md-6">
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            
                                <label for="message" class="col-md-4 control-label">Message</label>
                                <div class="col-md-6">
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                      <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-md-8 col-md-offset-4" style="padding-left: 23px">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-sign-in"></i>Send</button>
                            </div>
                        </div>
                        </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>


<!--Maps!-->
<div class="container" style="padding-top: 50px; padding-left: 40px">
<div style="overflow: hidden">
<a class= "larger-map-link" href="//maps.google.com/maps" target="_blank">View Larger Map</a>
</div>
<div id="map" style="width:800px;height:500px;"></div>
</div>
</div>
<script>
      function initMap() {
        var uluru = {lat: 41.259153, lng: -96.010748};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkxa2HKZ9ptDGkWG8htAh9_dBEr2qFgBk&callback=initMap">
    </script>

@endsection