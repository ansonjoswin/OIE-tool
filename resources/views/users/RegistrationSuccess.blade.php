@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	       	@if($passwordSuccess === 'passed')
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong><h4 align="center">Password Change Success</h4></strong>
					</div>
					<div class="panel-body">
						<h5><p align="center">The password has been successfully changed!</p></h5>
					</div>
				</div>
			@else
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong><h4 align="center">Password Change Failure</h4></strong>
					</div>
					<div class="panel-body">
						<h5><p align="center">Please input the right old password and try again!</p></h5>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>	
@endsection