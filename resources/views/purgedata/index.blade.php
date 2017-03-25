@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div><h4>Purge Data</h4></div>
                </div>               
                <div class="panel-body">
                            {!! Form::open(['route'=>'pg_delete_url', 'class'=>'form-horizontal', 'onsubmit'=>'return ConfirmDelete()']) !!}
                        	<div id="stopUploadsMsg" class="alert alert-danger">
                            	<p align="center">Use caution when purging data.</p>
                            </div>
                            <br>
                            <div class="text-center row">
                            	<div class="form-group col-xs-2 col-xs-offset-2">
                                    {!! Form::select('sel_year', $avail_years, null, ['class'=>'form-control', 'required'=>'required']) !!}
                               	</div>
                            	<div class="form-group col-xs-3">
                                    <!--If this list of files ever changes, the list also needs to change in the PurgeData page also! -->
	                                <select id="sel_filetype" name="sel_filetype" class="form-control">
	                                   <option value="default">-- Select File Type --</option>
	                                   <option value="admissions">Admissions</option>
	                                   <option value="fallenrollment">FallEnrollment</option>
	                                   <option value="employees">Employees</option>
	                                   <option value="defaultrates">DefaultRates</option>
	                                   <option value="graduations">Graduations</option>
	                                   <option value="instructionalstaff">InstructionalStaff</option>
	                                   <option value="noninstructionalstaff">NonInstructionalStaff</option>
	                                   <option value="completions">Completions</option>
	                                   <option value="ugcredithours">UGCredithours</option>
	                                   <option value="ugunduplicatedheadcount">UGUnduplicatedHeadcount</option>
	                                   <option value="privateprofit">PrivateProfit</option>
	                                   <option value="privatenonprofit">PrivateNonProfit</option>
	                                   <option value="public">Public</option>
	                                </select>
	                            </div>
	                            <div class="form-group col-xs-1">
                                    <button type="submit" id="purge_btn" class="btn btn-danger" disabled="true"><i class="fa fa-btn fa-trash-o"></i>Purge</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                    </form> 
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('footer')
<script>

        $("#sel_filetype").change(function() {
            if(this.value != '') {
                $('#purge_btn').prop('disabled', false);
            }
        });           

</script>
@endsection