
@extends('layouts.app')

@section('content')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div><h4>Data Visualization</h4></div>
                    </div>   
                    <div class="panel-body">

                        <select class="form-control" id="selected_peergroup" required="required">
                            <option selected="selected"></option>
                        @foreach($peerGroups as $peerGroup)
                            <option value="{{ $peerGroup->PeerGroupID }}"> {{ $peerGroup->PeerGroupName }} </option>
                        @endforeach
                        </select>                        
                    
                    </div>
                    <div class="panel-body" > 
                        @include('common.flash')
                        <div id="chart">  </div>
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


