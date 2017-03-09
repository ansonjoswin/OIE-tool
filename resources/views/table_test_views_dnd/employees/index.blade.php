@extends('layouts.app')
@section('content')
    <h1>Customer</h1>

    <a href="{{url('/employees/create')}}" class="btn btn-success">Create Employee</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Employee ID</th>
            <th>Occupation full time and part time</th>
            <th>full time or part time status</th>
            <th>Occupation Category</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->E_ID}}</td>
                <td>{{ $employee->Occup_FullTime_and_PartTime}}</td>
                <td>{{ $employee->FullTime_or_PartTime_status}}</td>
                <td>{{ $employee->Occup_Catgry}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['employees.destroy', $employee->E_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection
