@extends('layouts.app')
   
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> heading </div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'users', 'class' => 'form-horizontal']) !!}
                        @include('common.errors')
                        @include('common.flash')

                        <div class="form-group{{ $errors->has('schools') ? ' has-error' : '' }}">
                            {!! Form::label('institution', 'Institution:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6"> 
                                {!! Form::select('institutionList', $schools, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!} 
                                @if ($errors->has('School_Name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('School_Name') }}</strong>
                                    </span>
                                @endif
                                {{ Form::button('Add', array('class' => 'btn')) }}                            
                            </div>   
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

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