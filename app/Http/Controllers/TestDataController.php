<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graduation;
use App\School;
use App\PeerGroup;
use App\Student;
use App\DataTable;
use DB;
use Illuminate\Routing\Controller;
use Auth;
use Excel;



class TestDataController extends Controller
{

public $xaxis_options = [''=>'Select Resource', 
            'instruction_staff'=>'Instructors',
            'instructors_per_thousand_student'=>'Instructors per Thousand Students',
            'admin_professional_staff'=>'Admin and Professional Staff',
            'admin_professionalstaff_perthousandstudent'=>'Admin and Professional Staff per Thousand Students',
            'noninstruction_academicstaff'=>'Non-Instruction Academic Staff',
            'noninstruction_academicstaff_perthousandstudent'=>'Non-Instruction Acadmic Staff per Thousand Students',
            'nonadmin_trade_servicestaff'=>'Non-Admin Trade and Service Staff',
            'nonadmin_tradeservicestaff_perthousandstudent'=>'Non-Admin Trade and Service Staff per Thousand Students',
            'all_instructors_staff'=>'All Instructors and Staff',
            'ug_student_perthousandstudent'=>'Undergrad Students per Thousand Students',
            'totl_salary'=>'Total Salary',
            'admin_salary'=>'Admin Salary',
            'instructor_salary'=>'Instructor Salary',
            'instructor_salarypermillion'=>'Instructor Salary per Million',
            'adminprofessionalstaff_salarypermillion'=>'Admin and Professional Staff Salary per Million',
            'noninstruction_academicstaff_salarypermillion'=>'Non-Instruction Academic Staff Salary per Million',
            'nonadmin_tradeservicestaff_salarypermillion'=>'Non-Admin Trade and Service Staff Salary per Million'
        ];

 public $yaxis_options = [''=>'Select Performance',
            'ug_average_sch_studentperay'=>'Average SCH per Student per AY (undergrad)',
            'grad_average_sch_studentperay'=>'Average SCH per Student per AY (graduate)',
            'ug_degrees_perthousand_ugstudent'=>'Undergrad Degrees per Thousand Undergrad Students',
            'ug_certi_perthousand_ugstudent'=>'Undergrad Certificates per Thousand Undergrad Students',
            'graddegree_perhundredgradstudent'=>'Graduate Degrees per Hundred Graduate Students', 
            'grad_certi_perhundred_gradstudent'=>'Graduate Certificates per Hundred Graduate Students',
            'bachelordegree_4yeargradrate'=>'Bachelor Degree 4-Yr Graduation Rate', 
            'bachelordegree_6yeargradrate'=>'Bachelor Degree 6-Yr Graduation Rate', 
            'associatedegree_certi3yeargradrate'=>'Associate Degree and Certificate 3-Yr Graduation Rate',
            'loan_default_rate'=>'Loan Default Rate' 
        ];

 public function __construct()
    {

        //Get list of available years that have been loaded into data tables
        $this->viewData['avail_years'] = DataTable::distinct()->pluck('year','year')->toArray();
      
    }

    private static function getPeerGroups()
    {
        //If logged in, user can see public and private peergroups
        if (Auth::user() != null) {
            $peerGroups = PeerGroup::where('private_public_flag','=','public')
                ->orWhere('user_id', '=', Auth::user()->id)
                ->pluck('PeerGroup_Name','PeerGroup_ID')->toArray();
        //If not logged in, user can only see public peergroups
        }else{
            $peerGroups = PeerGroup::where('private_public_flag','=','public')
                ->pluck('PeerGroup_Name','PeerGroup_ID')->toArray();
        }
        return $peerGroups;        
    }

                 
    public function index()
    {

        $sel_pg = 'DRU';
        //Get list of available peerGroups
        $this->viewData['peerGroups'] = $this->getPeerGroups();

        //Get list of available years
        $sel_year = DataTable::distinct()->orderBy('year','desc')->pluck('year')->first();
        $this->viewData['sel_year'] = $sel_year;

        //Get list of available resource and performance drop down options
        $this->viewData['xaxis_options'] = $this->xaxis_options;
        $this->viewData['yaxis_options'] = $this->yaxis_options;

        //Get selected resource parameter
        $sel_xaxis = 'instructors_per_thousand_student';
        $this->viewData['sel_xaxis'] = $sel_xaxis;

        //Get selected performance parameter
        $sel_yaxis = 'graddegree_perhundredgradstudent';
        $this->viewData['sel_yaxis'] = $sel_yaxis;  

        $xaxis_label= array_get($this->xaxis_options, $sel_xaxis);
         $yaxis_label= array_get($this->yaxis_options, $sel_yaxis);
          $this->viewData['xaxis_label'] = $xaxis_label;
          $this->viewData['yaxis_label'] = $yaxis_label;
        
        $sel_pgid = PeerGroup::where('PeerGroup_Name','=',$sel_pg)
                   ->pluck('PeerGroup_ID');

        $sel_school_ids = PeerGroup::find($sel_pgid)->school()->pluck('school_id')->toArray();

        // SchoolNames for the search type ahead
        $schoolNames = School::find($sel_school_ids)->pluck('id','name');
        $this->viewData['schoolNames'] = $schoolNames;

        $this->viewData['sel_pgid'] = $sel_pgid->toArray();
        $test_data = DataTable::whereIn('school_id',$sel_school_ids)->get();

        $this->viewData['test_data'] = json_encode($test_data);

        //Get the aggregated data for the tabular view
        $filtervalues = DataTable::all()->whereIn('school_id',$sel_school_ids);
        $this->viewData['filtervalues'] = $filtervalues;

        //Call view
        return view('data.test',$this->viewData);
    }

    public function refresh(Request $request)
    {
        //Get list of available peerGroups
        $this->viewData['peerGroups'] = $this->getPeerGroups();

        //Get list of available years
        $sel_year = $request['sel_year'];
        $this->viewData['sel_year'] = $sel_year;

        //Get list of available resource and performance drop down options
        $this->viewData['xaxis_options'] = $this->xaxis_options;
        $this->viewData['yaxis_options'] = $this->yaxis_options;        

        //Get selected resource parameter
        $sel_xaxis = $request['sel_xaxis'];
        $this->viewData['sel_xaxis'] = $sel_xaxis;
      //  dd($sel_xaxis);


        //Get selected performance parameter
        $sel_yaxis = $request['sel_yaxis'];
        $this->viewData['sel_yaxis'] = $sel_yaxis;   
    
         $xaxis_label= array_get($this->xaxis_options, $sel_xaxis);
         $yaxis_label= array_get($this->yaxis_options, $sel_yaxis);
          $this->viewData['xaxis_label'] = $xaxis_label;
          $this->viewData['yaxis_label'] = $yaxis_label;
        // dd($var);
     

        //Get list of schools based on selected peerGroup
        $sel_pgid = $request['sel_pgid'];
        $sel_school_ids = PeerGroup::find($sel_pgid)->school()->pluck('school_id')->toArray();

        // SchoolNames for the search type ahead
        $schoolNames = School::find($sel_school_ids)->pluck('id','name');
        $this->viewData['schoolNames'] = $schoolNames;
        
        //Get the aggregated data for the tabular view
        $filtervalues = DataTable::all()->whereIn('school_id',$sel_school_ids);
        $this->viewData['filtervalues'] = $filtervalues;
      
        //Call view
        $this->viewData['sel_pgid'] = $sel_pgid;

        $test_data = DataTable::whereIn('school_id',$sel_school_ids)->get();

        $this->viewData['test_data'] = json_encode($test_data);


        //Call view
        return view('data.test',$this->viewData);
    }  

    // public function getExport(){

    //     // $dataexport = DataTable::find(1);
    //     $dataexport = DataTable::all()->whereIn('school_id',1);
    //     // dd($dataexport);
               
    //     // Excel::create("UNO's Summary Data Table", function($excel) use($export){
    //     //  $excel->sheet('Summary Table', function($sheet) use($export){
    //     //      $sheet->fromArray($export);
    //     //  });
    //     // })->export('xlsx');

    //     return Excel::create('Filename', function($excel) use ($dataexport) {
    //         $excel->sheet('Sheetname', function($sheet) use ($dataexport) {
    //             // Sheet manipulation
    //             $sheet->fromArray($dataexport, null, 'A1', false, false);
    //         });
    //     })->export('xls');

        
    // }

}
