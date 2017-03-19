<!DOCTYPE html>
<html>
 <head>
    <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <link rel='stylesheet' href='style.css'>
  </head>
    <!-- CSS (Styling) -->
    <style type="text/css">
            /* Format X and Y Axis */
 body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  position: relative;
  width: 960px;
}

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
 
 <body>
 <div class="container">
     <h2>D3 Scatterplot </h2>
     <section id="char"></section>
  </div>
  <!-- Begin D3 Javascript -->
  <script type="text/javascript">

  var test_data = <?php echo json_encode($test_data, JSON_HEX_TAG); ?>; 
jsObject = JSON.parse(test_data); 

  var body = d3.select("body")
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
  var body = d3.select("body")
  var margin = { top: 50, right: 50, bottom: 50, left: 50 }
  var h = 500 - margin.top - margin.bottom
  var w = 500 - margin.left - margin.right

  // Scales
  var colorScale = d3.scale.category20()
  var xScale = d3.scale.linear()
    .domain([
      d3.min([0,d3.min(jsObject,function (d) { return d.GradRate4yr_BacDgr100 })]),
      d3.max([0,d3.max(jsObject,function (d) { return d.GradRate4yr_BacDgr100})])
      ])
    .range([0,w])
  var yScale = d3.scale.linear()
    .domain([
      d3.min([0,d3.min(jsObject,function (d) { return d.GradRate6yr_BacDgr150 })]),
      d3.max([0,d3.max(jsObject,function (d) { return d.GradRate6yr_BacDgr150 })])
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
      .attr('cx',function (d) { return xScale(d.GradRate4yr_BacDgr100) })
      .attr('cy',function (d) { return yScale(d.GradRate6yr_BacDgr150) })
      .attr('r','10')
      .attr('stroke','black')
      .attr('stroke-width',1)
      .attr('fill',function (d,i) { return colorScale(i) })
      .on('mouseover', function () {
        d3.select(this)
          .transition()
          .duration(500)
          .attr('r',20)
          .attr('stroke-width',3)
      })
      .on('mouseout', function () {
        d3.select(this)
          .transition()
          .duration(500)
          .attr('r',10)
          .attr('stroke-width',1)
      })
    .append('title') // Tooltip
      .text(function (d) { return 'X-axis:'+d.GradRate4yr_BacDgr100 +
                           '\n Y-axis:' + d.GradRate6yr_BacDgr150})
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
      .transition().duration(1000)
      .call(yAxis)
    d3.select('#yAxisLabel') // change the yAxisLabel
      .text(value)    
    d3.selectAll('circle') // move the circles
      .transition().duration(1000)
      .delay(function (d,i) { return i*100})
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
      .transition().duration(1000)
      .call(xAxis)
    d3.select('#xAxisLabel') // change the xAxisLabel
      .transition().duration(1000)
      .text(value)
    d3.selectAll('circle') // move the circles
      .transition().duration(1000)
      .delay(function (d,i) { return i*100})
        .attr('cx',function (d) { return xScale(d[value]) })
  }

 
  </script>
  </body>
</html>