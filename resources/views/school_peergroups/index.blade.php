@extends('layouts.app')

@section('content')
    <h1>Peer Group Institution List</h1>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>School ID</th>
            <th>School Name</th>
            <th>School State</th>
            <th>Institution Category</th>
            <th>Carnegie Classification</th>
        </tr>
        </thead>

        <tbody>
        {{--@foreach ($school_peergroups as $school_peergroups)--}}
            {{--<tr>--}}
                {{--<td>{{ $school_peergroups->School_Id}}</td>--}}
                {{--EHLbug: fix these calls to schools table attributes - not sure how to do it right now--}}
                {{--<td>{{ $school_peergroups->$schools->School_Name}}</td>--}}
                {{--<td>{{ $school_peergroups->$schools->School_State}}</td>--}}
                {{--<td>{{ $school_peergroups->$schools->Inst_Catgry}}</td>--}}
                {{--<td>{{ $school_peergroups->$schools->$carnegie_classifications->Cng_2000}}</td>--}}
                {{--<td>--}}
                    {{--{!! Form::open(['method' => 'DELETE', 'route'=>['school_peergroups.destroy', $school_peergroups->SchoolPeerGroupID]]) !!}--}}
                    {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                    {{--{!! Form::close() !!}--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}

        </tbody>

    </table>
@endsection