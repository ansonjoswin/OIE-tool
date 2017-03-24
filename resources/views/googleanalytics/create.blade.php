@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['url'=>'/peergroups/', 'class'=>'form-horizontal']) !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                          <div><h4>Create Peer Group</h4></div>
                          @if (count($schools) > 0)
                          <div class="row">
                                <div class="col-md-10">
                                        <div class="panel-default pull-left col-md-2"> 
                                        {!! Form::label('pg_name_lbl', 'Name:', ['class' => 'col-md-3 control-label']) !!}
                                        </div>
                                        <div class="panel-default pull-left col-md-8"> 
                                        {!! Form::text('pg_name', null, ['class' => 'col-md-6 form-control', 'required' => 'required']) !!}                
                                      </div>
                                </div>                             
                                <div class="col-md-2 pull-right">
                                      <div class="panel-default pull-right">
                                      {!! Form::button('<i class="fa fa-btn fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-primary']) !!} 
                                      </div>
                                </div> 
                          </div>
                          @endif                  
                    </div>
                    <div class="panel-body">
                        @include('common.flash')
                        @if (count($schools) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead> <!-- Table Headings -->
                                        <th>Unit ID</th>
                                        <th>Institution Name</th>
                                        <th></th>
                                    </thead>
                                    <tbody> <!-- Table Body -->                                
                                    @foreach ($schools as $school)
                                            <tr>
                                                <td class="table-text">{{ $school->Unit_Id }}</td>
                                                <td class="table-text">{{ $school->School_Name }}</td>
                                                <td class="table-text">
                                                {!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['type'=>'submit', 'class'=>'btn btn-danger']) !!}
                                                </td>
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
    <style>
        .table td { border: 0px !important; }
        .tooltip-inner { white-space:pre-wrap; max-width: 400px; }
    </style>

    <script>
        $(document).ready(function() {
            $('table.cds-datatable').on( 'draw.dt', function () {
                $('tr').tooltip({html: true, placement: 'auto' });
            } );

            $('tr').tooltip({html: true, placement: 'auto' });
        } );
    </script>
@endsection