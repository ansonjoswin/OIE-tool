@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <!--
                            <form action="{{ url('school_peergroups/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-peergroup" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                            </form>
                            -->
                                {!! Form::button('<i class="fa fa-btn fa-primary"></i>Create', ['type'=>'post', 'class'=>'btn btn-primary', 'data-toggle'=>'modal', 'data-target'=>'.demo_popup' ]) !!}                             
                        </div>
                        <div><h4>{{ $heading }}</h4></div>
                    </div>   

                     <div class="panel-body">
                        @include('common.flash')
                        @if (count($peergroups) > 0)
                            <a href="{{url('/peergroups/create')}}" class="btn btn-success">Create PeerGroup</a>
                            <hr>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr class="bg-info">
                                    <th> School ID</th>
                                    <th>School Name</th>
                                    <th>School City</th>
                                    <th>School State</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($peergroups as $peergroups)
                                    <tr>
                                        <td>{{ $peergroups->School_Id}}</td>
                                        <td>{{ $peergroups->School_Name}}</td>
                                        <td>{{ $peergroups->School_Address}}</td>
                                        <td>{{ $peergroups->School_City}}</td>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE', 'route'=>['peergroups.destroy', $peergroups->PeerGroupID]]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>     

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped ">
                                    <thead> <!-- Table Headings -->
                                    <th> </th>
                                    <th>Institution Name</th>
                                    <th> </th>
                                    </thead>
                                    <tbody> <!-- Table Body -->
                                    {{-- @foreach ($peergroups as $peergroup)
                                        <tr>
                                            <td class="table-text"><div>{{ $peergroups->School_Id}}</div></td>
                                            <td class="table-text"><div>{{ $peergroups->School_Name}}</div></td>
                                        </tr>
                                    @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="panel-body"><h4>No Peer Group Found</h4></div>
                        @endif
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection



<div class="modal fade demo_popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
        <h3 class="modal-title">What kind of Peer Group do you want to create?</h3>
    </div>
    <div class="modal-body">
        <p>First, you'll need to select what institutions you want to compare.</p>
        <p>How do you want to select your institutions?</p>
        <table>
            <tr>
            <td> 
                <div class="panel-body">   
                {!! Form::open(array('url'=>'school_peergroups/individual/create', 'class'=>'form')) !!}
                    <button type="submit" id="create-peergroup" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>By Specific Institution</button>
                {!! Form::close() !!}
                </div>
             </td>
             <td>
                <div class="panel-body"> 
                <button type="submit" disabled="disabled" id="create-peergroup" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>By Institution Attributes</button>
                </div>
             </td>
             </tr>
         </table>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal-->
