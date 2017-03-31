<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graduation;
use App\PeerGroup;
use App\DataTable;
//use App\School_PeerGroup;
use DB;
use Illuminate\Routing\Controller;
use Auth;


class DataVisualController extends Controller
{
    public function __construct()
    {
        //Defines resource drop down list
        $xaxis_options = collect([''=>'Select Resource', 
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
        ]);
        $this->xaxis_options = $xaxis_options;

        //Defines performance drop down list
        $yaxis_options = collect([''=>'Select Performance',
            'ug_average_sch_studentperay'=>'Average SCH per Student per AY (undergrad)',
            'grad_average_sch_studentperay'=>'Average SCH per Student per AY (graduate)',
            'ug_degrees_perthousand_ugstudent'=>'Undergrad Degrees per Thousand Undergrad Students',
            'ug_certi_perthousand_ugstudent'=>'Undergrad Certificates per Thousand Undergrad Students',
            'graddegree_perthousandgradstudent'=>'Graduate Degrees per Thousand Graduate Students', 
            'grad_certi_perthousand_gradstudent'=>'Graduate Certificates per Thousand Graduate Students',
            'bachelordegree_4yeargradrate'=>'Bachelor Degree 4-Yr Graduation Rate', 
            'bachelordegree_6yeargradrate'=>'Bachelor Degree 6-Yr Graduation Rate', 
            'associatedegree_certi3yeargradrate'=>'Associate Degree and Certificate 3-Yr Graduation Rate',
            'loan_default_rate'=>'Loan Default Rate' 
        ]);
        $this->yaxis_options = $yaxis_options;

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
        //Get list of available peerGroups
    	$this->viewData['peerGroups'] = $this->getPeerGroups();

        //Get list of available resource and performance drop down options
        $this->viewData['xaxis_options'] = $this->xaxis_options;
        $this->viewData['yaxis_options'] = $this->yaxis_options;

        //Get scatterplot data (empty on first load)
        $test_data = '';
        $this->viewData['test_data'] = json_encode($test_data);

        //Call view
    	return view('data.index',$this->viewData);
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
        $sel_school_ids = DB::table('peergroup_school')
            ->whereIn('PeerGroup_ID', [$sel_pgid])
            ->pluck('school_id');
        $this->viewData['sel_pgid'] = $sel_pgid;

/*******************************This table is not available in the final migration**************/

        var_dump($sel_school_ids);

        //Get scatterplot data based on list of schools
        // $test_data = Graduation::select('school_id','GradRate4yr_BacDgr100','GradRate6yr_BacDgr150')
        // 	->whereIn('school_id',[$sel_school_ids])
        // 	->get();

        $this->viewData['test_data'] = json_encode($test_data);

        //Call view
    	return view('data.index',$this->viewData);
    }  

      
}
