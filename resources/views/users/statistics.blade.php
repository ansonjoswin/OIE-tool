@extends('layouts.app')
 
 @section('content')
     <div class="container">
         <div class="row">
             <div class="col-md-8 col-md-offset-2">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <div><h4>User Statistics</h4></div>
                     </div>
                     <div class="panel-body">
                         @include('common.flash')
                         
                         <div class="table-responsive">
                             <table class="table table-bordered table-striped cds-datatable">
                                 <thead> <!-- Table Headings -->
                                 {{--<th>User</th><th>Email</th><th>Status</th><th class="no-sort">Actions</th>--}}
                                 <th>Affiliation</th><th>Count</th>
                                 </thead>
                                 <tbody> <!-- Table Body -->
 
                                 
                                     <tr>
                                     <td>Higher Education</td>
                                     <td>{{$totals['higheredu']}}</td>
                                     </tr>
                                     <tr>
                                     <td>Journalism</td>
                                     <td>{{$totals['journalism']}}</td>
                                     </tr>
                                     <tr>
                                     <td>Policy Analyst</td>
                                     <td>{{$totals['policyanalyst']}}</td>
                                     </tr>
                                     <tr>
                                     <td>Government</td>
                                     <td>{{$totals['government']}}</td>
                                     </tr>
                                     <tr>
                                     <td>Accreditation</td>
                                     <td>{{$totals['acreditation']}}</td>
                                     </tr>
 
                              
                                 </tbody>
                             </table>
                         </div>
                        
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