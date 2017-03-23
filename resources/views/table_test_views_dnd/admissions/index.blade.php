@extends('layouts.app')

@section('content')
    <h1>Admission</h1>

    <!--<a href="{{url('/admissions/create')}}" class="btn btn-success">Create Admission</a>-->
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Admission_ID</th>
            <th>year</th>
            <th>School_Id</th>
            <th>Ttl_Apl</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($admissions as $admission)
            <tr>School_Id
                <td>{{ $admission->Admission_ID}}</td>
                <td>{{ $admission->year}}</td>
                <td>{{ $admission->School_Id}}</td>
                <td>{{ $admission->Ttl_Apl}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['admissions.destroy', $admission->Admission_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection