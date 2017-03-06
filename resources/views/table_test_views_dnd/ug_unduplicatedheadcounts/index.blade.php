@extends('layouts.app')

@section('content')
    <h1>UG_UnduplicatedHeadCount</h1>

    <a href="{{url('/ug_unduplicatedheadcounts/create')}}" class="btn btn-success">Create UG_UnduplicatedHeadCount</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>UG_UndupHdcnt_ID</th>
            <th>School_ID</th>
            <th>Dgr_Lvl_Enrl</th>
            <th>Year</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($ug_unduplicatedheadcounts as $ug_unduplicatedheadcount)
            <tr>
                <td>{{ $ug_unduplicatedheadcount->UG_UndupHdcnt_ID}}</td>
                <td>{{ $ug_unduplicatedheadcount->School_ID}}</td>
                <td>{{ $ug_unduplicatedheadcount->Dgr_Lvl_Enrl}}</td>
                <td>{{ $ug_unduplicatedheadcount->Year}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['ug_unduplicatedheadcounts.destroy', $ug_unduplicatedheadcounts->UG_UndupHdcnt_ID]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection