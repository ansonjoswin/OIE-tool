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



class TestDataController extends Controller
{

 public function __construct()
    {
        //Defines resource drop down list
        $xaxis_options = collect([''=>'Select Resource',
            'all_instructors_staff'=>'Employees',
            'admin_professional_staff'=>'Administration',
            'instruction_staff'=>'Instructors',
            'adminprofessionalstaff_salarypermillion'=>'Administration Salary Per Million',
            'instructor_salarypermillion'=>'Instructor Salary Per Million',
            'admin_professionalstaff_perthousandstudent'=>'Admin per Thousand Students',
            'instructors_per_thousand_student'=>'Instructors per Thousand Students'
        ]);
        $this->xaxis_options = $xaxis_options;

        //Defines performance drop down list
        $yaxis_options = collect([''=>'Select Performance',
            'grad_average_sch_studentperay'=>'Average SCH per Student per AOI',
            'bachelordegree_4yeargradrate'=>'Graduation Rate (4 year)',
            'bachelordegree_6yeargradrate'=>'Graduation Rate (6 year)',
            'ug_student_perthousandstudent'=>'Bachelor\'s Degrees per Thousand Students',
            'loan_default_rate'=>'Student Loan Default Rate'
        ]);
        $this->yaxis_options = $yaxis_options;

        //Get list of available years that have been loaded into data tables
        $this->viewData['avail_years'] = DataTable::distinct()->pluck('year')->toArray();
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

        $sel_pg = 'test';
        //Get list of available peerGroups
        $this->viewData['peerGroups'] = $this->getPeerGroups();

        //Get list of available years
        $sel_year = 2014;
        $this->viewData['sel_year'] = $sel_year;

        //Get list of available resource and performance drop down options
        $this->viewData['xaxis_options'] = $this->xaxis_options;
        $this->viewData['yaxis_options'] = $this->yaxis_options;

        //Get selected resource parameter
        $sel_xaxis = 'all_instructors_staff';
        $this->viewData['sel_xaxis'] = $sel_xaxis;

        //Get selected performance parameter
        $sel_yaxis = 'grad_average_sch_studentperay';
        $this->viewData['sel_yaxis'] = $sel_yaxis;  
        
        $sel_pgid = PeerGroup::where('PeerGroup_Name','=',$sel_pg)
                   ->pluck('PeerGroup_ID');
        
        $sel_school_ids = PeerGroup::find($sel_pgid)->school()->pluck('school_id')->toArray();

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

        //Get selected performance parameter
        $sel_yaxis = $request['sel_yaxis'];
        $this->viewData['sel_yaxis'] = $sel_yaxis;        

        //Get list of schools based on selected peerGroup
        $sel_pgid = $request['sel_pgid'];
        $sel_school_ids = PeerGroup::find($sel_pgid)->school()->pluck('school_id')->toArray();

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
}
