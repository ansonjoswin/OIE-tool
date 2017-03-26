@extends('layouts.app')


 <html>   <link rel='stylesheet' href='style.css'> </html>
    <!-- CSS (Styling) -->
    <style type="text/css">
            /* Format X and Y Axis */
.axis text {
  font: 10px sans-serif;
}

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.bar {
  fill: steelblue;
  fill-opacity: .9;
}

.bar:hover {
  fill: orange;
}

label {
  position: absolute;
  top: 10px;
  right: 10px;
}

#chart {
  float: left;
}
.typeahead-section {
  margin-top: 40px;
}
    </style>
    <!-- End CSS (Styling) -->
 

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
                                        {!! Form::select('sel_year', array(null=>'Select Year') + $avail_years, $sel_year, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_year', array(null=>'Select Year') + $avail_years, null, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @endif                                    
                                    </div>
                                     <div class="col-md-2">
                                    @if(isset($sel_xaxis))
                                        {!! Form::select('sel_xaxis', $xaxis_options, $sel_xaxis, ['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::select('sel_xaxis', $xaxis_options, null, ['class'=>'form-control']) !!}
                                    @endif                                    
                                    </div>
                                    <div class="col-md-2">
                                    @if(isset($sel_yaxis))
                                        {!! Form::select('sel_yaxis', $yaxis_options, $sel_yaxis, ['class'=>'form-control']) !!}
                                    @else
                                        {!! Form::select('sel_yaxis', $yaxis_options, null, ['class'=>'form-control']) !!}
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
 var sel_xaxis = <?php echo json_encode($sel_xaxis, JSON_HEX_TAG); ?>; 
  var sel_yaxis = <?php echo json_encode($sel_yaxis, JSON_HEX_TAG); ?>; 
</script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="../public/js/testvisual.js"></script>

@endsection