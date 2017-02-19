@extends('layouts.app')

@section('content')
    <h1>Customer</h1>

    <a href="{{url('/schools/create')}}" class="btn btn-success">Create School</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th> School ID</th>
            <th>School Name</th>
            <th>School City</th>
            <th>School State</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($schools as $school)
            <tr>
                <td>{{ $school->School_Id}}</td>
                <td>{{ $school->School_Name}}</td>
                <td>{{ $school->School_Address}}</td>
                <td>{{ $school->School_City}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['schools.destroy', $school->School_Id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection