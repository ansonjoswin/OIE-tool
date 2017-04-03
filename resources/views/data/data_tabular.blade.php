

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
                    <!-- <div id="test_output">test output - {{ $filtervalues->count() }}</div> -->
                    <!-- Export Data Table -->
                    <div class="panel-heading" > 
                        {!! Form::open(['route'=>'exportdata', 'class'=>'form-horizontal']) !!}
                        {!! Form::hidden('pgid', $dataTable_pgid) !!}
                        {!! Form::button('<i class="fa fa-btn fa-download"></i>Export Data', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div> 
                    <div class="panel-body">
                        @include('common.flash')
                            <div class="table-responsive">
                                <table class="table table-condensed" id="table1">    <!-- cds-datatable table-striped-->
                                    <thead> <!-- Table Headings -->
                                        <!-- <tr class="headerRow"> -->
                                        <th id="th0" onclick="sortTable(0)">
                                        School Name<span id="span_0"><i class='fa fa-sort-amount-asc'></i></span>
                                        </th>
                                        <th id="th1" onclick="sortTable(1)">
                                        Instructors<span id="span_1"></span>
                                        </th>
                                        <th id="th2" onclick="sortTable(2)">
                                        Instructors per Thousand Students<span id="span_2"></span>
                                        </th>
                                        <th id="th3" onclick="sortTable(3)">
                                        Admin and Professional Staff<span id="span_3"></span>
                                        </th>
                                        <th id="th4" onclick="sortTable(4)">
                                        Admin and Professional Staff per Thousand Students<span id="span_4"></span>
                                        </th>
                                        <th id="th5" onclick="sortTable(5)">
                                        Non-instruction Academic Staff<span id="span_5"></span>
                                        </th>
                                        <th id="th6" onclick="sortTable(6)">
                                        Non-instruction Academic Staff per Thousand Students<span id="span_6"></span>
                                        </th>
                                        <th id="th7" onclick="sortTable(7)">
                                        Non-admin Trade and Services Staff<span id="span_7"></span>
                                        </th>
                                        <th id="th8" onclick="sortTable(8)">
                                        Non-admin Trade and Services Staff per Thousand Students<span id="span_8"></span>
                                        </th>
                                        <th id="th9" onclick="sortTable(9)">
                                        All Instructors and Staff<span id="span_9"></span>
                                        </th>
                                        <th id="th10" onclick="sortTable(10)">
                                        Undergraduate Student per Thousand Students<span id="span_10"></span>
                                        </th>
                                        <th id="th11" onclick="sortTable(11)">
                                        Instructor Salary per Million<span id="span_11"></span>
                                        </th>
                                        <th id="th12" onclick="sortTable(12)">
                                        Admin and Professional Staff Salary Per Million<span id="span_12"></span>
                                        </th>
                                        <th id="th13" onclick="sortTable(13)">
                                        Non-instruction Academic Staff Salary per Million<span id="span_13"></span>
                                        </th>
                                        <th id="th14" onclick="sortTable(14)">
                                        Non-admin Trade Services Staff Salary per Million<span id="span_14"></span>
                                        </th>
                                        <th id="th15" onclick="sortTable(15)">
                                        Average SCH per Student per AY (undergrad)<span id="span_15"></span>
                                        </th>
                                        <th id="th16" onclick="sortTable(16)">
                                        Average SCH per Student per AY (grad)<span id="span_16"></span>
                                        </th>
                                        <th id="th17" onclick="sortTable(17)">
                                        Undergrad Degrees per Thousand Undergrad Students<span id="span_17"></span>
                                        </th>
                                        <th id="th18" onclick="sortTable(18)">
                                        Undergrad Certificates per Thousand Undergrad Students<span id="span_18"></span>
                                        </th>
                                        <th id="th19" onclick="sortTable(19)">
                                        Graduate Degrees per Hundred Graduate Students<span id="span_19"></span>
                                        </th>
                                        <th id="th20" onclick="sortTable(20)">
                                        Graduate Certificates per Hundred Graduate Students<span id="span_20"></span>
                                        </th>
                                        <th id="th21" onclick="sortTable(21)">
                                        Bachelor Degree 4-Yr Graduation Rate<span id="span_21"></span>
                                        </th>
                                        <th id="th22" onclick="sortTable(22)">
                                        Bachelor Degree 6-Yr Graduation Rate<span id="span_22"></span>
                                        </th>
                                        <th id="th23" onclick="sortTable(23)">
                                        Associate Degree and Certificate 3-Yr Graduation Rate<span id="span_23"></span>
                                        </th>                        
                                        <th id="th24" onclick="sortTable(24)">
                                        Loan Default Rate<span id="span_24"></span>
                                        </th>
                                        <!-- </tr> -->
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
                                        Inst Count
                                        </th>
                                        <th style="font-size:10px;">
                                        Admin Sal per M
                                        </th>
                                        <th style="font-size:10px;">
                                        Inst Sal per M
                                        </th>
                                        <th style="font-size:10px;">
                                        Admin per Thou Students
                                        </th>
                                        <th style="font-size:10px;">
                                        Inst per Thou Students
                                        </th>
                                        <th style="font-size:10px;">
                                        Graduation Rate (4 yr)
                                        </th>
                                        <th style="font-size:10px;">
                                        Graduation Rate (6 yr)
                                        </th>
                                        <th style="font-size:10px;">
                                        Degrees per Thou Students</th>
                                        <th style="font-size:10px;">
                                        Avg SCH per Student per AY
                                        </th>
                                        <th style="font-size:10px;">
                                        LoanDflt Rate
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


<script>
        // controller.getElementById('MyButton').style.cursor = "pointer";
        // $('th').css('pointer');
        // document.table.th.style.cursor = "pointer";

         $(document).ready(function() {
             $('table.cds-datatable').on( 'draw.dt', function () {
                 $('tr').tooltip({html: true, placement: 'auto' });
             } );
 
             $('tr').tooltip({html: true, placement: 'auto' });

             colorTable();
        });


        function colorTable(){
            // Iterate through each row in the table and change its color depending on if its in top, middle, or bottom third          
            var counter = 0;
            // var totalcount = $('#table1 tr').length;
            // var totalcount = $('#school_count').val();
            var totalcount = <?php echo $filtervalues->count(); ?>;
            // $('#test_output').append(" - " +totalcount);
            var headerOffset = 1;
            var oneThird = totalcount / 3;
            var topThreshold = oneThird + headerOffset;
            var midThreshold = (oneThird *2) + headerOffset;
            var bottomThreshold = totalcount + headerOffset;
            $('tr').each(function () {
                // Ignore the first row
                if ( $(this).is(':first') == false ){
                    counter++;   
                    if(counter > 1 && counter <= topThreshold){
                        // console.log("top: "+counter);
                        $(this).css('background-color', '#cde7f0');
                    }else if(counter > topThreshold && counter <= midThreshold){
                        // console.log("mid: "+counter);
                        $(this).css('background-color', '#FFFFFF');
                    }else if (counter > midThreshold){
                        // console.log("bottom: "+counter);
                        $(this).css('background-color', '#f9b8bb');
                    }
                }    
            });
        };


    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("table1");
      switching = true;
      //Set the sorting direction to ascending:
      dir = "asc"; 
      /*Make a loop that will continue until
      no switching has been done:*/
      while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.getElementsByTagName("TR");
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
          //start by saying there should be no switching:
          shouldSwitch = false;
          /*Get the two elements you want to compare,
          one from current row and one from the next:*/
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          /*check if the two rows should switch place,
          based on the direction, asc or desc:*/
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch= true;
              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch= true;
              break;
            }
          }
        }
        if (shouldSwitch) {
          /*If a switch has been marked, make the switch
          and mark that a switch has been done:*/
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          //Each time a switch is done, increase this count by 1:
          switchcount ++; 
        } else {
          /*If no switching has been done AND the direction is "asc",
          set the direction to "desc" and run the while loop again.*/
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }

      if(dir == "asc"){
        // <i class="fa fa-sort-asc"></i>
        $("th span").html("");
        $("#th"+n+ " #span_"+n).html("<i class='fa fa-sort-amount-asc'></i>");
      }else{
        // <i class="fa fa-sort-desc"></i>
        $("#th"+n+ " #span_"+n).html("<i class='fa fa-sort-amount-desc'></i>");
      }

      colorTable();
    }


</script>