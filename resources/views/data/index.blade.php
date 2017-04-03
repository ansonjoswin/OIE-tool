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
.margin-top-section {
  margin-top: 25px;
}
.margin-bottom-section {
  margin-bottom: 10px;
}
.analytics-label {
  margin: -3px -15px 5px 0;
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
                        <button id="filterCollapseBtn" class="btn btn-primary btn-md" data-toggle="collapse" data-target="#analyticsFormSection">Show Filters</button>
                        <div id="analyticsFormSection" class="collapse">                          
                          <div class="col-md-12">
                            <div class="panel-body">
                            {!! Form::open(['url'=>'/datarefresh', 'class'=>'form-horizontal', 'id'=>'analyticsForm']) !!}
                              <div class="row col-md-3">
                                <div class="col-md-5" align="right">
                                    <label class="analytics-label">Peer Group</label>
                                </div>
                                <div class="col-md-7" align="right">
                                  {!! Form::select('sel_pgid', $peerGroups, $sel_pgid, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}
                                 </div>
                              </div>
                              <div class="row col-md-2">
                                <div class="col-md-3" align="right">
                                    <label class="analytics-label">Year</label>
                                </div>
                                <div class="col-md-9" align="right">
                                  {!! Form::select('sel_year', $avail_years, $sel_year, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!} 
                                </div>
                              </div>
                              <div class="row col-md-4">
                                <div class="col-md-3" align="right">
                                    <label class="analytics-label">Resource</label>
                                </div>
                                <div class="col-md-9" align="right">
                                  {!! Form::select('sel_xaxis', $xaxis_options, $sel_xaxis, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}
                                </div>
                              </div>
                              <div class="row col-md-4">
                                <div class="col-md-3" align="right">
                                    <label class="analytics-label">Performance</label>
                                </div>
                                <div class="col-md-9" align="right">
                                  {!! Form::select('sel_yaxis', $yaxis_options, $sel_yaxis, ['class'=>'form-control refresh-graph', 'required'=>'required']) !!}  
                                </div>
                              </div>
                              <div class="row col-md-7 margin-top-section col-md-offset-2">
                                <div class="col-md-4" align="right">
                                    <label class="analytics-label">Institution Name</label>
                                </div>
                                <div class="col-md-8" align="right" typeahead-section>
                                  {!! Form::input('text', 'schoolPredictor', null, ['id' => 'schoolPredictor', 'Placeholder'=>'Search here', 'class'=>'form-control', 'autocomplete' => 'off']) !!}
                                </div>
                              </div>
                                 {!! Form::close() !!}
                                <div class="row col-md-7 margin-top-section col-md-offset-2">
                                <div class="col-md-10" align="right">
                                  {!! Form::open(['route'=>'missingschool', 'class'=>'form-horizontal']) !!}
                                  {!! Form::hidden('sel_pgid',$dataTable_pgid) !!}
                                  {!! Form::hidden('sel_year',$sel_year) !!}
                                  {!! Form::hidden('sel_xaxis',$sel_xaxis) !!}
                                  {!! Form::hidden('sel_yaxis',$sel_yaxis) !!}
                                  
                                  <button type="submit" id="missing-schools" class="btn btn-primary">Click here for Missing Schools</button>
                                  {!! Form::close() !!}
                                     
                                </div> 
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="row margin-top-section">               
                            <div class="col-md-10 col-md-offset-1 panel panel-default">
                                @include('common.flash')
                                <div class="panel-body"> 
                                  @if(isset($count)) 
                                    <h4>No data found for the selected criteria </h4>
                                  @endif 
                                  <div id="chart"></div>
                                </div>                        
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
    $("#analyticsForm").submit();
  });
  $("#filterCollapseBtn").click(function() {
    $("#filterCollapseBtn").text() == "Show Filters" ? $("#filterCollapseBtn").text("Hide Filters") : $("#filterCollapseBtn").text("Show Filters");
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