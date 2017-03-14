
@extends('layouts.app')

<style>
.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div><h4>Data Visualization</h4></div>
                    </div>   
                    <div class="panel-body">
                        {!! Form::open(['url'=>'/datarefresh', 'class'=>'form-horizontal']) !!}
                        <div class="col-md-4">
                            <div class="panel-body">

                            {!! Form::select('sel_pgid', $pg_arr, null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!} 
                            
                            <select class="form-control" id="selected_peergroup" required="required">
                                <option selected="selected">Select Peer Group</option>
                                @foreach($peerGroups as $peerGroup)
                                    <option value="{{ $peerGroup->PeerGroupID }}"> {{ $peerGroup->PeerGroupName }} ({{$peerGroup->PeerGroupID}})</option>
                                @endforeach
                            </select>

                            </div>
                            <div class="panel-body">
                            {!! Form::button('<i class="fa fa-btn"></i>Refresh', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}  
                            </div>                    
                        </div>
                        {!! Form::close() !!}
                        <div class="col-md-6">
                            @include('common.flash')
                            <div id="chart">  </div>                        
                        </div>
                    </div>         
                </div>
                {{ var_dump($test_data)}}
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


