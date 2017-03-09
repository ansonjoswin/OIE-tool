@extends('layouts.app')

@section('content')
    <h1>Public</h1>

    <!--<a href="{{url('/admissions/create')}}" class="btn btn-success">Create Admission</a>-->
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Public_ID</th>
            <th>Finance_ID</th>
            <th>TtlCurntAsst</th>
            <th>Dep_CapAsst_NetDep</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($publicfs as $publicf)
            <tr>School_Id
                <td>{{ $publicf->Public_ID}}</td>
                <td>{{ $publicf->Finance_ID}}</td>
                <td>{{ $publicf->TtlCurntAsst}}</td>
                <td>{{ $publicf->Dep_CapAsst_NetDep}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['publicfs.destroy', $publicf->Public_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection