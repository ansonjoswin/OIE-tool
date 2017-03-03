@extends('layouts.app')
@section('content')
    <h1>Customer</h1>

    <a href="{{url('/graduations/create')}}" class="btn btn-success">Create Graduation</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Graduation ID</th>
            <th>Revised Bachelor's Degree seeking cohort</th>
            <th>Exclusions from Bachelor's degree</th>
            <th>Adjusted Bachelor's degree</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($graduations as $graduation)
            <tr>
                <td>{{ $graduation->Graduation_ID}}</td>
                <td>{{ $graduation->Rev_BacDgr_CH2006}}</td>
                <td>{{ $graduation->Exl_BacDgr150}}</td>
                <td>{{ $graduation->Adj_BacDgr150}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['graduations.destroy', $graduation->Graduation_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection
