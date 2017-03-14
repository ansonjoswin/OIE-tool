
jsObject = JSON.parse(test_data); 
jsObject.forEach(function(data) {  
    data.GradRate4yr_BacDgr100 = +data.GradRate4yr_BacDgr100;
    data.GradRate6yr_BacDgr150 = +data.GradRate6yr_BacDgr150;                                
   // console.log(rawData.GradRate4yr_BacDgr100);
  });


var xExtents = d3.extent(jsObject, function (d) {return d.GradRate4yr_BacDgr100; });  //x
var yExtents = d3.extent(jsObject, function (d) {return d.GradRate6yr_BacDgr150; });  //y

var maxExtent = d3.max(
  xExtents.concat(yExtents), function(d) { return Math.abs(d); });

var graphWidth = 500, graphHeight = 500;
var radius = 5;

var xScale = d3.scale.linear()
  .domain([-maxExtent,maxExtent+5])
  .range([0, graphWidth]);

var yScale = d3.scale.linear()
  .domain([-maxExtent,maxExtent+5])
  .range([graphHeight, 0]);

var xAxis = d3.svg.axis().scale(xScale).orient("bottom");
var yAxis = d3.svg.axis().scale(yScale).orient("left");

var svg = d3.select('#chart')
  .append('svg')
  .attr('width', graphWidth)
  .attr('height', graphHeight);


  // x-axis
  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + graphHeight + ")")
      .call(xAxis)
    .append("text")
      .attr("class", "label")
      .attr("x", graphWidth)
      .attr("y", -6)
      .style("text-anchor", "end")
      .text("GradRate4yr_BacDgr100");

  // y-axis
  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("class", "label")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("GradRate6yr_BacDgr150");


svg.selectAll('circle')
  .data(jsObject)
  .enter()
  .append('circle')
  .attr({
    cx: function(d) {return xScale(d.GradRate4yr_BacDgr100); },  //X
    cy: function(d) {return yScale(d.GradRate6yr_BacDgr150); },  //Y
    r: radius,
    fill: 'steelblue'
  });
