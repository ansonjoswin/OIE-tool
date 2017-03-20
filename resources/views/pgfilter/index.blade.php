@extends('layouts.app')

@section('content')
    @include('common.errors')
    @include('common.flash')

    <script src="js/jquery.selectlistactions.js"></script>

    <link rel="stylesheet" href="css/site.css">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


{!! Form::open(array('url' => 'pgfilter', 'id' => 'pgfilterform', 'class' => 'form')) !!}
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <p>&nbsp;</p>
    <div class="row style-select">
        <div class="col-md-12">
            <div class="form-group">
                    <label>Institution Category</label><br>
                    @if(sizeof($selected_instcat_list) == 0)
                        {{ Form::select('instcat', $instcat_list, ['id' => 'instcat']) }}
                    @else
                        {{ Form::select('instcat', $instcat_list, $selected_instcat_list, ['id' => 'instcat']) }}
                    @endif
            </div>

            <div class="form-group">
                <label>Institution State</label><br>
                    @if(sizeof($selected_stabbr_list) == 0)
                        {{ Form::select('stabbr', $stabbr_list, ['id' => 'stabbr']) }}
                    @else
                        {{ Form::select('stabbr', $stabbr_list, $selected_stabbr_list, ['id' => 'stabbr']) }}
                    @endif
            </div>
            <div class="form-group">
                <input type="button" id="btnFilter" value="View Institutions" class="btn btn-primary" />
            </div>   
        </div>
    </div>
    <div class="row style-select">
        <div class="col-md-12">
            <div class="col-lg-10 col-lg-offset-2">
            </div>
        </div>
    </div>         
</div>
<hr/>

{{ Form::close() }}

<!---Elaine code 
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
Elaine code -->


<!---mathias code -->
    <div class="container">
        {!! Form::open(['url'=>'/peergroups/store', 'class'=>'form-horizontal']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="subject-info-box-1">
                    <label>Available Institutions <label id="dynCounter">({{count($school_ids)}})</label> </label>
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
                    <label>Selected Institutions<label id=SelectedCounter></label></label>
                    <select multiple="multiple" name="lstBox2[]" id="lstBox2" class="form-control" required="required"></select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">  
                    <div class="row">
                        <div class="panel-default col-md-2">
                            <label class="pull-right">Peer Group Name:</label>
                        </div>
                        <div class="panel-default col-md-4">
                            {!! Form::text('peergroup_name', null, ['class' => 'col-md-3 form-control pull-left', 'required' => 'required']) !!} 
                        </div>
                        <div class="panel-default col-md-2">
                            @if(Auth::user()->can(['manage-users','manage-roles']))
                            <select name="private_public_flag" id="private_public_flag" class="col-md-6 form-control">
                                <option value="private" selected="selected">Private</option>
                                <option value="public">Public</option>
                            </select>   
                            @endif                        
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-offset-2">
                    <div class="panel-default col-md-3">   

                        {!! Form::button('<i class="fa fa-btn fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-primary']) !!} 
                    </div>   
            </div>         
        </div>
        {!! Form::close() !!} 
    </div>
<!-- end mathias code -->



<script>
    var selected_cnt = 0;

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
            var dyn_cnt = 0;
            console.log("instcat", selected_instcat_list, "stabbr", selected_stabbr_list);
           $.ajax({
               type: "GET",  //"POST"??
               url: "./this",
               data: {selected_instcat_list:$("#instcat").val(), selected_stabbr_list:$("#stabbr").val()},
               success: function(data) {
                $('#lstBox1').empty();
                $('#dynCounter').empty();
                $.each(data, function(key, value) { // key? value? does array passed have labels?
                      $('#lstBox1').append("<option value='" + key +"'>" + value + "</option>");
                      dyn_cnt++;
                });
                $('#dynCounter').text("("+dyn_cnt+")");
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

@section('footer')