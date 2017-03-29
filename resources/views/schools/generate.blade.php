@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'schools/generateSankey']) !!}
    <!-- Display Validation Errors -->
    @include('common.errors')
    @include('common.flash')

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <div class="form-group">
                    {!! Form::button('<i class="fa fa-btn fa-list"></i>Generate', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                </div>
            </div>
            <div><h3 style="text-align:center;">{{$heading}}</h3></div>
        </div>

        <div class="panel-body" style="padding-top: 0px; padding-bottom: 0px;">
            <table class="table planofstudy-table" style="margin-bottom: 0px;">
                <tbody>
                <tr>
                    <td><div class="form-group">
                            <div class="col-lg-2">{!! Form::label('select', 'Schools', ['class' => 'control-label']) !!}</div>
                            <div class="col-lg-6">{{ Form::select('schoollist[]', $list_schools, null, ['class' => 'col-md-6 form-control cds-select', 'multiple']) }}</div>
                        </div></td>
                </tr>
                <tr>
                    <td><div class="form-group">
                            <div class="col-lg-2">{!! Form::label('select', 'Term-Year', ['class' => 'control-label']) !!}</div>
                            <div class="col-lg-2">{{ Form::select('term_year', array('2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014', '2015' => '2015', '2016' => '2016'), null, ['placeholder' => 'Select Term-Year', 'class' => 'col-md-4 form-control cds-select']) }}</div>
                        </div></td>
                </tr>
                <tr>
                    <td><div class="form-group">
                            <div class="col-lg-2">{!! Form::label('select', 'Report Type', ['class' => 'control-label']) !!}</div>
                            <div class="col-lg-2">{{ Form::select('report_type', $vizType, null, ['placeholder' => 'Select Report Type', 'class' => 'col-md-4 form-control cds-select']) }}</div>
                        </div></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="data-viz-sankey">
            @include("sankeyDataViz")
        </div>
    </div>


    {!! Form::close() !!}
@stop
@section('footer')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

    <style>
        .table td { border: 0px !important; }
        .table td { padding: 2px !important; }
        .table th { padding: 2px !important; }
        div.col-lg-10 { padding: 2px !important; }
        .table td select { margin: 0px !important; }
        div.panel-body {padding: 5px !important; }
        a.dt-button { padding: 5px !important }
        .dataTables_wrapper .dt-buttons { float:none; text-align:center; }
        table.cds-datatable-report {margin-top: 25px !important;}

        div.dataviz { width: 1200px; height: 800px; font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; }

    </style>

    <script>
        $(document).ready(function($){
            $('#program').change(function(e){
                var program_id = e.target.value;
                $.get("{{ url('api/major-DropDownData')}}",
                    { option: $(this).val() },
                    function(data) {
                        $('#major').empty();
                        $.each(data, function(key, element) {
                            // alert("Hello! I am an alert box!!");
                            $('#major').append("<option value='" + key +"'>" + element + "</option>");
                        });
                    });
            });

            $('table.planofstudy-table select').select2();
            document.title = 'UNO Sankey Dataviz';
        });

    </script>
@stop