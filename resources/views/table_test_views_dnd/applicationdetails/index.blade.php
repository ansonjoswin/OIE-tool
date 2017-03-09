@extends('layouts.app')


@section('content')
    <h1>ApplicationDetail</h1>

    <a href="{{url('/applicationdetails/create')}}" class="btn btn-success">Create Application</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Application_ID</th>
            <th>SecSchGPA</th>
            <th>SecSchRank</th>
            <th>SecSchRec</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($applicationdetails as $applicationdetail)
            <tr>
                <td>{{ $applicationdetail->Application_ID}}</td>
                <td>{{ $applicationdetail->SecSchGPA}}</td>
                <td>{{ $applicationdetail->SecSchRank}}</td>
                <td>{{ $applicationdetail->SecSchRec}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['applicationdetails.destroy', $applicationdetail->Application_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection