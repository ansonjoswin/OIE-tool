
@extends('layouts.app')

<style>

svg:not(:root) {
    overflow: visible !important;
}

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.dot {
  stroke: #000;
}

.tooltip {
  position: absolute;
  width: 200px;
  height: 28px;
  pointer-events: none;
}

.panel-body {
    font: 11px sans-serif;
    margin-bottom: 25px;
}
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div><h4>Data Visualization</h4></div>
                    </div>                   

                    <div class="panel-body">
                        {!! Form::open(['url'=>'/datarefresh', 'class'=>'form-horizontal']) !!}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel-body">
                                    <div class="col-md-4">
                                    @if(isset($sel_pgid))
                                        {!! Form::select('sel_pgid', [''=>'Select Peer Group'] + $peerGroups, $sel_pgid, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_pgid', [''=>'Select Peer Group'] + $peerGroups, null, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @endif
                                    </div>
                                    <div class="col-md-2">
                                    @if(isset($sel_year))
                                        {!! Form::select('sel_year', [''=>'Select Year', '2012'=>'2012','2013'=>'2013','2014'=>'2014'], $sel_year, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_year', [''=>'Select Year', '2012'=>'2012','2013'=>'2013','2014'=>'2014'], null, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @endif
                                    </div>
                                    <div class="col-md-2">
                                    @if(isset($sel_xaxis))
                                        {!! Form::select('sel_xaxis', $xaxis_options, $sel_xaxis, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_xaxis', $xaxis_options, null, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @endif                                    
                                    </div>
                                    <div class="col-md-2">
                                    @if(isset($sel_yaxis))
                                        {!! Form::select('sel_yaxis', $yaxis_options, $sel_yaxis, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_yaxis', $yaxis_options, null, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @endif                                    
                                    </div>                                    
                                    <div class="col-md-2">
                                    {!! Form::button('<i class="fa fa-btn"></i>Refresh', ['type' => 'submit', 'class' => 'btn btn-primary']) !!} 
                                    </div> 
                                </div>                    
                            </div>
                        </div>
                        <div class="row">               
                            <div class="col-md-10 col-md-offset-1">
                                @include('common.flash')
                                <div id="chart">  </div>                        
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>         
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script>
var test_data = <?php echo json_encode($test_data, JSON_HEX_TAG); ?>; 
</script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="../public/js/data_visual.js"></script>
@endsection