
<script src="{{ URL::asset('js/jquery.selectlistactions.js') }}"></script>

<link rel="stylesheet" href="{{ URL::asset('css/site.css') }}">


<div class="form-group{{ $errors->has('peergroup_name') ? ' has-error' : '' }}">
    
    <div class="col-md-12">
        <div class=" row">
            <div class="col-md-1">
                {!! Form::label('peergroup_name', 'Name:', ['class'=>'col-md-4 control-label', 'data-toggle'=>'tooltip','title'=>'Peer Group Name']) !!}
            </div>
            <div class="col-md-6">
                {!! Form::text('peergroup_name', null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
                @if ($errors->has('peergroup_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('peergroup_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-3">
                @if(($user->getRoleListAttribute()->first() == 1))
                    @if($CRUD_Action == 'Create' )
                            {!! Form::select('private_public_flag', $PriPubFlgList, null, ['class'=>'col-md-6 form-control', 'required'=>'required']) !!}
                        @else
                            {!! Form::select('private_public_flag', $PriPubFlgList, $peergroup->private_public_flag, ['class'=>'col-md-6 form-control', 'required'=>'required', 'selected'=>'selected']) !!}
                    @endif
                    @if ($errors->has('private_public_flag'))
                        <span class="help-block">
                            <strong>{{ $errors->first('private_public_flag') }}</strong>
                        </span>
                    @endif   
                @endif
            </div>   
        </div>  
    </div>
</div>

<!-- @if(($user->getRoleListAttribute()->first() == 1)) -->
<!-- <div class="form-group{{ $errors->has('private_public_flag') ? ' has-error' : '' }}">
    {!! Form::label('private_public_flag', 'Private/Public:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
            @if($CRUD_Action == 'Create' )
                    {!! Form::select('private_public_flag',[null=>''] + $PriPubFlgList, null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}
                @else
                    {!! Form::select('private_public_flag', $PriPubFlgList, $peergroup->private_public_flag, ['class' => 'col-md-6 form-control', 'required' => 'required', 'selected' => 'selected']) !!}
            @endif
            @if ($errors->has('private_public_flag'))
                <span class="help-block">
                    <strong>{{ $errors->first('private_public_flag') }}</strong>
                </span>
            @endif
    </div>
</div> -->
<!-- @endif -->


<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container" style="border-top: 0px; padding-top: 0px; ">
    <p>&nbsp;</p>
    <div class="row style-select" style="border-top: 0px; padding-top: 0px">
        <div class="col-md-8">
            <div class=" row">
                <div class="col-md-3" align="right">
                    {{ Form::label('instcat_lbl', 'Institution Category: ') }}
                </div>
                <div class="col-md-5" align="right">
                @if(sizeof($selected_instcat_list) == 0)
                    {{ Form::select('instcat', $instcat_list, ['id' => 'instcat', 'class'=>'col-md-12']) }}
                @else
                    {{ Form::select('instcat', $instcat_list, $selected_instcat_list, ['id' => 'instcat', 'class'=>'col-md-12']) }}
                @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-3" align="right">
                    {{ Form::label('cc_lbl', 'Carnegie Classification: ', ['data-toggle'=>'tooltip','title'=>'Carnegie Classification 2010 Basic']) }}
                </div>
                <div class="col-md-5">
                @if(sizeof($selected_ccbasic_list) == 0)
                    {{ Form::select('ccbasic', $ccbasic_list, ['id'=>'ccbasic', 'class'=>'col-md-12']) }}
                @else
                    {{ Form::select('ccbasic', $ccbasic_list, '-9', ['id'=>'ccbasic', 'class'=>'col-md-12']) }}
                @endif
                </div>            
            </div>
            <div class="row">
                <div class="col-md-3" align="right">
                    {{ Form::label('yr_lbl', 'Carnegie Year: ', ['data-toggle'=>'tooltip','title'=>'Carnegie Classification 2010 Basic Year']) }}
                </div>
                <div class="col-md-5">
                @if(sizeof($selected_ccbasic_list) == 0)
                    {{ Form::select('ccbasicyearid', array(null=>'All') + $ccbasicyearid, ['id'=>'ccbasicyearid', 'class'=>'col-md-4']) }}
                @else
                    {{ Form::select('ccbasicyearid', array(null=>'All') + $ccbasicyearid, null, ['id'=>'ccbasicyearid', 'class'=>'col-md-4']) }}
                @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-3" align="right">
                    {{ Form::label('stabbr_lbl', 'Institution State: ') }}
                </div>
                <div class="col-md-5">
                @if(sizeof($selected_stabbr_list) == 0)
                    {{ Form::select('stabbr', $stabbr_list, ['id'=>'stabbr', 'class'=>'col-md-6']) }}
                @else
                    {{ Form::select('stabbr', $stabbr_list, $selected_stabbr_list, ['id'=>'stabbr', 'class'=>'col-md-6']) }}
                @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-8" align="center">
                {{ Form::button('<i class="fa fa-btn fa-sm fa-filter"></i>Filter', array('class'=>'btn btn-sm btn-gray', 'id'=>'btnFilter')) }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br/>


<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="subject-info-box-1">
                <label>Available Institutions <label id="dynCounter">({{count($school_ids)}})</label> </label>
                <select multiple class="form-control" id="lstBox1">
                    @foreach($school_ids as $key => $value)
                        <option value="{{ $key }}">{{ $value }} </option>
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
                <label>Selected Institutions
                    <label id="selCounter">
                        @if(isset($list_school))
                            ({{count($list_school)}})
                        @else
                            (0)
                        @endif
                    </label>
                </label>
                <select multiple="multiple" name="lstBox2[]" id="lstBox2" class="form-control" required="required">
                    @if($CRUD_Action == 'Update' )
                        @foreach($list_school as $key => $value)
                            <option value="{{ $key }}"> {{ $value }} </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-7">
            <div class="pull-right">
            {!! Form::button('<i class="fa fa-btn fa-lg fa-save"></i>Save', ['type'=>'submit', 'class'=>'btn btn-primary btn-lg', 'id'=>'submit_btn', 'onClick'=>'selectAll()', 'data-toggle'=>'modal', 'data-target'=>'#loadingModal']) !!}
            <br/><br/>
            </div>
        </div>
    </div>
</div>

<div id="loadingModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">        
                        <strong><br/>Saving...<br/><br/></strong>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
    var sel_cnt = 0;

    $(document).ready(function($){

          $('cc_lbl').tooltip();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Populate Available Institutions dynamically on submit (click on "Institution List")
        $('#btnFilter').on('click', function () {
            var selected_instcat_list = $("#instcat").val();
            var selected_stabbr_list = $("#stabbr").val();
            var selected_ccbasic_list = $("#ccbasic").val();
            var ccbasicyearid = $("#ccbasicyearid").val();

            // If Carnegie is selected without having selected a Carnegie Year, notify the user
            if (selected_ccbasic_list != -9 && ccbasicyearid == ''){
                alert("Please select a Carnegie Classification Year.");
            }else{
                var dyn_cnt = 0;
                console.log("instcat", selected_instcat_list, "stabbr", selected_stabbr_list, "ccbasic", selected_ccbasic_list, "ccbasicyearid", ccbasicyearid);
                $.ajax({
                    type: "GET",
                    url: "/unoistoie-acbat/public/this",
                    //EHLbug: how do I call the URL implicitly?
                    data: {selected_instcat_list:$("#instcat").val(), selected_stabbr_list:$("#stabbr").val(), selected_ccbasic_list:$("#ccbasic").val(), ccbasicyearid:$("#ccbasicyearid").val()},
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
            }

        });

        // When Carnegie is selected, the Carnegie Year is defaulted
        var previous;
        $("#ccbasic").on('focus', function () {
            previous = this.value;
        }).change(function() {
            if(this.value != -9 && $("#ccbasicyearid").val() == '') {
                $("#ccbasicyearid").prop("selectedIndex", 1);
            }
            previous = this.value;   // Update previous value to new value
        });        

        // Script for moving between Available Institutions and Selected Institutions
        $('#btnRight').click(function (e) {
            $('select').moveToListAndDelete('#lstBox1', '#lstBox2');
            e.preventDefault();
            updateSelCount();
        });
        $('#btnAllRight').click(function (e) {
            $('select').moveAllToListAndDelete('#lstBox1', '#lstBox2');
            e.preventDefault();
            updateSelCount();
        });
        $('#btnLeft').click(function (e) {
            $('select').moveToListAndDelete('#lstBox2', '#lstBox1');
            e.preventDefault();
            updateSelCount();
        });
        $('#btnAllLeft').click(function (e) {
            $('select').moveAllToListAndDelete('#lstBox2', '#lstBox1');
            e.preventDefault();
            updateSelCount();
        });

    });

    // Update the list counters
    function updateSelCount(){
        dyn_cnt = $('#lstBox1 option').size(); 
        $('#dynCounter').text("("+dyn_cnt+")");        

        sel_cnt = $('#lstBox2 option').size(); 
        $('#selCounter').text("("+sel_cnt+")");
    }

    //Selects all options in the "selected institutions" list so the user doesnt have to.
    function selectAll() { 
        selectBox = document.getElementById("lstBox2");
        for (var i = 0; i < selectBox.options.length; i++) { 
             selectBox.options[i].selected = true; 
        } 
    }


</script>
