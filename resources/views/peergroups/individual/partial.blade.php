@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {!! Form::open(array('route'=>'pg_index_url', 'class'=>'form')) !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                          <h4>{{ $heading }}</h4>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="panel-default pull-left"> </div>
                            </div>                             
                            <div class="col-md-8 pull-right">
                              <div class="panel-default pull-right">
                              {!! Form::button('<i class="fa fa-btn fa-forward"></i>Next', ['type' => 'submit', 'class' => 'btn btn-primary']) !!} 
                              </div>
                            </div> 
                          </div>                 
                    </div>
                    <div class="panel-body">
                        @include('common.errors')
                        @include('common.flash')
                        <div class="form-group{{ $errors->has('schools') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                              {!! Form::label('institution_label', 'Institution:', ['class' => 'col-md-4 control-label']) !!}
                            </div>
                            <div class="col-md-6"> 
                                {!! Form::select('institutionList[]', $schools, null, ['class'=>'form-control cds-select', 'multiple', 'required'=>'required']) !!}                         

                                @if ($errors->has('School_Name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('School_Name') }}</strong>
                                    </span>
                                @endif                     
                            </div>                              
                        </div>            
                    </div>
                </div>
                {!! Form::close() !!}
                
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script>
        $(document).ready(function($) {
            $('select').select2();
        });

        function validateOnSave() {
            var rc = true;
            if ($("select#sb_id").val() === "") {
                alert("Please select a Type");
                rc = false;
            } else if ($("input#x_number").val() === "") {
                alert("Please input a X-number");
                rc = false;
            }
            return rc;
        }

    </script>

@endsection

