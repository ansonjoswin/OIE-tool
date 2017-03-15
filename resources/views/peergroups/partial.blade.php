<script src="{{ URL::asset('js/jquery.selectlistactions.js') }}"></script>

<link rel="stylesheet" href="{{ URL::asset('css/site.css') }}">

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<div class="form-group{{ $errors->has('PeerGroupName') ? ' has-error' : '' }}">
    {!! Form::label('PeerGroupName', 'Peer Group Name:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('PeerGroupName', null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
        @if ($errors->has('PeerGroupName'))
            <span class="help-block">
                <strong>{{ $errors->first('PeerGroupName') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('PriPubFlg') ? ' has-error' : '' }}">
    {!! Form::label('PriPubFlg', 'Private/Public:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">

        @if($CRUD_Action == 'Create' )
            {!! Form::select('PriPubFlg',[null=>''] + $PriPubFlgList, null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
        @else
{{--            {{ $peergroup->PriPubFlg }}--}}
            {{--EHLbug: below code does not bring up correct default - why?--}}
            {!! Form::select('PriPubFlg', $PriPubFlgList, $peergroup->PriPubFlg, ['class' => 'col-md-6 form-control', 'required' => 'required', 'selected' => 'selected']) !!}
        @endif


        @if ($errors->has('PriPubFlgList'))
            <span class="help-block">
                <strong>{{ $errors->first('PriPubFlgList') }}</strong>
            </span>
        @endif
    </div>
</div>

{{--{!! Form::open(array('url' => 'peergroups', 'id' => 'peergroupsform', 'class' => 'form')) !!}--}}
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
            {{--<div class="col-md-12">--}}
            {{--<div class="col-lg-10 col-lg-offset-2">--}}
            {{--</div>--}}
            <div class="form-group">
                <label>Carnegie Classification 2010 Basic</label><br>
                @if(sizeof($selected_ccbasic_list) == 0)
                    {{ Form::select('ccbasic', $ccbasic_list, ['id' => 'ccbasic']) }}
                @else
                    {{ Form::select('ccbasic', $ccbasic_list, '-9', ['id' => 'ccbasic']) }}
                @endif
            </div>

            <div class="form-group">
                <label>Carnegie Classification 2010 Basic</label><br>
                <select id="ccbasicyearid" name="ccbasicyearid"></select>
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
                <input type="button" id="btnFilter" value="View Institutions" class="btn btn-default" />
            </div>
        </div>
    </div>
</div>
</div>
<hr/>
{{--{{ Form::close() }}--}}

<div class="container">
{{--    {!! Form::open(['url'=>'/peergroups/store', 'class'=>'form-horizontal']) !!}--}}
    <div class="row">
        <div class="col-md-7">
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
                {{--({{$optslength}})--}}
                <select multiple="multiple" name="lstBox2[]" id="lstBox2" class="form-control" required="required">
                @foreach($list_school as $key => $value)
                    <option value="{{ $key }}"> {{ $value }} </option>
                @endforeach
                </select>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-7">
            <div class="pull-right">

            {!! Form::button('<i class="fa fa-btn fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
{{--    {!! Form::close() !!}--}}
</div>

<script>
    var selected_cnt = 0;

    $(document).ready(function($){

        //Load Year dropdown.
        var start = 2000;
        var end = 2020;
        var options = "<option value='default'>\-\- Select Carnegie Classification Year \-\-</option>";
        for(var year = start; year <= end; year++) {
            options += "<option value=\"" + year + "\">"+ year +"</option>";
        }
        document.getElementById("ccbasicyearid").innerHTML = options;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //populate Available Institutions dynamically on submit (click on "Institution List")
        $('#btnFilter').on('click', function () {
            var selected_instcat_list = $("#instcat").val();
            var selected_stabbr_list = $("#stabbr").val();
            var selected_ccbasic_list = $("#ccbasic").val();
            var ccbasicyearid = $("#ccbasicyearid").val();
//            var ccbasicyearid = 2014;
            var dyn_cnt = 0;
            console.log("instcat", selected_instcat_list, "stabbr", selected_stabbr_list, "ccbasic", selected_ccbasic_list, "ccbasicyearid", ccbasicyearid);
            $.ajax({
                type: "GET",
                url: "/unoistoie-acbat/public/this",
                //EHLbug: how do I call the URL implicitly?
                data: {selected_instcat_list:$("#instcat").val(), selected_stabbr_list:$("#stabbr").val(), selected_ccbasic_list:$("#ccbasic").val(), ccbasicyearid:$("#ccbasicyearid").val()},
//               why isn't it passing ccbasicyearid to web.php /this function?
                success: function(data) {
                    $('#lstBox1').empty();
                    $('#dynCounter').empty();
                    $.each(data, function(key, value) {
                        $('#lstBox1').append("<option value='" + key +"'>" + value + "</option>");
                        dyn_cnt++;
                    });
                    $('#dynCounter').text("("+dyn_cnt+")");
                }
            });
        });

        // script for moving between Available Institutions and Selected Institutions
        $('#btnRight').click(function (e) {
            $('select').moveToListAndDelete('#lstBox1', '#lstBox2');
            e.preventDefault();
//            $optslength = $optslength;
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





{{--<div class="form-group">--}}
    {{--<label class="col-md-4 control-label">Institutions: ({{ count($list_school) }})</label>--}}
    {{--<div class="col-md-6">--}}
        {{--@if($CRUD_Action == 'Create' )--}}
            {{--{!! Form::select('schoollist[]', $list_school->pluck('School_Name'), null, ['class' => 'form-control roles cds-select', 'multiple', 'style' => 'width: 50%; margin-top: 10px;', 'required' => 'required']) !!}--}}
        {{--@else--}}
            {{--{!! Form::select('schoollist[]', $list_school->pluck('School_Name'), null, ['class' => 'form-control roles cds-select', 'multiple', 'style' => 'width: 50%; margin-top: 10px;']) !!}--}}
        {{--@endif--}}

        {{--//EHLbug: (SQL: select * from `school_peergroups` where `school_peergroups`.`peer_group_PeerGroupID` = 4 and `school_peergroups`.`peer_group_PeerGroupID` is not null)--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--<div class="col-md-6 col-md-offset-4">--}}
        {{--{!! Form::button('<i class="fa fa-btn fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}--}}
    {{--</div>--}}
{{--</div>--}}
