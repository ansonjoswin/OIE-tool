@extends('layouts.app')
 
 @section('content')

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

/*  #table1 tr:nth-of-type(3n+3) {
    background: red;
  }*/
  /*#table1 tr:nth-of-type(2) {
    background: blue;
  }
  #table1 tr:nth-of-type(3) {
    background: green;
  }*/

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
    </style>

<meta name="csrf-token" content="{{ csrf_token() }}"> 
 <div class="container">
    {!! Form::open(['method' => 'POST','id'=>'peergroup','url'=>['datadisplay']]) !!}
        <div class="form-group pull-right">
            <label>PeerGroup Category</label><br>
            <select name="peergroup_id" onchange="this.form.submit()">
                <option>----Please Select a Value-----</option>
                @foreach($peergroup_list as $peergroupId => $peergroupName)
                    <option value="{{$peergroupId}}">{{$peergroupName}}</option>
                @endforeach
            </select>
            {{-- {{ Form::select('peergroup', $peergroup_list, ['onchange' => 'this.form.submit()']) }} --}}
        </div>
    {!! Form::close() !!}
</div>
 {{-- <div class="container">
    {!! Form::open(['method' => 'POST','id'=>'export','url'=>['getexport']]) !!}
        <div class="form-group pull-right">
            <label>Export to Excel</label><br>
            <input type="hidden" name="peergroup_id" onchange="this.form.submit()">
            <a href="{{ URL::to('getExport') }}" class="btn " style="color:black">
                        <span style="margin: 5px 5px 0px 0px;" class="glyphicon glyphicon-save" ></span>Export Data Table</a>
        </div>
    {!! Form::close() !!}
</div> --}}

@if($displayTable)
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
            <div id="dataToggle1" class="tab-pane fade in active">
                <div class="panel panel-default">
                    <div class="panel-heading" > 
                     <a href="{{ URL::to('getExport') }}" class="btn " style="color:black">
                        <span style="margin: 5px 5px 0px 0px;" class="glyphicon glyphicon-save" ></span>Export Data Table</a>
                    </div>
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
                                    <tbody> <!-- Table Body -->
                                        @foreach($filtervalues as $datatable)
                                            <tr>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{$datatable['school_name']}}
                                                </td>
                                                <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['ug_headcount'] }} 
                                                </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['admin_count'] }} 
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['inst_count'] }} 
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['admin_sal'] }} 
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['inst_sal'] }} 
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                   {{ $datatable['admin_stu'] }}   
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['inst_stu'] }} 
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['grad_rate4'] }} 
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['grad_rate6'] }} 
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['deg_stu'] }} 
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                     {{ $datatable['avg_sch_stu'] }} 
                                                 </td>
                                                 <td class="table-text" style="font-size:10px;">
                                                    {{ $datatable['loan_rate'] }} 
                                                 </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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

            // $('#btnFilter').on('click', function () {
            // var selected_peergroup_list = $("#instcat").val();
            // $.ajax({
            //         type: "GET",
            //         url: "/unoistoie-acbat/public/data",
            //         //EHLbug: how do I call the URL implicitly?
            //         data: {selected_peergroup_list:$("#instcat").val()},
            //         success: function(data) {
            //             //
            //         }
            //         });
            //  });
        }
     </script>

      
 @endsection 