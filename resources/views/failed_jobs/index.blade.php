@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
               <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> 
   <div><h4>Failed Jobs</h4> </div>
     @include('common.flash')
    @if (count($failed_jobs) > 0)
    <div class="panel-body">
    <div class="table-responsive">
     <table class="table table-bordered table-striped cds-datatable">
        <thead>
        <tr>
          
            <th>Job Name</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($failed_jobs as $failedjob)
            <tr>
             
              <td>{{ substr(json_decode($failedjob->payload)->{'displayName'}, 9) }}</td>
              <td>{{date("Y-m-d h:i:s", strtotime($failedjob->created_at) + 3600*(-6 + date("I")))}}</td>
               <td>
                  {!! Form::open(['method' => 'DELETE', 'route'=>['failed_jobs.destroy', $failedjob->id]]) !!}
                  {!! Form::submit('Cancel', ['id' => 'cancelBtn_'.$faiedjob->id, 'class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
              </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
       @else
    <div class="panel-body"><h4>No Failed Jobs found</h4></div>
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