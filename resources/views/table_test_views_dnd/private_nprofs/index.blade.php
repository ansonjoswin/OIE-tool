@extends('layouts.app')

@section('content')
    <h1>Private Non-Profit</h1>

    <!--<a href="{{url('/admissions/create')}}" class="btn btn-success">Create Admission</a>-->
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>PrivateNProf_ID</th>
            <th>Finance_ID</th>
            <th>TtlUnRestAss</th>
            <th>TtlRestAss</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($private_nprofs as $private_nprof)
            <tr>School_Id
                <td>{{ $private_nprof->PrivateNProf_ID}}</td>
                <td>{{ $private_nprof->Finance_ID}}</td>
                <td>{{ $private_nprof->TtlUnRestAss}}</td>
                <td>{{ $private_nprof->TtlRestAss}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['private_nprofs.destroy', $private_nprof->PrivateNProf_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection