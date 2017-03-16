
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Copyright" content="University of Nebraska, Omaha" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OIE ANALYTICAL PROJECT| UNO </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/css/bootstrap.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<!--     <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    @yield('styles')

    <style>
        body { font-family: 'Lato'; }
        .fa-btn { margin-right: 6px; }
    </style>
    <link href="../public/css/all.css" rel="stylesheet">
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

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script> --}}
    <!--<script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>-->


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

        bottom: -150px;
        width: 100%;
        height: 60px;
        background-color: #fff;
        overflow: hidden;


    }
</style>

<!--Update the value of "agree" input when clicking the Agree/Disagree button-->




<!-- Footer -->
@yield('footer');


<script src="../public/js/all.js"></script>
<script src="../public/js/jquery.ui.widget.js"></script>
<script src="../public/js/jquery.knob.js"></script>
<script src="../public/js/jquery.iframe-transport.js"></script>
<script src="../public/js/jquery.fileupload.js"></script>
<!-- Scripts -->
@yield('scripts')

{{-- <script type="text/javascript">

    //###########################################################################
    //####                Change Password Validation              ####
    //###########################################################################


    //###########################################################################
    //####                Terms and Conditions Validation              ####
    //###########################################################################


    $('button[name="registerBtn"]').on('click', function(e){
        var $form=$(this).closest('form');
        e.preventDefault();
        $('#termscond').modal({ backdrop: 'static', keyboard: false })
                .one('click', '#agreeBtn', function() {
                    $form.trigger('submit'); // submit the form
                });
        // .one() is NOT a typo of .on()
    });
</script> --}}




{{-- //Footer
@yield('footer');

<script src="../public/js/all.js"></script>
<script src="../public/js/jquery.ui.widget.js"></script>
<script src="../public/js/jquery.knob.js"></script>
<script src="../public/js/jquery.iframe-transport.js"></script>
<script src="../public/js/jquery.fileupload.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script> --}}
<footer class="footer">
    <div class="container">
        <div class="form-group">
            <div class="col-md-6 col-xs-offset-4">
                <div class="checkbox">
                    <label>
                        <a
                                data-toggle="modal" data-target=".demo-popup1" target="_blank"
                                rel="nofollow" href=""> Legal Disclaimer &copy; 2017</a>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade demo-popup1" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Terms of use</h3>
                </div>
                <div class="modal-body">
                    <p>footer ipsum dolor sit amet, veniam numquam has te. No suas nonumes recusabo
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
    </div>
</footer>

</body>
</html>


