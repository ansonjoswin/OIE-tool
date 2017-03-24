<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>change demo</title>
  
</head>
@extends('layouts.app')

@section('content')

{{--  <script src="{{ URL::asset('js/jquery.selectlistactions.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/site.css') }}"> --}}


<body>
 
             
                     
  {{ Form::select('peergroup', $peergroup_list, ['id' => 'instcat']) }}
           

<script>
$( "select" )
  .change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).text() + " ";
    });
    $( "div" ).text( str );
  })
  .change();

  
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</script>

</body>

</html>
