<!DOCTYPE html>
<meta charset="utf-8">
<title>Sankey Visualization</title>
<style>

    .node rect {
        cursor: move;
        fill-opacity: .9;
        shape-rendering: crispEdges;
    }

    .node text {
        pointer-events: none;
        text-shadow: 0 1px 0 #fff;
    }

    .link {
        fill: none;
        stroke: #000;
        stroke-opacity: .2;
    }

    .link:hover {
        stroke-opacity: .5;
    }

</style>
<div>

<p id="chart">

        <script src="http://d3js.org/d3.v3.min.js"></script>
        <script src="{!! asset('js/sankey.js') !!}"></script>
        <script>

        var sankeyArray = '<?php echo json_encode($nodeArray);?>';
        var units = "Dollars";

        var margin = {top: 10, right: 10, bottom: 10, left: 10},
                width = 1200 - margin.left - margin.right,
                height = 900 - margin.top - margin.bottom;

        var formatNumber = d3.format(",.0f"),    // zero decimal places
                format = function(d) { return formatNumber(d.value) + " " + d.units; },
                color = d3.scale.category20();

        // append the svg canvas to the page
        var svg = d3.select("#chart").append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
                .append("g")
                .attr("transform",
                        "translate(" + margin.left + "," + margin.top + ")");

        // Set the sankey diagram properties
        var sankey = d3.sankey()
                .nodeWidth(36)
                .nodePadding(40)
                .size([width, height]);

        var path = sankey.link();

        generateSankeyViz();
        // load the data

        function generateSankeyViz() {
        //d3.json("/sankey.json", function(error, graph) {
            graph = JSON.parse(sankeyArray);
            sankey
                    .nodes(graph.nodes)
                    .links(graph.links)
                    .layout(32);

// add in the links
            var link = svg.append("g").selectAll(".link")
                    .data(graph.links)
                    .enter().append("path")
                    .attr("class", "link")
                    .attr("d", path)
                    .attr("id", function(d,i){
                        d.id = i;
                        return "link-"+i;
                    })
                    .style("stroke-width", function(d) { return Math.max(1, d.dy); })
                    .sort(function(a, b) { return b.dy - a.dy; });

// add the link titles
            link.append("title")
                    .text(function(d) {
                        return d.source.name + " → " +
                                d.target.name + "\n" + format(d); });

// add in the nodes
            var node = svg.append("g").selectAll(".node")
                    .data(graph.nodes)
                    .enter().append("g")
                    .attr("class", "node")
                    .attr("transform", function(d) {
                        return "translate(" + d.x + "," + d.y + ")"; })
                    .on("click", highlight_node_links)
                    .call(d3.behavior.drag()
                            .origin(function(d) { return d; })
                            .on("dragstart", function() {
                                this.parentNode.appendChild(this); })
                            .on("drag", dragmove));

// add the rectangles for the nodes
            node.append("rect")
                    .attr("height", function(d) { return d.dy; })
                    .attr("width", sankey.nodeWidth())
                    .style("fill", function(d) {
                        return d.color = color(d.name.replace(/ .*/, "")); })
                    .style("stroke", function(d) {
                        return d3.rgb(d.color).darker(2); })
                    .append("title")
                    .text(function(d) {
                        return d.name + "\n" + format(d); });

// add in the title for the nodes
            node.append("text")
                    .attr("x", -6)
                    .attr("y", function(d) { return d.dy / 2; })
                    .attr("dy", ".35em")
                    .attr("text-anchor", "end")
                    .attr("transform", null)
                    .text(function(d) { return d.name; })
                    .filter(function(d) { return d.x < width / 2; })
                    .attr("x", 6 + sankey.nodeWidth())
                    .attr("text-anchor", "start");


// the function for moving the nodes
            function dragmove(d) {
                d3.select(this).attr("transform",
                        "translate(" + d.x + "," + (
                        d.y = Math.max(0, Math.min(height - d.dy, d3.event.y))
                    ) + ")");
                sankey.relayout();
                link.attr("d", path);
            }

            function highlight_node_links(node,i){

                var remainingNodes=[],
                        nextNodes=[];

                var stroke_opacity = 0;
                if( d3.select(this).attr("data-clicked") == "1" ){
                    d3.select(this).attr("data-clicked","0");
                    stroke_opacity = 0.2;
                }else{
                    d3.select(this).attr("data-clicked","1");
                    stroke_opacity = 0.5;
                }

                var traverse = [{
                    linkType : "sourceLinks",
                    nodeType : "target"
                },{
                    linkType : "targetLinks",
                    nodeType : "source"
                }];

                traverse.forEach(function(step){
                    node[step.linkType].forEach(function(link) {
                        remainingNodes.push(link[step.nodeType]);
                        highlight_link(link.id, stroke_opacity);
                    });

                    while (remainingNodes.length) {
                        nextNodes = [];
                        remainingNodes.forEach(function(node) {
                            node[step.linkType].forEach(function(link) {
                                nextNodes.push(link[step.nodeType]);
                                highlight_link(link.id, stroke_opacity);
                            });
                        });
                        remainingNodes = nextNodes;
                    }
                });
            }

            function highlight_link(id,opacity){
                d3.select("#link-"+id).style("stroke-opacity", opacity);
            }
        }

    </script>

</div>

</html>

