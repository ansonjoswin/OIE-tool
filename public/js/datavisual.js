jsObject = JSON.parse(test_data);

  // Variables
  var body = d3.select("#chart")
  var margin = { top: 50, right: 50, bottom: 50, left: 100 }
  var h = 500 - margin.top - margin.bottom
  var w = 800 - margin.left - margin.right

  // SVG
  var svg = body.append('svg')
      .attr('height', h + margin.top + margin.bottom)
      .attr('width', w + margin.left + margin.right)
      .append('g')
      .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')')
  
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
  
  // X-axis
  var xAxis = d3.svg.axis()
    .scale(xScale)
    .orient('bottom')
  
  // Y-axis
  var yAxis = d3.svg.axis()
    .scale(yScale)
    .orient('left')
  
  // X-axis Label
  svg.append('g')
      .attr('class','axis')
      .attr('id','xAxis')
      .attr('transform', 'translate(0,' + h + ')')
      .call(xAxis)
    .append('text') // X-axis Label Text
      .attr('id','xAxisLabel')
      .attr('y',30)
      .attr('x',w)
      .attr('dy','.71em')
      .style({"text-anchor": "end", "font-size": "16px", "font-family": "inherit"})
      .text(xaxislabel)

  // Y-axis Label
  svg.append('g')
      .attr('class','axis')
      .attr('id','yAxis')
      .call(yAxis)
    .append('text') // Y-axis Label Text
      .attr('id', 'yAxisLabel')
      .attr('transform','rotate(-90)')
      .attr('x',0)
      .attr('y',-65)
      .attr('dy','.71em')
      .style({"text-anchor": "end", "font-size": "16px", "font-family": "inherit"})
      .text(yaxislabel)

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
      .attr('fill','black')
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
        drawPath(d, xPos, yPos);
      })
    .append('title') // Tooltip
      .text(function (d) { return ( d.school_name )}) //removed "School Name:" from tooltip

  function drawPath(d, xPos, yPos) {
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
        // Changed tooltip variables to match Resource and Performance lists
        // The maximum length of any string including tool tips is 1023, so I've left some fields out for now
        .text(d.school_name+ "\n"
          // "Instructors"+" : "+d.instruction_staff + "\n"
          +"Instructors per Thousand Students"+" : "+d.instructors_per_thousand_student + "\n"
          // "Admin and Professional Staff"+" : "+d.admin_professional_staff + "\n"+
          +"Admin & Professional Staff per Thousand Students"+" : "+d.admin_professionalstaff_perthousandstudent + "\n"
          // "Non-Instruction Academic Staff"+" : "+d.noninstruction_academicstaff + "\n"+
          // +"Non-Instruction Academic Staff per Thousand Students"+" : "+d.noninstruction_academicstaff_perthousandstudent + "\n"
          // "Non-Admin Trade and Services Staff"+" : "+d.nonadmin_trade_servicestaff + "\n"+
          // +"Non-Admin Trade and Services Staff per Thousand Students"+" : "+d.nonadmin_tradeservicestaff_perthousandstudent + "\n"+
          +"All Instructors & Staff"+" : "+d.all_instructors_staff + "\n"
          +"Undergrad Students per Thousand Students"+" : "+d.ug_student_perthousandstudent + "\n"
          +"Instructor Salary per Million"+" : "+d.instructor_salarypermillion + "\n"
          // +"Admin and Professional Staff Salary per Million"+" : "+d.adminprofessionalstaff_salarypermillion + "\n"
          // +"Non-Instruction Academic Staff Salary per Million"+" : "+d.noninstruction_academicstaff_salarypermillion + "\n"+
          // +"Non-Admin Trade and Services Staff Salary per Million"+" : "+d.nonadmin_tradeservicestaff_salarypermillion + "\n"+
          +"Avg SCH per Student per AY (undergrad)"+" : "+d.ug_average_sch_studentperay + "\n"
          +"Avg SCH per Student per AY (grad)"+" : "+d.grad_average_sch_studentperay + "\n"
          +"Undergrad Degrees per Thousand Undergrad Students"+" : "+d.ug_degrees_perthousand_ugstudent + "\n"
          // +"Undergrad Certificates per Thousand Undergrad Students"+" : "+d.ug_certi_perthousand_ugstudent + "\n"
          +"Grad Degrees per Hundred Grad Students"+" : "+d.graddegree_perhundredgradstudent + "\n"
          // +"Graduate Certificates per Hundred Graduate Students"+" : "+grad_certi_perhundred_gradstudent + "\n"
          +"Bachelor Degree 4-Yr Graduation Rate"+" : "+d.bachelordegree_4yeargradrate + "\n"
          +"Bachelor Degree 6-Yr Graduation Rate"+" : "+d.bachelordegree_6yeargradrate + "\n"
          // +"Associate Degree and Certificate 3-Yr Graduation Rate"+" : "+d.associatedegree_certi3yeargradrate + "\n"
          // +"Loan Default Rate"+" : "+d.loan_default_rate
        )

  }