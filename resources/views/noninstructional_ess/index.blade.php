@extends('layouts.app')
@section('content')
    <h1>Customer</h1>

    <a href="{{url('/noninstructional_ess/create')}}" class="btn btn-success">Create NonInstructional_ES</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>NonInstructionalES id</th>
            <th>Full-time non-instructional staff - number</th>
            <th>Full-time non-instructional staff - outlays</th>
            <th>Research - number</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($noninstructional_ess as $noninstructional_es)
            <tr>
                <td>{{ $noninstructional_es->NonInstructionalES_id}}</td>
                <td>{{ $noninstructional_es->FT_NIns_StNum}}</td>
                <td>{{ $noninstructional_es->FT_NIns_StOutlays}}</td>
                <td>{{ $noninstructional_es->ResNum}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['noninstructional_ess.destroy', $noninstructional_es->NonInstructionalES_id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection