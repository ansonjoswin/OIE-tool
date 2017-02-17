@extends('layouts.app')

@section('content')
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>ID</th>
            <th>Queue</th>
            <th>Payload</th>
            <th>Attempts</th>
            <th>Reserved At</th>
            <th>Available At</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>
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
    </script>
@endsection

