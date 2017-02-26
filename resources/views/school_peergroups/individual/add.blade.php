@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {!! Form::open(array('route'=>'school_peergroup_index_url', 'class'=>'form')) !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                          <h4>{{ $heading }}</h4>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="panel-default pull-left"> </div>
                            </div>                             
                            <div class="col-md-8 pull-right">
                              <div class="panel-default pull-right">
                              {!! Form::button('<i class="fa fa-btn fa-forward"></i>Next', ['type' => 'submit', 'class' => 'btn btn-primary']) !!} 
                              </div>
                            </div> 
                          </div>                 
                    </div>
                    <div class="panel-body">
                        @include('common.flash')

{{ dd($schools) }}
                        @if (count($schools) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                    <th>UID</th><th>ID</th><th>Name</th><th>State</th><th>Actions</th>
                                </thead>
                                <tbody> <!-- Table Body -->

                                @foreach ($schools as $school)
                                        <tr>
{{ dd($school) }}
<!--                                             <td class="table-text">{{ $school['unit_id'] }}</td>
                                            <td class="table-text">{{ $school['school_name'] }}</td>
                                            <td class="table-text">
                                                delete
                                            </td> -->
                                        </tr>                                    
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <div class="panel-body"><h4>No Institutions Found</h4></div>
                        @endif 
                    </div>
                </div>
                {!! Form::close() !!}
                
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script>
        $(document).ready(function($) {
            $('select').select2();
        });

        function validateOnSave() {
            var rc = true;
            if ($("select#sb_id").val() === "") {
                alert("Please select a Type");
                rc = false;
            } else if ($("input#x_number").val() === "") {
                alert("Please input a X-number");
                rc = false;
            }
            return rc;
        }

    </script>

@endsection

