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
                        <div id="chart">
<script>
 
  var test_data = <?php echo json_encode($test_data, JSON_HEX_TAG); ?>; 
 // console.log(test_data)
jsObject = JSON.parse(test_data); 

  
  var body = d3.select("#chart")
console.log(d3.keys(jsObject[0]))
  // Select X-axis Variable
  

  var span = body.append('span')
    .text('Resource: ')
  var yInput = body.append('select')
      .attr('id','xSelect')
      .on('change',xChange)
    .selectAll('option')
      .data(d3.keys(jsObject[0]))
      .enter()
    .append('option')
      .attr('value',function (d) { return d})
      .text(function (d) { return d})
  body.append('br')

  // Select Y-axis Variable
  var span = body.append('span')
      .text('Performance:')
  var yInput = body.append('select')
      .attr('id','ySelect')
      .on('change',yChange)
    .selectAll('option')
      .data(d3.keys(jsObject[0]))
      .enter()
    .append('option')
      .attr('value',function (d) { return d})
      .text(function (d) { return d})
  body.append('br')

  // Variables
  var body = d3.select("#chart")
  var margin = { top: 50, right: 50, bottom: 50, left: 50 }
  var h = 500 - margin.top - margin.bottom
  var w = 500 - margin.left - margin.right

  // Scales
  var colorScale = d3.scale.category20()
  var xScale = d3.scale.linear()
    .domain([
      d3.min([0,d3.min(jsObject,function (d) { return d.stEnrl })]),
      d3.max([0,d3.max(jsObject,function (d) { return d.stEnrl})])
      ])
    .range([0,w])
  var yScale = d3.scale.linear()
    .domain([
      d3.min([0,d3.min(jsObject,function (d) { return d.stEnrl })]),
      d3.max([0,d3.max(jsObject,function (d) { return d.stEnrl })])
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
      .attr('cx',function (d) { return xScale(d.stEnrl) })
      .attr('cy',function (d) { return yScale(d.stEnrl) })
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

