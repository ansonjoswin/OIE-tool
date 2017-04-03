@extends('layouts.app')

@section('content')

<div class="container">   
<div class="row" style="padding-top: 2%">
@include('common.flash')

<!-- ************** Contact Us paragraph************** !-->
			<div class="col-md-6">
			<h4 class="spiked-title grey" style="text-align: center;">Contact Us <i class="fa fa-btn fa-address-book"></i></h4>
			  <div class="txt " style="padding-left: 10%;padding-top: 2%; font-size: 17px;">
			     <p><strong>Hank Robbinson<br></strong></p>
			     <p><strong>6001 Dodge St, Omaha, NE 68182<br>
			     Office of Institutional Effectiveness<br>
			    EAB 202<br>
			    </strong></p>
			     <p><strong>+1.402.554.3750</strong></p>

			 	<p><strong><a href="mailto:trobinson@unomaha.edu" target="_blank">trobinson@unomaha.edu</a></strong></p>
			 	</div> 
			 </div>


<!-- ************* Contact us form************ !-->
 <div class="col-md-6">
 <h4 class="spiked-title grey" style="text-align: center; width: 100%">Email Us <i class="fa fa-btn fa-envelope"></i></h4>
     <div class="panel panel-default">
    <div class="panel-heading"><strong>Email us and we'll get back to you</strong></div>
        <div class="panel-body">
        <!-- This is a form to send information about the person who contacted the page. -->
  {{-- @include('common.errors') --}}
                <form action="{{ url('contact')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-6">
                        <input id='name' placeholder="Name" name="name" class="form-control">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                        <input id='email' placeholder="E-mail" name="email" class="form-control">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for="message" class="col-md-4 control-label">What can we help you with?</label>
                        <div class="col-md-6">
                        <textarea rows="3" class="form-control" placeholder="Message" name="message"></textarea>
                        {{-- <input id='message' placeholder="Message" name="message" type="textarea" rows="3" class="form-control"> --}}
                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    
            <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>
                            Send Email
                        </button>
                    </div>
                </div>
            </form>
                </div>
                </div>
                </div>
                </div>
                </div>
 </div>
</div>

<!--**************************Map*********************!-->
<div class="container">

	<div style="padding-left:20%; padding-top: 2%;">
		<h4 class="spiked-title grey" style="text-align: center;">Find Us <i class="fa fa-btn fa-map-marker"></i></h4>
</div>
	
<a class= "larger-map-link" style="padding-left: 20%" href="//maps.google.com/maps" target="_Parent">View Larger Map</a>
	<div id="map">
		
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