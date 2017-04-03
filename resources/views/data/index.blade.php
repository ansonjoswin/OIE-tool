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

.margin-gap {
  margin: 10px 0;
}
    </style>
    <!-- End CSS (Styling) -->
 

   @section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div><h4>Data Visualization</h4></div>
                    </div>                   
                    <div class="panel-body">
                       
                        <div>
                            <div class="col-md-3">
                                <div class="panel-body">
                                 {!! Form::open(['url'=>'/datarefresh', 'class'=>'form-horizontal']) !!}
                                    <div class="col-md-12">
                                    @if(isset($sel_pgid))
                                        {!! Form::select('sel_pgid', [''=>'Select Peer Group'] + $peerGroups, $sel_pgid, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_pgid', [''=>'Select Peer Group'] + $peerGroups, null, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}
                                    @endif
                                    </div>
                                    <div class="col-md-12 margin-gap">
                                    @if(isset($sel_year))
                                        {!! Form::select('sel_year', array(null=>'Select Year') + $avail_years, $sel_year, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_year', array(null=>'Select Year') + $avail_years, null, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}
                                    @endif  
                                    </div>
                                    <div class="col-md-12 margin-gap">
                                    @if(isset($sel_xaxis))
                                        {!! Form::select('sel_xaxis', $xaxis_options, $sel_xaxis, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_xaxis', $xaxis_options, null, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}
                                    @endif                                    
                                    </div>
                                    <div class="col-md-12 margin-gap">
                                    @if(isset($sel_yaxis))
                                        {!! Form::select('sel_yaxis', $yaxis_options, $sel_yaxis, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_yaxis', $yaxis_options, null, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}
                                    @endif                        
                                    </div>      
                                    <div class="col-md-12 margin-gap">
                                    {!! Form::button('<i class="fa fa-btn"></i>Refresh', ['type' => 'submit', 'class' => 'btn btn-primary', 'id'=>'graphSubmitBtn']) !!} 
                                    </div>
                                    <div class="col-md-12 margin-gap" typeahead-section>
                                      {!! Form::input('text', 'schoolPredictor', null, ['id' => 'schoolPredictor', 'class'=>'form-control', 'placeholder' => 'Search by school name', 'autocomplete' => 'off']) !!}
                                    </div>
                                  <!--    <div class="pull-left">
                                     
                                      {!! Form::open(array('url' => ['missingschool'])) !!}
                                            <a href="{{ url('/missingschool') }}" class="btn btn-primary">Click here for missing schools</a>
                                       {!! Form::close() !!}
                                    </div> -->
                                    {!! Form::close() !!}
                                 </div>
                        
                     <div class="pull-left">
                        {!! Form::open(['route'=>'missingschool', 'class'=>'form-horizontal']) !!}
                        {!! Form::hidden('sel_pgid',$dataTable_pgid) !!}
                        {!! Form::hidden('sel_year',$sel_year) !!}
                        {!! Form::hidden('sel_xaxis',$sel_xaxis) !!}
                        {!! Form::hidden('sel_yaxis',$sel_yaxis) !!}
                        
                        <button type="submit" id="missing-schools" class="btn btn-primary">Click here for missing schools</button>
                        {!! Form::close() !!}
                           
                      </div> 
                   </div>
                        </div>
                        <div class="row pull-left">               
                            <div class="col-md-10">
                                @include('common.flash')
                                      <div class="panel-body"> 
                                      @if(isset($count)) <h4>No data found for the selected criteria </h4>
                                      @endif </div>
                                <div id="chart">  </div>                        
                            </div>
                        </div>
                        </div>
                                                         
                    </div>         
                              
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @include ('data.data_tabular')
    </div>       
@endsection
@section('footer')
<script>
  var test_data = <?php echo json_encode($test_data, JSON_HEX_TAG); ?>; 
  var sel_xaxis = <?php echo json_encode($sel_xaxis, JSON_HEX_TAG); ?>; 
  var sel_yaxis = <?php echo json_encode($sel_yaxis, JSON_HEX_TAG); ?>; 
  var xaxislabel = <?php echo json_encode($xaxis_label, JSON_HEX_TAG); ?>; 
  var yaxislabel = <?php echo json_encode($yaxis_label, JSON_HEX_TAG); ?>;
  var selectedSchoolId = -1;

  // Refresh graph on changing fields
  $( ".refresh-graph" ).change(function() {
    $("#graphSubmitBtn").click();
  });

</script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="../public/js/datavisual.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var schoolNames = <?php echo json_encode($schoolNames, JSON_HEX_TAG); ?>;
    $('#schoolPredictor').typeahead({
      source: function(query, process) {
        schools = [];
        schoolIds = {};
        
        $.each(schoolNames, function(i, school) {
          schoolIds[i] = school;
          schools.push(i);
        });
        process(schools);
      },
      updater: function(item) {
        selectedSchoolId = schoolIds[item];
        for(var jsIndex = 0; jsIndex < jsObject.length; jsIndex++) {
          if(jsObject[jsIndex].school_id == selectedSchoolId) {
            var d = jsObject[jsIndex];
            var xPos = xScale(d[sel_xaxis] );
            var yPos = yScale(d[sel_yaxis] );
            drawPath(d, xPos, yPos);
          }
        }
        return item;
      }
    });
  });
</script>
@endsection
