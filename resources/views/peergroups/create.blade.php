@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"> <h4>{{ $heading }}</h4></div>

                    <div class="panel-body" style="padding-bottom: 0px;">
                        {!! Form::open(['url'=>'peergroups', 'class'=>'form-horizontal', 'id'=>'pg_form', 'onsubmit'=>'return validateOnSave();']) !!}
                        @include('common.errors')
                        @include('common.flash')

                        @include ('peergroups.partial', ['CRUD_Action' => 'Create'])
                        {!! Form::close() !!}
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



        function validateOnSave() {
            var rc = true;
            if ($("#peergroup_name").val() === "") {
                rc = false;
            }else{
                $("#savingModal").modal();
            }
            return rc;
        }



    </script>
@endsection