@extends('layouts.app')

@section('content')
    <h1>Private Profit</h1>

    <!--<a href="{{url('/admissions/create')}}" class="btn btn-success">Create Admission</a>-->
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>PrivateProf_ID</th>
            <th>Finance_ID</th>
            <th>TtlEquity</th>
            <th>TtlLiab_Equity</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($private_profs as $private_prof)
            <tr>School_Id
                <td>{{ $private_prof->PrivateProf_ID}}</td>
                <td>{{ $private_prof->Finance_ID}}</td>
                <td>{{ $private_prof->TtlEquity}}</td>
                <td>{{ $private_prof->TtlLiab_Equity}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['private_nprofs.destroy', $private_prof->PrivateProf_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection