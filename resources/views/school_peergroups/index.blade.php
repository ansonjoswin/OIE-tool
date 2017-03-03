@extends('layouts.app')

@section('content')
    <h1>Customer</h1>

    <a href="{{url('/school_peergroups/create')}}" class="btn btn-success">Create SchoolPeerGroup</a>
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
        @foreach ($school_peergroups as $school_peergroups)
            <tr>
                <td>{{ $school_peergroups->School_Id}}</td>
                <td>{{ $school_peergroups->School_Name}}</td>
                <td>{{ $school_peergroups->School_Address}}</td>
                <td>{{ $school_peergroups->School_City}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['school_peergroups.destroy', $school_peergroups->SchoolPeerGroupID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection