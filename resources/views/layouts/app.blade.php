<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Copyright" content="University of Nebraska, Omaha" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OIE ANALYTICAL PROJECT| UNO </title>

    <link rel="icon" href="{{ asset('images/favicon-32x32') }}" type="image/png">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">


    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    @yield('styles')

    <style>
        body { font-family: 'Lato'; }
        .fa-btn { margin-right: 6px; }
        .footer-section {
            margin-top: 10px;
        }

        .spiked-title {
  position: relative;
  text-transform: uppercase;
  width: 75%;
  max-width: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: .5em 1em;
  overflow: visible;
  font-weight: normal;
  letter-spacing: 2px;
  margin-bottom: 1em; }
  .page-template-gothenburg-php .spiked-title {
    font-size: 14px;
    padding: .75em 1em .7em; }
    @media (min-width: 480px) {
      .page-template-gothenburg-php .spiked-title {
        font-size: 16px;
        padding: .5em 1em; } }
  /*.spiked-title:after {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    right: -45px;
    width: 0;
    height: 0;
    border-top: 0px solid transparent;
    border-bottom: 40px solid transparent; }*/

.spiked-title.grey, .bg-red .spiked-title.button, .bg-red .file-input .spiked-title.btn, .file-input .bg-red .spiked-title.btn {
  background-color: #1d3035;
  color: #fff; 

}
  /*.spiked-title.grey:after, .bg-red .spiked-title.button:after, .bg-red .file-input .spiked-title.btn:after, .file-input .bg-red .spiked-title.btn:after
   {
    border-left: 45px solid #1d3035;
     }*/
     .spiked-title.light-grey {
  background-color: #979797;
  color: #fff; }
  .spiked-title.light-grey:after {
    border-left: 45px solid #979797; }

.spiked-title.dark-red {
  background-color: #1d3035;
  color: #fff; }
  .spiked-title.dark-red:after {
    border-left: 45px solid #1d3035; }


     #map{
        width: 700px;
        height:400px;
        margin: auto;
     }
    </style>
    <link href="{{ URL::asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet"> 
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body id="app-layout">
<div id="app"></div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



<!-- Navigation Bar -->
@include('common.nav')

<!-- Content -->
@yield('content')

<style>
    form {margin: 0px;}
    ul.pagination { margin: 0px !important; }
    ul.pagination li { margin: 0px !important; padding: 0px !important }
    div.dataTables_length select { padding: 5px !important; padding-right: 15px !important; }
    /* required fields have a red border */
    .errorClass { border:  1px solid red; }
    /* remove panel bottom margin */
    .panel { margin-bottom: 0px !important;  }
    button.btn { margin-right: 1px;}
    /* menu bar */
    .dropdown-submenu { position: relative; }
    .dropdown-submenu>.dropdown-menu { top: 0; left: 100%; margin-top: -6px; margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px; }
    .dropdown-submenu:hover>.dropdown-menu { display: block; }
    .dropdown-submenu>a:after { display: block; content: " "; float: right; width: 0; height: 0;
        border-color: transparent; border-style: solid; border-width: 5px 0 5px 5px; border-left-color: #ccc;
        margin-top: 5px; margin-right: -10px; }
    .dropdown-submenu:hover>a:after { border-left-color: #fff; }
    .dropdown-submenu.pull-left { float: none; }
    .dropdown-submenu.pull-left>.dropdown-menu { left: -100%; margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px; -moz-border-radius: 6px 0 6px 6px; border-radius: 6px 0 6px 6px; }

    .footer {
        position: relative;
        bottom:-490px;
        width: 100%;
        height: 40px;
        background-color: #fff;
        overflow: hidden;
    }
   
</style>

<!-- Footer -->
{{-- @yield('footer'); --}}
@yield('footer');

<script src="{{ URL::asset('js/all.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-typeahead.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('js/jquery.knob.js') }}"></script>
<script src="{{ URL::asset('js/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('js/jquery.fileupload.js') }}"></script>

<!-- Contact Form JavaScript -->
    {{Html::script('js/jqBootstrapValidation.js')}}
    <!-- <script src="js/jqBootstrapValidation.js"></script> -->
    {{Html::script('js/contact_me.js')}}
    <!-- <script src="js/contact_me.js"></script> -->

<!-- Scripts -->
@yield('scripts')

<!-- Footer -->
@include('common.footer')

</body>
</html>