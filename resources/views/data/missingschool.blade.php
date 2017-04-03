    @extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-right">
                                <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                            </div>
                            <div><h4>Missing schools for the selection criteria</h4></div>
                        </div>
                        <div class="panel-body">

                           {!! Form::open(['method' => 'POST','id'=>'missing-schools','url'=>['missingschool']]) !!}
                            @include('common.flash')
                         
                            @if (count($missing_schools) > 0)
                           
                           <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead> <!-- Table Headings -->
                                        <th>School Names</th>
                                    </thead>
                                    <tbody> <!-- Table Body -->

                                    @foreach ($missing_schools as $sch=>$school_name)
                                      
                                        <tr>
                                            <td class="table-text">
                                                <div>{{ $school_name}}</div>                                                                       
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="panel-body"><h4>No Missing schools found</h4></div>
                            @endif
                        </div>
                    </div>
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