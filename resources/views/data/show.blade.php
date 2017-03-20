@extends('layouts.app')
 
 @section('content')
 <div class="container" style="padding-top:70px;">
     
         <div class="row">
             <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading" > Data Table
                     </div>
                     <div class="panel-body">
                         @include('common.flash')
                        
                             <div class="table-responsive">
                                 <table class="table table-bordered table-striped cds-datatable">
                                     <thead> <!-- Table Headings -->
                                     <th style="font-size:12px;">Undergrad HeadCount</th>
                                     <th style="font-size:12px;">Admin Count</th>
                                     <th style="font-size:12px;">Instructor Count</th>
                                     <th style="font-size:12px;">Admin Salary per Million</th>
                                     <th style="font-size:12px;">Instructor Salary per Million</th>
                                     <th style="font-size:12px;">Admins per Thousand Students</th>
                                     <th style="font-size:12px;">Instructors per Thousand Students</th>
                                     <th style="font-size:12px;">Graduation Rate (4 year)</th>
                                     <th style="font-size:12px;">Graduation Rate (6 year)</th>
                                     <th style="font-size:12px;">Degrees per Thousand Students</th>
                                     <th style="font-size:12px;">Average SCH per Student per AY</th>
                                     <th style="font-size:12px;">Loan Default Rate</th>
                                     </thead>
                                     <tbody> <!-- Table Body -->
                                     
                                         <tr>
                                          @foreach($datatables as $datatable)
                                              <td class="table-text" style="font-size:12px;">
                                             <div>{{ $datatable->ug_headcount }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
                                            <div>{{ $datatable->admin_count }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
                                             <div>{{ $datatable->inst_count }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
                                             <div>{{ $datatable->admin_sal }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
                                             <div>{{ $datatable->inst_sal }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
                                           <div>{{ $datatable->admin_stu }}</a> </div>  
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
                                            <div>{{ $datatable->inst_stu }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
                                             <div>{{ $datatable->grad_rate4 }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
                                             <div>{{ $datatable->grad_rate6 }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
                                             <div>{{ $datatable->deg_stu }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
                                             <div>{{ $datatable->avg_sch_stu }}</a> </div>
                                         </td>
                                         <td class="table-text" style="font-size:12px;">
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
 
 @endsection