@extends('layouts.app')

@section('content')
    <h1>UG_CreditHours</h1>

    <a href="{{url('/ug_credithours/create')}}" class="btn btn-success">Create UG_CreditHours</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>UG_CreditHours_ID</th>
            <th>School_Id</th>
            <th>Year</th>
            <th>Twelve_Mnt_UG_credit_hrs</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($ug_credithours as $ug_credithour)
            <tr>
                <td>{{ $ug_credithour->UG_CreditHours_ID}}</td>
                <td>{{ $ug_credithour->School_Id}}</td>
                <td>{{ $ug_credithour->Year}}</td>
                <td>{{ $ug_credithour->Twelve_Mnt_UG_credit_hrs}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['ug_credithours.destroy', $ug_credithours->UG_CreditHours_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection