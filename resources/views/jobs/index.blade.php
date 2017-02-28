@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
               <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> 
                     <div class="pull-right">
                            <form action="{{ url('logs') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="check-logs" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Check logs</button>
                            </form>
                        </div>
   <div><h4>Scheduled Jobs</h4> </div>
     @include('common.flash')
    @if (count($jobs) > 0)
    <div class="panel-body">
    <div class="table-responsive">
     <table class="table table-bordered table-striped cds-datatable">
        <thead>
        <tr>
          
            <th>Job Name</th>
            <th>Scheduled At</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($jobs as $job)
            <tr>
             
              <td>{{ substr(json_decode($job->payload)->{'displayName'}, 9) }}</td>
              <td>{{ date("Y-m-d", strtotime('+1 day, -6 hours', strtotime($job->created_at))). ' 01:00:00'  }}</td>
              <td>{{ date("Y-m-d h:i:s", strtotime('-6 hours', strtotime($job->created_at))) }}</td>
               <td>
                  {!! Form::open(['method' => 'DELETE', 'route'=>['jobs.destroy', $job->id]]) !!}
                  {!! Form::submit('Cancel', ['id' => 'cancelBtn_'.$job->id, 'class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
              </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
       @else
    <div class="panel-body"><h4>No User Records found</h4></div>
     @endif
    </div>
    </div>
    </div>
</div>
</div>
@endsection

@section('footer')
<script>
    $(function(){
      //Disable cancel buttons from 1:00 AM to 4:00 AM.
      var currentTime = new Date().getHours();
      if(currentTime >=1 && currentTime <= 4)
      {
          $('[id^=cancelBtn]').attr('disabled', true);
      }
    });
</script>
@endsection