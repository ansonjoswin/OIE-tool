
@extends('layouts.app')

<style>

svg:not(:root) {
    overflow: visible !important;
}

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.form-control2
{
    background-color: #333; 
    color: #ddd;
}

article.accordion
{
    display: block;
    width: 10em;
    margin: 0 auto;
    overflow: auto;
    border-radius: 5px;
}

article.accordion section
{
    position: relative;
    display: block;
    float: left;
    width: 2em;
    height: 14em;
    margin: 0.5em 0 0.5em 0.5em;
    color: #333;
    background-color: #333;
    overflow: hidden;
    border-radius: 3px;
}

article.accordion section h2
{
    position: absolute;
    font-size: 1em;
    font-weight: bold;
    width: 12em;
    height: 2em;
    top: 14em;
    left: 0;
    text-indent: 1em;
    padding: 0;
    margin: 0;
    color: #ddd;
    -webkit-transform-origin: 0 0;
    -moz-transform-origin: 0 0;
    -ms-transform-origin: 0 0;
    -o-transform-origin: 0 0;
    transform-origin: 0 0;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
}

article.accordion section h2 a
{
    display: block;
    width: 100%;
    line-height: 2em;
    text-decoration: none;
    color: inherit;
    outline: 0 none;
}

article.accordion section:target
{
    width: 30em;
    padding: 0 1em;
    color: #333;
    background-color: #fff;
}

article.accordion section:target h2
{
    position: static;
    font-size: 1.3em;
    text-indent: 0;
    color: #333;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
}

article.accordion section,
article.accordion section h2
{
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -ms-transition: all 1s ease;
    -o-transition: all 1s ease;
    transition: all 1s ease;
}

.dot {
  stroke: #000;
}

.tooltip {
  position: absolute;
  width: 200px;
  height: 28px;
  pointer-events: none;
}

.panel-body {
    font: 11px sans-serif;
    margin-bottom: 25px;
}
</style>

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
                                    <div class="col-md-5">
                                    @if(isset($sel_pgid))
                                        {!! Form::select('sel_pgid', [''=>'Select Peer Group'] + $peerGroups, $sel_pgid, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_pgid', [''=>'Select Peer Group'] + $peerGroups, null, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @endif
                                    </div>
                                    <div class="col-md-3">
                                    @if(isset($sel_year))
                                        {!! Form::select('sel_year', [''=>'Select Year', '2012'=>'2012','2013'=>'2013','2014'=>'2014'], $sel_year, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @else
                                        {!! Form::select('sel_year', [''=>'Select Year', '2012'=>'2012','2013'=>'2013','2014'=>'2014'], null, ['class'=>'form-control', 'required'=>'required']) !!}
                                    @endif
                                    </div>
                                    <div class="col-md-2">
                                    {!! Form::button('<i class="fa fa-btn"></i>Refresh', ['type' => 'submit', 'class' => 'btn btn-primary']) !!} 
                                    </div> 
                                </div>                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
<!--                                 <article class="accordion">
                                    <section id="acc1">
                                        <h2><a href="#acc1">Select Performance</a></h2>
                                        <h2>Select Performance</h2>
                                        <p>
                                        {{--
                                        {!! Form::select('sel_year', [''=>'Select Performance', '2012'=>'Grad Rate 4 Year','2013'=>'Grad Rate 6 Year'], null, ['class'=>'form-control', 'required'=>'required']) !!}
                                        --}}
                                        </p>
                                    </section>                         
                                </article>  -->
                            </div>                       
                            <div class="col-md-7">
                                @include('common.flash')
                                <div id="chart">  </div>                        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10" >
                                <div class="col-md-2" ></div>
                                <div class="col-md-5" >
                                @if(isset($sel_xaxis))
                                    {!! Form::select('sel_xaxis', [''=>'Select Resource', 'Inst_Cnt'=>'Instructor Count','Admin_Cnt'=>'Admin Count','Emp_Cnt'=>'Employee Count'], $sel_xaxis, ['class'=>'form-control2', 'required'=>'required']) !!}
                                @else
                                    {!! Form::select('sel_xaxis', [''=>'Select Resource', 'Inst_Cnt'=>'Instructor Count','Admin_Cnt'=>'Admin Count','Emp_Cnt'=>'Employee Count'], null, ['class'=>'form-control2', 'required'=>'required']) !!}
                                @endif
                                </div>
                                <div class="col-md-3" ></div>
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
</script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="../public/js/data_visual.js"></script>
@endsection