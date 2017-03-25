@extends('layouts.app')

    <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
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
                                        {!! Form::select('sel_year', [''=>'Select Year', '2012'=>'2012','2013'=>'2013','2014'=>'2014'], $sel_year, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_year', [''=>'Select Year', '2012'=>'2012','2013'=>'2013','2014'=>'2014'], null, ['class'=>'form-control', 'required'=>'required']) !!}
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
                    <div class="panel-body">
                        <div id="chart">
<script>
 
  var test_data = <?php echo json_encode($test_data, JSON_HEX_TAG); ?>; 
  var xaxis=<?php echo $test_data; ?>; 
  console.log(xaxis);
 // console.log(test_data)
jsObject = JSON.parse(test_data); 

  
  var body = d3.select("#chart")
console.log(jsObject)
  // Select X-axis Variable
  
  // Variables
  var body = d3.select("#chart")
  var margin = { top: 50, right: 50, bottom: 50, left: 50 }
  var h = 500 - margin.top - margin.bottom
  var w = 500 - margin.left - margin.right

  // Scales
  var colorScale = d3.scale.category20()
  var xScale = d3.scale.linear()
    .domain([
      d3.min([0,d3.min(jsObject,function (d) { return d.cohort_status8 })]),
      d3.max([0,d3.max(jsObject,function (d) { return d.cohort_status8})])
      ])
    .range([0,w])
  var yScale = d3.scale.linear()
    .domain([
      d3.min([0,d3.min(jsObject,function (d) { return d.cohort_status13 })]),
      d3.max([0,d3.max(jsObject,function (d) { return d.cohort_status13 })])
      ])
    .range([h,0])
  // SVG
  var svg = body.append('svg')
      .attr('height',h + margin.top + margin.bottom)
      .attr('width',w + margin.left + margin.right)
    .append('g')
      .attr('transform','translate(' + margin.left + ',' + margin.top + ')')
  // X-axis
  var xAxis = d3.svg.axis()
    .scale(xScale)
    .orient('bottom')
  // Y-axis
  var yAxis = d3.svg.axis()
    .scale(yScale)
    .orient('left')
  // Circles
  var circles = svg.selectAll('circle')
      .data(jsObject)
      .enter()
    .append('circle')
      .attr('cx',function (d) { return xScale(d.cohort_status8) })
      .attr('cy',function (d) { return yScale(d.cohort_status13) })
      .attr('r','3')
      .attr('stroke','black')
      .attr('stroke-width',1)
      .attr('fill',function (d,i) { return colorScale(i) })
      .on('mouseover', function () {
        d3.select(this)
          .transition()
          .attr('r',3)
          .attr('stroke-width',3)
      })
      .on('mouseout', function () {
        d3.select(this)
          .transition()
          .attr('r',3)
          .attr('stroke-width',1)
      })
    .append('title') // Tooltip
      .text(function (d) { return 'X-axis:'+d.stEnrl +
                           '\n Y-axis:' + d.stEnrl})
  // X-axis
  svg.append('g')
      .attr('class','axis')
      .attr('id','xAxis')
      .attr('transform', 'translate(0,' + h + ')')
      .call(xAxis)
    .append('text') // X-axis Label
      .attr('id','xAxisLabel')
      .attr('y',-10)
      .attr('x',w)
      .attr('dy','.71em')
      .style('text-anchor','end')
      .text("Resource")
  // Y-axis
  svg.append('g')
      .attr('class','axis')
      .attr('id','yAxis')
      .call(yAxis)
    .append('text') // y-axis Label
      .attr('id', 'yAxisLabel')
      .attr('transform','rotate(-90)')
      .attr('x',0)
      .attr('y',5)
      .attr('dy','.71em')
      .style('text-anchor','end')
      .text("Performance")

  function yChange() {
    var value = this.value // get the new y value


    yScale // change the yScale
      .domain([
        d3.min([0,d3.min(jsObject,function (d) { return d[value] })]),
        d3.max([0,d3.max(jsObject,function (d) { return d[value] })])
        ])

    yAxis.scale(yScale) // change the yScale
    d3.select('#yAxis') // redraw the yAxis
      .transition().duration(5)
      .call(yAxis)
    d3.select('#yAxisLabel') // change the yAxisLabel
      .text(value)    
    d3.selectAll('circle') // move the circles
      .transition().duration(5)
           .attr('cy',function (d) { return yScale(d[value]) })
  }

  function xChange() {
    var value = this.value // get the new x value
    xScale // change the xScale
      .domain([
        d3.min([0,d3.min(jsObject,function (d) { return d[value] })]),
        d3.max([0,d3.max(jsObject,function (d) { return d[value] })])
        ])
    xAxis.scale(xScale) // change the xScale
    d3.select('#xAxis') // redraw the xAxis
      .transition().duration(5)
      .call(xAxis)
    d3.select('#xAxisLabel') // change the xAxisLabel
      .transition().duration(5)
      .text(value)
    d3.selectAll('circle') // move the circles
      .transition().duration(5)
        .attr('cx',function (d) { return xScale(d[value]) })
  }

 
  </script>
</div>
                    </div>         
                </div>
            </div>
        </div>
    </div>
@endsection

