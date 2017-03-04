@extends('layouts.app')

@section('content')
    @include('common.errors')
    @include('common.flash')


    <title>Select Peer Groups</title>
    <meta name="description" content="UNO OIE ACBAT Peer Group Selection by Filter">

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.selectlistactions.js"></script>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/site.css">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

{!! Form::open(array('url' => 'pgfilter', 'id' => 'pgfilterform', 'class' => 'form')) !!}
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <p>&nbsp;</p>
    <div class="row style-select">
        <div class="col-md-12">

            <div class="form-group">
                    <label>Institution Category</label><br>
                    @if(sizeof($selected_instcat_list) == 0)
                        {{ Form::select('instcat', $instcat_list) }}
                    @else
                        {{ Form::select('instcat', $instcat_list, $selected_instcat_list, ['id' => 'instcat']) }}
                    @endif
            </div>

            <div class="form-group">
                <label>Institution State</label><br>
                    @if(sizeof($selected_stabbr_list) == 0)
                        {{ Form::select('stabbr', $stabbr_list) }}
                    @else
                        {{ Form::select('stabbr', $stabbr_list, $selected_stabbr_list, ['id' => 'stabbr']) }}
                    @endif

            </div>
        </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        <input type="button" id="btnFilter" value="View Institutions" class="btn btn-primary" /><br />
    </div>
    {{ Form::close() }}

</div>

<div class="container">
    <p>&nbsp;</p>
    <div class="row style-select">
        <div class="col-md-12">
            <div class="subject-info-box-1">
                <label>Available Institutions</label>
                <select multiple class="form-control" id="lstBox1">
                @foreach($school_ids as $key => $value)
                    <option value="{{ $key }}"> {{ $value }} </option>
                @endforeach
                </select>
            </div>

            <div class="subject-info-arrows text-center">
                <br /><br />
                <input type='button' id='btnAllRight' value='>>' class="btn btn-default" /><br />
                <input type='button' id='btnRight' value='>' class="btn btn-default" /><br />
                <input type='button' id='btnLeft' value='<' class="btn btn-default" /><br />
                <input type='button' id='btnAllLeft' value='<<' class="btn btn-default" />
            </div>

            <div class="subject-info-box-2">
                <label>Institutions You Have Selected</label>
                <select multiple class="form-control" id="lstBox2">

                </select>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

{{--{{ Form::close() }}--}}

<script>
    $(document).ready(function($){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //attempt to populate Available Institutions dynamically on submit (click on "Institution List")
        $('#btnFilter').on('click', function () {
            var selected_instcat_list = $("#instcat").val();
            var selected_stabbr_list = $("#stabbr").val();
            console.log("instcat", selected_instcat_list, "stabbr", selected_stabbr_list);
           $.ajax({
               type: "GET",  //"POST"??
               url: "./this",
               data: {selected_instcat_list:$("#instcat").val(), selected_stabbr_list:$("#stabbr").val()},
               success: function(data) {
                $('#lstBox1').empty();
                $.each(data, function(key, value) { // key? value? does array passed have labels?
                      $('#lstBox1').append("<option value='" + key +"'>" + value + "</option>");
                });
                   //console.log("data from ajaxresults: ", data); //have gotten data here from different methods but then can't populate the table
               }
           });

            // $.get("{{ url('this')}}",function(data) {
            //     // $('#lstBox1').empty();  // the table gets emptied but this may also be an issue with pgfilter/show not being used
            //     // $.each(data, function(key, value) { // key? value? does array passed have labels?
            //     //     $('#lstBox1').append("<option value='" + key +"'>" + value + "</option>");
            //     // });
            //     console.log(data);

            // });
        });

        // script for moving between Available Institutions and Selected Institutions
        $('#btnRight').click(function (e) {
            $('select').moveToListAndDelete('#lstBox1', '#lstBox2');
            e.preventDefault();
        });
        $('#btnAllRight').click(function (e) {
            $('select').moveAllToListAndDelete('#lstBox1', '#lstBox2');
            e.preventDefault();
        });
        $('#btnLeft').click(function (e) {
            $('select').moveToListAndDelete('#lstBox2', '#lstBox1');
            e.preventDefault();
        });
        $('#btnAllLeft').click(function (e) {
            $('select').moveAllToListAndDelete('#lstBox2', '#lstBox1');
            e.preventDefault();
        });

    });

</script>

@endsection