
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
                @if(Auth::user()->can(['manage-users','manage-roles']))
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


<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container" style="border-top: 0px; padding-top: 0px; ">
    <p>&nbsp;</p>
    <div class="row style-select" style="border-top: 0px; padding-top: 0px">
        <div class="col-md-8">
            <div class=" row">
                <div class="col-md-3" align="right">
                    {{ Form::label('instcat_lbl', 'Institution Category: ') }}
                </div>
                <div class="col-md-7" align="right">
                @if(sizeof($selected_instcat_list) == 0)
                    {{ Form::select('instcat', $instcat_list, ['id' => 'instcat', 'class'=>'col-md-12 form-control']) }}
                @else
                    {{ Form::select('instcat', $instcat_list, $selected_instcat_list, ['id' => 'instcat', 'class'=>'col-md-12 form-control']) }}
                @endif
                </div>
            </div>
            <div class="row margin-gap">
                <div class="col-md-3" align="right">
                    {{ Form::label('cc_lbl', 'Carnegie Classification: ', ['data-toggle'=>'tooltip','title'=>'Carnegie Classification 2010 Basic']) }}
                </div>
                <div class="col-md-7">
                @if(sizeof($selected_ccbasic_list) == 0)
                    {{ Form::select('ccbasic', $ccbasic_list, ['id'=>'ccbasic', 'class'=>'col-md-12 form-control']) }}
                @else
                    {{ Form::select('ccbasic', $ccbasic_list, '-9', ['id'=>'ccbasic', 'class'=>'col-md-12 form-control']) }}
                @endif
                </div>            
            </div>
            <div class="row margin-gap">
                <div class="col-md-3" align="right">
                    {{ Form::label('yr_lbl', 'Carnegie Year: ', ['data-toggle'=>'tooltip','title'=>'Carnegie Classification 2010 Basic Year']) }}
                </div>
                <div class="col-md-2">
                @if(sizeof($selected_ccbasic_list) == 0)
                    {{ Form::select('ccbasicyearid', array(null=>'All') + $ccbasicyearid, ['id'=>'ccbasicyearid', 'class'=>'col-md-4 form-control']) }}
                @else
                    {{ Form::select('ccbasicyearid', array(null=>'All') + $ccbasicyearid, null, ['id'=>'ccbasicyearid', 'class'=>'col-md-4 form-control']) }}
                @endif
                </div>
            </div>
            <div class="row margin-gap">
                <div class="col-md-3" align="right">
                    {{ Form::label('stabbr_lbl', 'Institution State: ') }}
                </div>
                <div class="col-md-3">
                @if(sizeof($selected_stabbr_list) == 0)
                    {{ Form::select('stabbr', $stabbr_list, ['id'=>'stabbr', 'class'=>'col-md-6 form-control']) }}
                @else
                    {{ Form::select('stabbr', $stabbr_list, $selected_stabbr_list, ['id'=>'stabbr', 'class'=>'col-md-6 form-control']) }}
                @endif
                </div>
            </div>
            <div class="row margin-gap" style="padding-top: 2px;">
                <div class="col-md-8" align="center">
                {{ Form::button('<i class="fa fa-btn fa-filter"></i>Filter', array('class'=>'btn btn-primary', 'id'=>'btnFilter', 'disabled'=>'disabled')) }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br/>


<div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="subject-info-box-1">
                <label>Available Institutions 
                    <label id="dynCounter">
                        @if(isset($school_ids)) 
                            ({{count($school_ids)}}) 
                        @else  
                            (0) 
                        @endif
                    </label> 
                </label>
                <select multiple class="form-control" id="lstBox1">
                    @if(isset($school_ids))
                    @foreach($school_ids as $key => $value)
                        <option value="{{ $key }}">{{ $value}} </option>
                    @endforeach
                    @endif
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
        <div class="col-md-6 col-md-offset-3" align="center">
            <!-- {{ Form::button('Cancel', ['class'=>'btn btn-close']) }} -->
            <button type="button" class="btn btn-close" onclick="window.location='{{ URL::route('peergroups.index') }}'">Cancel</button>
            @if($CRUD_Action == 'Create')
                <?php 
                // $attr = ['type'=>'submit', 'class'=>'btn btn-primary', 'id'=>'submit_btn', 'onClick'=>'selectAll()', 'data-toggle'=>'modal', 'data-target'=>'#loadingModal', 'disabled'=>'disabled', 'onsubmit' => 'return validateOnSave();']
                $attr = ['type'=>'submit', 'class'=>'btn btn-primary', 'id'=>'submit_btn', 'onClick'=>'selectAll()', 'disabled'=>'disabled']
                ?>
            @else
                <?php 
                $attr = ['type'=>'submit', 'class'=>'btn btn-primary', 'id'=>'submit_btn', 'onClick'=>'selectAll()']
                ?>                
            @endif
            {!! Form::button('<i class="fa fa-btn fa-save"></i>Save', $attr) !!}
            <br/><br/>
        
        </div>
    </div>
</div>

<!-- Modal -->
<div id="savingModal" class="modal">
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

    $(document).ready(function($){

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
                $.ajax({
                    type: "GET",
                    url: "/unoistoie-acbat/public/this",
                    //EHLbug: how do I call the URL implicitly?
                    data: {selected_instcat_list:$("#instcat").val(), selected_stabbr_list:$("#stabbr").val(), selected_ccbasic_list:$("#ccbasic").val(), ccbasicyearid:$("#ccbasicyearid").val()},
                    success: function(data) {
                        $('#lstBox1').empty();
                        $('#dynCounter').empty();
                        var sort_data = sortObject(data);
                        $.each(sort_data, function( key, value ) {
                          $('#lstBox1').append("<option value='" + value.id +"'>" + value.name + "</option>");
                          dyn_cnt++; 
                        });
                        $('#dynCounter').text("("+dyn_cnt+")");
                    }
                });
            }
        });

        // Enable filter button when a filter is selected
        $("#instcat").on('change', function () {
            toggleFilterBtn();
        }); 
        $("#ccbasic").on('change', function () {
            toggleFilterBtn();
        }); 
        $("#ccbasicyearid").on('change', function () {
            toggleFilterBtn();
        }); 
        $("#stabbr").on('change', function () {
            toggleFilterBtn();
        });                    
        // Helper function to enable/disable filter button
        function toggleFilterBtn(){
            if( $("#instcat").val() == 0 && $("#ccbasic").val() == -9 && $("#ccbasicyearid").val() == 0 && $("#stabbr").val() == 0){
                $("#btnFilter").attr("disabled", true);  //Disable the filter button
            }else{
                $("#btnFilter").removeAttr("disabled");  //Enable the filter button
            }            
        }

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

        // Moving between Available Institutions and Selected Institutions
        var maxSchoolSize = 1000;
        $('#btnRight').click(function (e) {
            var sel_sch_size = $("#lstBox1 :selected").length + $("#lstBox2 option").size();
            if(sel_sch_size > maxSchoolSize){
                alert("Maximum number of schools is " + maxSchoolSize+ ".")
            }else{
                $('select').moveToListAndDelete('#lstBox1', '#lstBox2');
                e.preventDefault();
                updateSelCount();  
                $("#submit_btn").removeAttr("disabled");  //Enable the save button   
            }

        });
        $('#btnAllRight').click(function (e) {     
            var sel_sch_size = $("#lstBox1 option").size() + $("#lstBox2 option").size();
            if(sel_sch_size > maxSchoolSize){
                alert("Maximum number of schools is " + maxSchoolSize+ ".")
            }else{             
                $('select').moveAllToListAndDelete('#lstBox1', '#lstBox2');
                e.preventDefault();
                updateSelCount();
                $("#submit_btn").removeAttr("disabled");  //Enable the save button
            }
        });
        $('#btnLeft').click(function (e) {
            $('select').moveToListAndDelete('#lstBox2', '#lstBox1');
            e.preventDefault();
            updateSelCount();
            if($("#lstBox2 option").size() == 0){
                $("#submit_btn").attr("disabled", true);  //Disable the filter button
            }
        });
        $('#btnAllLeft').click(function (e) {
            $('select').moveAllToListAndDelete('#lstBox2', '#lstBox1');
            e.preventDefault();
            updateSelCount();
            $("#submit_btn").attr("disabled", true);  //Disable the filter button
        });

    });

    // Update the list counters
    var sel_cnt = 0;
    function updateSelCount(){
        dyn_cnt = $('#lstBox1 option').size(); 
        $('#dynCounter').text("("+dyn_cnt+")");        

        sel_cnt = $('#lstBox2 option').size(); 
        $('#selCounter').text("("+sel_cnt+")");
    }

    // Selects all options in the "selected institutions" list so the user doesnt have to.
    function selectAll() { 
        selectBox = document.getElementById("lstBox2");
        for (var i = 0; i < selectBox.options.length; i++) { 
             selectBox.options[i].selected = true; 
        } 
    }

    // Sorts the institutions
    function sortObject(obj) {
        var arr = [];
        var prop;
        for (prop in obj) {
            if (obj.hasOwnProperty(prop)) {
                arr.push({
                    'id': prop,
                    'name': obj[prop]
                });
            }
        }
        arr.sort(function(a, b){
            var x = a.name.toLowerCase();
            var y = b.name.toLowerCase();
            if (x < y) {return -1;}
            if (x > y) {return 1;}
            return 0;
        });
        return arr; // returns array
    }
      

</script>
