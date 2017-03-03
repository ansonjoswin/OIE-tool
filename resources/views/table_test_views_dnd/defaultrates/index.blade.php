@extends('layouts.app')

@section('content')
    <h1>Customer</h1>

    <a href="{{url('/defaultrates/create')}}" class="btn btn-success">Create Defaultrate</a>
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
        @foreach ($defaultrates as $defaultrates)
            <tr>
                <td>{{ $defaultrates->School_Id}}</td>
                <td>{{ $defaultrates->School_Name}}</td>
                <td>{{ $defaultrates->School_Address}}</td>
                <td>{{ $defaultrates->School_City}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['defaultrates.destroy', $defaultrates->OPE_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection