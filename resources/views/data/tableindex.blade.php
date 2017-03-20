@extends('layouts.app')
 
 @section('content')
 
 <div class="container">
             <div class="form-group pull-right" style="padding-top: 500px;">
                     <label>PeerGroup Category</label><br>
                     
                         {{ Form::select('peergroup', $peergroup_list, ['id' => 'instcat']) }}
                      </div>
           </div>
    
     <div class="container" style="padding-top:70px;">
    
         <div class="row">
             <div class="col-md-12">
                 <div class="panel panel-default ">
                     <div class="panel-heading" > 
                      {{-- <div class="btn-group pull-left" style="padding-bottom:10px"> --}}
                        <a href="{{ URL::to('getExport') }}" class="btn " style="color:black"><span style="margin: 5px 5px 0px 0px;" class="glyphicon glyphicon-save" ></span>Export Data Table</a>
                       {{--  </div> --}}
                     </div>
                     <div class="panel-body">
                         @include('common.flash')
                        
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped cds-datatable">
                                     <thead> <!-- Table Headings -->
                                     <th style="font-size:10px;">School Name</th>
                                     <th style="font-size:10px;">Undergrad HeadCount</th>
                                     <th style="font-size:10px;">Admin Count</th>
                                     <th style="font-size:10px;">Instructor Count</th>
                                     <th style="font-size:10px;">Admin Salary per Million</th>
                                     <th style="font-size:10px;">Instructor Salary per Million</th>
                                     <th style="font-size:10px;">Admins per Thousand Students</th>
                                     <th style="font-size:10px;">Instructors per Thousand Students</th>
                                     <th style="font-size:10px;">Graduation Rate (4 year)</th>
                                     <th style="font-size:10px;">Graduation Rate (6 year)</th>
                                     <th style="font-size:10px;">Degrees per Thousand Students</th>
                                     <th style="font-size:10px;">Average SCH per Student per AY</th>
                                     <th style="font-size:10px;">Loan Default Rate</th>
                                     </thead>
                                     <tbody> <!-- Table Body -->
                                     
                                        
                                          @foreach($datatables as $datatable)
                                           <tr>
                                           <td class="table-text" style="font-size:10px;">
                                               <div>
                                                   {{'School Name'}}
                                               </div>
                                           </td>
                                              <td class="table-text" style="font-size:10px;">
                                             <div>{{ $datatable->ug_headcount }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                            <div>{{ $datatable->admin_count }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                             <div>{{ $datatable->inst_count }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                             <div>{{ $datatable->admin_sal }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                             <div>{{ $datatable->inst_sal }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                           <div>{{ $datatable->admin_stu }}</a> </div>  
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                            <div>{{ $datatable->inst_stu }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                             <div>{{ $datatable->grad_rate4 }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                             <div>{{ $datatable->grad_rate6 }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                             <div>{{ $datatable->deg_stu }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                             <div>{{ $datatable->avg_sch_stu }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:10px;">
                                            <div>{{ $datatable->loan_rate }}</a> </div>
                                         </td>
 
                                         </tr>
                                          @endforeach
                                     
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