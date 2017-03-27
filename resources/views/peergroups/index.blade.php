@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            {{--<!-- <form action="{{ url('peergroups/create') }}" method="POST">{{ csrf_field() }} -->--}}
                            <form action="{{ url('peergroups/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-peergroup" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                            </form>
                        </div>
                        <div><h4>{{ $heading }}</h4></div>
                    </div>   
                     <div class="panel-body" onload="OnloadFunc();"> 
                        @include('common.flash')
                        @if (count($peergroups) > 0)
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped cds-datatable">
                                    <thead> <!-- Table Headings -->
                                    <th>Peer Group Name</th>
                                    @if(Auth::user()->can(['manage-users','manage-roles']))
                                    <th>Created By</th>
                                    @endif
                                    <th>Created Date</th>
                                    <th>Private/Public?</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody> <!-- Table Body -->
                                    @foreach ($peergroups as $peergroup)
                                        <tr>
                                            <td class="table-text"><div><a href="{{ url('/peergroups/'.$peergroup->peergroup_id.'/edit') }}">{{ $peergroup->peergroup_name }}</a> </div></td>
                                            {{--<td class="table-text"><div>{{ $peergroup->PeerGroupName}}</div></td>--}}

                                            @if(Auth::user()->can(['manage-users','manage-roles']))
                                            <td class="table-text"><div>{{ $peergroup->created_by}}</div></td>
                                            @endif
                                            <td class="table-text"><div>{{ $peergroup->created_at->format('m/d/Y')}}</div></td>
                                            <td class="table-text"><div>{{ $peergroup->private_public_flag}}</div></td>
                                            <td>
                                                {!! Form::open(['route'=>'pg_delete_url', 'class'=>'form-horizontal', 'onsubmit'=>'return ConfirmDelete()']) !!}
                                                {!! Form::hidden('pg_id', $peergroup->peergroup_id, array('id'=>'pg_id', 'class'=>'btn btn-danger')) !!}
                                                {!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['type'=>'submit', 'class'=>'btn btn-danger']) !!}                                      
                                                {!! Form::close() !!}
                                            </td>                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="panel-body"><h4>Please create a peer group!</h4></div>
                        @endif
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <style>
        .table td { border: 0px !important; }
        .tooltip-inner { white-space:pre-wrap; max-width: 400px; }
    </style>

    <script>
        $(document).ready(function() {
            $('table.cds-datatable').on( 'draw.dt', function () {
                $('tr').tooltip({html: true, placement: 'auto' });
            } );

            $('tr').tooltip({html: true, placement: 'auto' });
        } );

        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete?");

            if (x) {
                return true;
            } else {
                return false;
            }
        }        

    </script>
@endsection


