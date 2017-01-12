@extends('layouts.app')

@section('content')
    {!! Form::model($school) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">
                <a href="{{ URL::route('schools.index') }}" class="btn btn-info"><i class="fa fa-btn fa-backward"></i>Back</a>
            </div>
            <div class="pull-right">
                <form action="{{ url('schools/'.$school->school_id) }}" method="POST"  onsubmit="return ConfirmDelete();">{{ csrf_field() }}{{ method_field('DELETE') }}
                    <button type="submit" id="delete-school-{{ $school->school_id }}" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>Delete</button>
                </form>
            </div>
            <div class="pull-right">
                <a href="{{ URL::route('schools.edit', ['id' => $school->school_id, 'method' => 'GET']) }}" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i>Edit</a>
            </div>

            <div><h3>View School: {{ $school->school_name }}</h3></div>
        </div>

        @include ('schools.partial', ['CRUD_Action' => 'View'])
    </div>
    {!! Form::close() !!}
@stop
