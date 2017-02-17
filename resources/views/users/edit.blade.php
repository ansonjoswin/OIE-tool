@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">  
                            @if($user->id != Auth::user()->id && $user->id != 1)
                            <form action="{{ url('users/'.$user->id) }}" method="POST" onsubmit="return ConfirmDelete();">
                                {{ csrf_field() }}{{ method_field('DELETE') }}
                                <button type="submit" id="delete-user-{{ $user->id}}" class="btn btn-default  btn-danger"><i class="fa fa-btn fa-trash"></i>Delete</button>
                            </form>                       
                            @endif
                        </div>
                        <div><h4>{{ $heading }}</h4></div>
                    </div>

                    <div class="panel-body">
                        {!! Form::model($user, ['class' => 'form-horizontal', 'method' => 'PATCH', 'action' => ['UsersController@update', $user->id]]) !!}
                        @include('common.errors')
                        @include('common.flash')

                        @include ('users.partial', ['CRUD_Action' => 'Update'])
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

