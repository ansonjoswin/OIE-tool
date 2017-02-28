
<h1>Peer Groups</h1>

    <a href="{{url('/peergroups/create')}}" class="btn btn-success">Create PeerGroup</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Peer Group ID</th>
            <th>User ID</th>
            <th>Peer Group Name</th>
            <th>Private (0) or Public (1)</th>

        </tr>
        </thead>
        <tbody>
@foreach ($userpeergroups as $userpeergroups)
    <tr>
        <td>{{ $userpeergroups->PeerGroupID}}</td>
        <td>{{ $userpeergroups->User_ID}}</td>
        <td>{{ $userpeergroups->PeerGroupName}}</td>
        <td>{{ $userpeergroups->PriPubFlg}}</td>
        <td>
            {!! Form::open(['method' => 'DELETE', 'route'=>['peergroups.destroy', $peergroups->PeerGroupID]]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach

    </tbody>

    </table>