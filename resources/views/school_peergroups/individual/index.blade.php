@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                          <h4>{{ $heading }}</h4>
                          <div class="row">
                            <div class="col-md-10 pull-left">
                              <div class="panel-default pull-left"> 
                                    <div>
                                    </div>
                              </div>
                            </div>                             
                            <div class="col-md-2 pull-right">
                              <div class="panel-default pull-right">
                              </div>
                            </div> 
                          </div>                 
                    </div>    
                    <div class="panel-body">
                        @include('common.flash')
                        @if (count($schools) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped cds-datatable">
                                <thead> <!-- Table Headings -->
                                    <th>UID</th><th>ID</th><th>Name</th><th>State</th><th>Actions</th>
                                </thead>
                                <tbody> <!-- Table Body -->

                                @foreach ($schools as $school)
                                        <tr>
                                            <td class="table-text">{{ $school->School_ID}}</td>
                                            <td class="table-text">{{ $school->Unit_ID}}</td>
                                            <td class="table-text">{{ $school->School_Name}}</td>
                                            <td class="table-text">{{ $school->School_State}}</td>
                                            <td class="table-text">
                                                delete
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

                </div>
            </div>
        </div>
    </div>
@endsection




