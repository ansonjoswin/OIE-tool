@extends('layouts.app')

@section('content')
    <h1>Finance</h1>

    <!--<a href="{{url('/admissions/create')}}" class="btn btn-success">Create Admission</a>-->
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Finance_ID</th>
            <th>year</th>
            <th>School_Id</th>
            <th>Sector_Flag</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($finances as $finance)
            <tr>School_Id
                <td>{{ $finance->Finance_ID}}</td>
                <td>{{ $finance->year}}</td>
                <td>{{ $finance->School_Id}}</td>
                <td>{{ $finance->Sector_Flag}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['finances.destroy', $finance->Finance_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection