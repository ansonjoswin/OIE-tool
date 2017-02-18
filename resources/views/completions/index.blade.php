@extends('layouts.app')
@section('content')
    <h1>Customer</h1>

    <a href="{{url('/completions/create')}}" class="btn btn-success">Create Completion</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Completion ID</th>
            <th>Major Number</th>
            <th>Award Level</th>
            <th>Grand Total</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($completions as $completion)
            <tr>
                <td>{{ $completion->Completions_ID}}</td>
                <td>{{ $completion->MajNum}}</td>
                <td>{{ $completion->AwardLvl}}</td>
                <td>{{ $completion->GrandTtl}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['completions.destroy', $completion->Completions_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection
