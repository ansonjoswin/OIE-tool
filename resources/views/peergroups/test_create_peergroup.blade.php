@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['url'=>'/peergroups/store', 'class'=>'form-horizontal']) !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                          <div><h4>test Peer Group</h4></div>
                          {!! Form::text('peergroup_name', null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!} 
                    </div>
                    <div class="panel-body">                           
                        {{-- {!! Form::select('schoolsIDs[]', $schools, null, ['class' => 'col-md-2 form-control cds-select', 'required'=>'required', 'multiple']) !!} 
                        {{Form::select('schoolsIDs',$schools,null,array('multiple'=>'multiple','name'=>'schoolsIDs[]'))}}
                        
                        --}}
                        <select multiple="multiple" name="schoolsIDs[]" id="schoolsIDs">
                        @foreach($schools as $school)
                                <option value="{{$school}}">{{$school}}</option>
                        @endforeach
                        </select>
                         <select name="PriPubFlag" id="PriPubFlag" >
                                <option value="private" selected="selected">Private</option>
                                <option value="public">Public</option>
                        </select>                      
                        {!! Form::button('<i class="fa fa-btn fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!} 
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection