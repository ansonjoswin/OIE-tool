@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
               <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> 
    <h4>Scheduled Jobs</h4> </div>
     @include('common.flash')
    @if (count($jobs) > 0)
    <div class="panel-body">
    <div class="table-responsive">
     <table class="table table-bordered table-striped cds-datatable">
        <thead>
        <tr class="bg-info">
            <th>ID</th>
            <th>Job Name</th>
            <th>Scheduled At</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ substr($job->payload,27,11)}}  </td>
                <td>{{ $job->created_at }}</td>
                <td>{{ $job->created_at }}</td>
                 <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['jobs.destroy', $job->id]]) !!}
                    {!! Form::submit('Cancel', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
          <p id="demo">
          </p>
          <script>
          var str = $jobs->payload;
          var variable = " '+str+' ";
          var res = variable.substring(25,36);
          document.getElementById("demo").innerHTML = res;
          </script>
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

@endsection