

      <style>
         .table td { border: 0px !important; }
         .tooltip-inner { white-space:pre-wrap; max-width: 400px; }
     </style>

 <style type="text/css">
 /* The switch - the box around the slider */
        .switchround {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }
        /* Hide default HTML checkbox */
        .switchround input {display:none;}
        /* The slider */
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }
        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }
        input:checked + .slider {
          background-color: #2196F3;
        }
        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }
        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }        
        
        .nav-tabs>li>a:hover {
            background-color: grey;
            color: grey;
        } 
        .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus{
            background-color:grey;
            color:grey;
        }
          
        .table{
            font-size: 10px;
        }    
        
    </style>



@if(isset($filtervalues))
<div class="container" style="padding-top:70px;">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-justified" id="myTab">
                <li class="active">
                    <a style="color: black;" href="#dataToggle1" data-toggle="tab"><strong>Data Table</strong></a>
                </li>
                <li>
                    <a style="color: black;" href="#dataToggle2" data-toggle="tab"><strong>Summary Table</strong></a>
                </li>
            </ul>
        <div class="tab-content">
            <!-- Data Table Tab -->
            <div id="dataToggle1" class="tab-pane fade in active">
                <div class="panel panel-default">
                    {{-- <!-- Export Data Table -->
                    <div class="panel-heading" > 
                     <a href="{{ URL::to('getExport') }}" class="btn " style="color:black">
                        <span style="margin: 5px 5px 0px 0px;" class="glyphicon glyphicon-save" ></span>Export Data Table</a>
                    </div>  --}}

                    <div class="panel-body">
                        @include('common.flash')
                            <div class="table-responsive">
                                <table class="table table-condensed table-striped cds-datatable" id="table1"> 
                                    <thead> <!-- Table Headings -->
                                        <th>
                                        School Name
                                        </th>
                                        <th>
                                        Instruction Staff
                                        </th>
                                        <th>
                                        Instructors per Thousand Students
                                        </th>
                                        <th>
                                        Admin and Professional Staff
                                        </th>
                                        <th>
                                        Admin and Professional Staff per Thousand
                                        </th>
                                        <th>
                                        Non-instruction Academic Staff
                                        </th>
                                        <th>
                                        Non-instruction Academic Staff per Thousand
                                        </th>
                                        <th>
                                        Non-admin Trade and Services Staff
                                        </th>
                                        <th>
                                        Non-admin Trade and Services Staff per Thousand
                                        </th>
                                        <th>
                                        All Instructors and Staff
                                        </th>
                                        <th>
                                        UG Student per Thousand Student
                                        </th>
                                        <th>
                                        Instructor Salary per Million
                                        </th>
                                        <th>
                                        Admin and Professional Staff Salary Per Million
                                        </th>
                                        <th>
                                        Non-instruction Academic Staff Salary per Million
                                        </th>
                                        <th>
                                        Non-admin Trade Service Staff Salary per Million
                                        </th>
                                        <th>
                                        Average SCH per Student per AY (undergrad)
                                        </th>
                                        <th>
                                        Average SCH per Student per AY (grad)
                                        </th>
                                        <th>
                                        Undergrad Degrees per Thousand
                                        </th>
                                        <th>
                                        Undergrad Certificate per Thousand
                                        </th>
                                        <th>
                                        Grad Degrees per Thousand
                                        </th>
                                        <th>
                                        Grad Certificate per Thousand
                                        </th>
                                        <th>
                                        Bachelor Degree 4-Yr Grad Rate
                                        </th>
                                        <th>
                                        Bachelor Degree 6-Yr Grad Rate
                                        </th>
                                        <th>
                                        Associate Degree and Certificate 3-Yr Grad Rate
                                        </th>                            
                                        <th>
                                        Loan Default Rate
                                        </th>
                                    </thead>
                                    <tbody> <!-- Table Body -->
                                        @foreach($filtervalues as $datatable)
                                            <tr>                                          
                                                <td class="table-text" style="font-size:10px;">
                                                    {{$datatable['school_name']}}
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['instruction_staff'] }} 
                                                </td>           
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['instructors_per_thousand_student'] }} 
                                                </td>            
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['admin_professional_staff'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['adminprofessionalstaff_salarypermillion'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['noninstruction_academicstaff'] }} 
                                                </td>                                                 
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['noninstruction_academicstaff_perthousandstudent'] }} 
                                                </td>  
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['nonadmin_trade_servicestaff'] }} 
                                                </td>                                                  
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['nonadmin_tradeservicestaff_perthousandstudent'] }} 
                                                </td>     
                                                <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['all_instructors_staff'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['ug_student_perthousandstudent'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['instructor_salarypermillion'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                   {{ $datatable['adminprofessionalstaff_salarypermillion'] }}   
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                   {{ $datatable['noninstruction_academicstaff_salarypermillion'] }}   
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['nonadmin_tradeservicestaff_salarypermillion'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['ug_average_sch_studentperay'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['grad_average_sch_studentperay'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['ug_degrees_perthousand_ugstudent'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['ug_certi_perthousand_ugstudent'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['graddegree_perthousandgradstudent'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['grad_certi_perthousand_gradstudent'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['bachelordegree_4yeargradrate'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['bachelordegree_6yeargradrate'] }} 
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['associatedegree_certi3yeargradrate'] }} 
                                                </td>
                                                <!-- <td class="table-text" style="font-size:10px;"> -->
                                                <td class="table-text" style="width:25px">
                                                    {{ $datatable['loan_default_rate'] }} 
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
       


            <!-- Summary Tab -->
            <div id="dataToggle2" class="tab-pane fade">
            <div class="panel panel-default">
            <div class="panel-body">
              @include('common.flash')
                <div class="table-responsive">
                    <table class="table table-condensed cds-datatable" id="table1">
                      <thead> <!-- Table Headings -->
                      <th style="font-size:10px;">
                                        School Name
                                        </th>
                                        <th style="font-size:10px;">
                                        Undergrad HeadCount
                                        </th>
                                        <th style="font-size:10px;">
                                        Admin Count
                                        </th>
                                        <th style="font-size:10px;">
                                        Instructor Count
                                        </th>
                                        <th style="font-size:10px;">
                                        Admin Salary per Million
                                        </th>
                                        <th style="font-size:10px;">
                                        Instructor Salary per Million
                                        </th>
                                        <th style="font-size:10px;">
                                        Admins per Thousand Students
                                        </th>
                                        <th style="font-size:10px;">
                                        Instructors per Thousand Students
                                        </th>
                                        <th style="font-size:10px;">
                                        Graduation Rate (4 year)
                                        </th>
                                        <th style="font-size:10px;">
                                        Graduation Rate (6 year)
                                        </th>
                                        <th style="font-size:10px;">
                                        Degrees per Thousand Students</th>
                                        <th style="font-size:10px;">
                                        Average SCH per Student per AY
                                        </th>
                                        <th style="font-size:10px;">
                                        Loan Default Rate
                                        </th>
                        </thead>
                        <tbody>
                           @foreach($filtervalues as $datatable)
                                            <tr>

                                                <td class="table-text" style="font-size:10px;"></td>
                                                <td class="table-text" style="font-size:10px;">
                                                    
                                                </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                    
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                    
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                    
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                     
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                     
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                    
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                      
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                  
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                   
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                      
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                    
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
        </div>
    </div>

@endif


{{-- <script>
         $(document).ready(function() {
             $('table.cds-datatable').on( 'draw.dt', function () {
                 $('tr').tooltip({html: true, placement: 'auto' });
             } );
 
             $('tr').tooltip({html: true, placement: 'auto' });
        }
</script> --}}