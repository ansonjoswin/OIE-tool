@extends('layouts.app')

@section('content')
    @include('common.errors')
    @include('common.flash')

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Select Peer Groups</title>
    <meta name="description" content="Select List Actions - jQuery Plugin">

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

        $('#btnFilter').on('click', function () {

            $.ajax({
                type: "POST",
                url: "./pgfilter/ajaxresults",
                data: {selected_instcat_list:$("#instcat").val(), selected_stabbr_list:$("#stabbr").val()},
                success: function(data) {
                    console.log("data", data);
                }
            });
            var selected_instcat_list = $("#instcat").val();
            var selected_stabbr_list = $("#stabbr").val();
            console.log("instcat", selected_instcat_list, "stabbr", selected_stabbr_list);
            $.get("{{ url('/pgfilter/ajaxresults')}}",function(data) {
                $('#lstBox1').empty();
                console.log("emptied selected table");
                $.each(data, function(school_name, School_ID) {
                    // alert("Hello! I am an alert box!!");
                    console.log("in foreach loop");
                    $('#lstBox1').append("<option value='" + school_name +"'>" + School_ID + "</option>");
                });
                console.log ("after foreach loop");
            });

//            return false;
        });



//        $('#btnFilter').click(function(){
////            alert($(this).text());
//            var selected_instcat_list = $("#instcat").val();
//            var selected_stabbr_list = $("#stabbr").val();
//            console.log("instcat", selected_instcat_list, "stabbr", selected_stabbr_list);
//            $.get('ajaxresults',function(data){
//
//                console.log("this", this);
//            });
//        });



        {{--$("#btnFilter").on("click", function(e){--}}
            {{--e.preventDefault();--}}
            {{--console.log("in btnFilter function");--}}
            {{--var selected_instcat_list = $("#instcat").val();--}}
            {{--var selected_stabbr_list = $("#stabbr").val();--}}
            {{--console.log("instcat", selected_instcat_list, "stabbr", selected_stabbr_list);--}}

            {{--$.get("{{ url('/pgfilter/ajaxresults')}}",--}}
{{--//                    { option: $(this).val() },--}}
//                    function(data) {
//                        $('#lstBox1').empty();
//                        console.log("emptied selected table");
//                        $.each(data, function(school_name, School_ID) {
//                            // alert("Hello! I am an alert box!!");
//                            console.log("in foreach loop");
//                            $('#lstBox1').append("<option value='" + school_name +"'>" + School_ID + "</option>");
//                        });
//                        console.log ("after foreach loop");
//                    });


//        });

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
</body>
</html>

@endsection