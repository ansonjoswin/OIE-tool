@extends('layouts.app')
@section('content')
    <h1>Customer</h1>

    <a href="{{url('/instructional_ess/create')}}" class="btn btn-success">Create Instructional_ES</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>InstructionalES id</th>
            <th>Academic rank</th>
            <th>Contract duration total</th>
            <th>Contract duration men</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($instructional_ess as $instructional_es)
            <tr>
                <td>{{ $instructional_es->InstructionalES_id}}</td>
                <td>{{ $instructional_es->Acad_Rank}}</td>
                <td>{{ $instructional_es->Crt_Dur_Ttl}}</td>
                <td>{{ $instructional_es->Crt_Dur_M}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['instructional_ess.destroy', $instructional_es->InstructionalES_id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection
