@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                          <h4>{{ $heading }}</h4>
                          <div class="row">
                            <div class="col-md-10">
                              <div class="panel-default"> 
                                    <div>
                                    {!! Form::button('<i class="fa fa-btn fa-save"></i>Save As', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}

                                    {!! Form::open(['route'=>'school_peergroup_indv_add_url', 'class'=>'form-horizontal']) !!}
                                    {!! Form::button('<i class="fa fa-btn fa-plus"></i>Add', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
                                    {!! Form::close() !!}

                                    {!! Form::button('<i class="fa fa-btn fa-plus"></i>Add via Modal', ['type'=>'post', 'class'=>'btn btn-primary', 'data-toggle'=>'modal', 'data-target'=>'.demo_popup' ]) !!}  
                                    </div>
                              </div>
                            </div>                             
                            <div class="col-md-2 pull-right">
                              <div class="panel-default pull-right">
                                    <form action="{{ url('users/create') }}" method="GET">{{ csrf_field() }}
                                        <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-forward"></i>Next</button>
                                    </form> 
                              </div>
                            </div> 
                          </div>                 
                    </div>                

                     <div class="panel-body">
                        {!! Form::open(['url' => 'tbd_NEXT', 'class' => 'form-horizontal']) !!}
                        @include('common.errors')
                        @include('common.flash')
                        @include ('school_peergroups.individual.partial', ['CRUD_Action' => 'Create'])
                        {!! Form::close() !!}
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection



<div class="modal fade demo_popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
        <h3 class="modal-title">Select your institutions by name.</h3>
    </div>
    <div class="modal-body">


                {!! Form::open(array('route'=>'school_peergroup_index_url', 'class'=>'form')) !!}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('school_peergroups') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                              {!! Form::label('institution_label', 'Institution:', ['class' => 'col-md-4 control-label']) !!}
                            </div>
                            <div class="col-md-6"> 
                                {!! Form::select('institutionList[]', $school_peergroups, null, ['class'=>'form-control cds-select', 'multiple', 'required'=>'required']) !!}                         

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
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal-->