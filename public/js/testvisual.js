console.log(test_data);
jsObject = JSON.parse(test_data); 

  
  var body = d3.select("#chart")
console.log(jsObject)
  // Select X-axis Variable
  
  // Variables
  var body = d3.select("#chart")
  var margin = { top: 50, right: 50, bottom: 50, left: 65 }
  var h = 500 - margin.top - margin.bottom
  var w = 500 - margin.left - margin.right

  // Scales
  var colorScale = d3.scale.category20()
  var xScale = d3.scale.linear()
    .domain([
      d3.min([0,d3.min(jsObject,function (d) { return d[sel_xaxis] })]),
      d3.max([0,d3.max(jsObject,function (d) { return d[sel_xaxis]})])
      ])
    .range([0,w])
  var yScale = d3.scale.linear()
    .domain([
      d3.min([0,d3.min(jsObject,function (d) { return d[sel_yaxis] })]),
      d3.max([0,d3.max(jsObject,function (d) { return d[sel_yaxis]  })])
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
      .attr('cx',function (d) { return xScale(d[sel_xaxis] ) })
      .attr('cy',function (d) { return yScale(d[sel_yaxis] ) })
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
      .on("click", function(d,i) {
        xPos = d3.select(this).attr("cx"),
        yPos = d3.select(this).attr("cy");
        xPath = d[sel_xaxis];
        yPath = d[sel_yaxis];
        svg.selectAll(".crossPath").remove();
        svg.selectAll(".crossCircle").remove();
        svg.append("svg:line")
          .attr('class', 'crossPath')
          .attr("x1", 0).attr("y1", yPos)
          .attr("x2", w).attr("y2", yPos)
          .style("stroke", "red")
          .style("stroke-width", 1);
        svg.append("svg:line")
          .attr('class', 'crossPath')
          .attr("x1", xPos).attr("y1", 0)
          .attr("x2", xPos).attr("y2", h)
          .style("stroke", "red")
          .style("stroke-width", 1);
        svg.append('circle')
          .attr('class', 'crossCircle')
          .attr('cx',function (d) { return xPos })
          .attr('cy',function (d) { return yPos })
          .attr('r','3')
          .attr('stroke','red')
          .attr('stroke-width',1)
          .attr('fill', 'red')
          .append('title') // Tooltip
            .text(function (d) { return sel_xaxis+': '+xPath +
                                 '\n '+sel_yaxis+': ' + yPath})
     })
    .append('title') // Tooltip
      .text(function (d) { return sel_xaxis+': '+d[sel_xaxis] +
                           '\n '+sel_yaxis+': ' + d[sel_yaxis]})
  // X-axis
  svg.append('g')
      .attr('class','axis')
      .attr('id','xAxis')
      .attr('transform', 'translate(0,' + h + ')')
      .call(xAxis)
    .append('text') // X-axis Label
      .attr('id','xAxisLabel')
      .attr('y',30)
      .attr('x',w)
      .attr('dy','.71em')
      .style({"text-anchor": "end", "font-size": "18px"})
      .text(sel_xaxis)
  // Y-axis
  svg.append('g')
      .attr('class','axis')
      .attr('id','yAxis')
      .call(yAxis)
    .append('text') // y-axis Label
      .attr('id', 'yAxisLabel')
      .attr('transform','rotate(-90)')
      .attr('x',0)
      .attr('y',-65)
      .attr('dy','.71em')
      .style({"text-anchor": "end", "font-size": "18px"})
      .text(sel_yaxis)

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
