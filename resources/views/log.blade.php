@extends('layouts.app')

@section('content')



<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <h1>Log Viewer</h1>
         <!--  <p class="text-muted"><i>by me</i></p> -->
          <div class="list-group">
            @foreach($files as $file)
              <a href="?l={{ base64_encode($file) }}" class="list-group-item @if ($current_file == $file) llv-active @endif">
                {{$file}}
              </a>
            @endforeach
          </div>
        </div>
        <div class="col-sm-9 col-md-10 table-container">


<!-- <div class="container">
<div class="row">

<div class="col-sm-3 col-md-2 sidebar">


          <div class="list-group">
          @foreach($files as $file)
             <a href="?l={{ base64_encode($file) }}" class="list-group-item @if ($current_file == $file) llv-active @endif">
                  {{$file}}
                </a>
              @endforeach
          </div>
          </div>

  
    <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
          <div class="panel-heading"> 
            <h4 >
              Log Viewer
            </h4>
          </div>

          <div class="panel-body">
            <div class="table-container"> -->
              @if ($logs === null)
                <div>
                  Log file >50M, please download it.
                </div>
              @else
              <div class="table-responsive">
              <table id="table-log" class="table table-bordered table-striped cds-datatables">
                <thead>
                  <tr>
                    <th>Level</th>
                    <th>Context</th>
                    <th>Date</th>
                    <th>Content</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($logs as $key => $log)
                  <tr>
                    <td class="text-{{{$log['level_class']}}}"><span class="glyphicon glyphicon-{{{$log['level_img']}}}-sign" aria-hidden="true"></span> &nbsp;{{$log['level']}}</td>
                    <td class="text">{{$log['context']}}</td>
                    <td class="date">{{{$log['date']}}}</td>
                    <td class="text">
                      @if ($log['stack']) <a class="pull-right expand btn btn-default btn-xs" data-display="stack{{{$key}}}"><span class="glyphicon glyphicon-search"></span></a>@endif
                      {{{$log['text']}}}
                      @if (isset($log['in_file'])) <br />{{{$log['in_file']}}}@endif
                      @if ($log['stack']) <div class="stack" id="stack{{{$key}}}" style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}</div>@endif
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
              </div>
              @endif
              <div class="container display-inline-block">
                <a href="?dl={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-download-alt"></span> Download file</a>
                -
                -
                <a id="delete-log" href="?del={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-trash"></span> Delete file</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')

    <style>
      h1 {
        font-size: 1.5em;
        margin-top: 0px;
      }
      .stack {
        font-size: 0.85em;
      }
      .date {
        min-width: 75px;
      }
      .text {
        word-break: break-all;
      }
      a.llv-active {
        z-index: 2;
        background-color: #f5f5f5;
        border-color: #777;
      }

      .display-inline-block {
        display: inline-block;
      }
  </style>

  <script>
    $(document).ready(function(){
      $('#table-log').DataTable({
        "order": [ 1, 'desc' ],
        "stateSave": true,
        "stateSaveCallback": function (settings, data) {
          window.localStorage.setItem("datatable", JSON.stringify(data));
        },
        "stateLoadCallback": function (settings) {
          var data = JSON.parse(window.localStorage.getItem("datatable"));
          if (data) data.start = 0;
          return data;
        }
      });
      $('.table-container').on('click', '.expand', function(){
        $('#' + $(this).data('display')).toggle();
      });
      $('#delete-log').click(function(){
        return confirm('Are you sure?');
      });
    });
  </script>
@endsection
