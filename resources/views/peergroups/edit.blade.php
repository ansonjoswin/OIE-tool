@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">  

                            {!! Form::open(['route'=>'pg_delete_url', 'class'=>'form-horizontal', 'onsubmit'=>'return ConfirmDelete()']) !!}
                            {!! Form::hidden('pg_id', $peergroup->PeerGroupID, array('id'=>'pg_id', 'class'=>'btn btn-danger')) !!}
                            {!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['type'=>'submit', 'class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </div>
                        <div><h4>{{ $heading }}</h4></div>
                    </div>

                    <div class="panel-body">
                        {!! Form::model($peergroup, ['class' => 'form-horizontal', 'method' => 'PATCH', 'action' => ['PeerGroupsController@update', $peergroup->PeerGroupID]]) !!}
                        @include('common.errors')
                        @include('common.flash')

                        @include ('peergroups.partial', ['CRUD_Action' => 'Update'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function($) {
            $('select').select2();
        });

        function validateOnSave() {
            var rc = true;
            if ($("select#sb_id").val() === "") {
                alert("Please select a Type");
                rc = false;
            } else if ($("input#x_number").val() === "") {
                alert("Please input a X-number");
                rc = false;
            }
            return rc;
        }

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

