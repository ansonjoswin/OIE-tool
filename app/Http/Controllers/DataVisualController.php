<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graduation;
use App\PeerGroup;
use App\School_PeerGroup;
use DB;
use Illuminate\Routing\Controller;




class DataVisualController extends Controller
{
    public function __construct()
    {
        $xaxis_options = collect([''=>'Select Resource', 
            'inst'=>'Instructors',
            'inst_1000'=>'Instructors per Thousand Students',
            'admin'=>'Admin and Professional Staff',
            'admin_1000'=>'Admin and Professional Staff per Thousand Students',
            'noninst'=>'Non-Instruction Academic Staff',
            'noninst_1000'=>'Non-Instruction Acadmic Staff per Thousand Students',
            'nonadmin'=>'Non-Admin Trade and Service Staff',
            'nonadmin_1000'=>'Non-Admin Trade and Service Staff per Thousand Students',
            'all'=>'All Instructors and Staff',
            'undergrad_1000'=>'Undergrad Students per Thousand Students',
            'totl_salary'=>'Total Salary',
            'admin_salary'=>'Admin Salary',
            'inst_salary'=>'Instructor Salary',
            'inst_salary_mill'=>'Instructor Salary per Million',
            'admin_staff_salary_mill'=>'Admin and Professional Staff Salary per Million',
            'noninst_salary_mill'=>'Non-Instruction Academic Staff Salary per Million',
            'nonadmin_salary_mill'=>'Non-Admin Trade and Service Staff Salary per Million'
        ]);
        $this->xaxis_options = $xaxis_options;

        $yaxis_options = collect([''=>'Select Performance',
            'avg_sch_undergrad'=>'Average SCH per Student per AY (undergrad)',
            'avg_sch_grad'=>'Average SCH per Student per AY (graduate)',
            'undergrad_degrees_1000'=>'Undergrad Degrees per Thousand Undergrad Students',
            'undergrad_cert_1000'=>'Undergrad Certificates per Thousand Undergrad Students',
            'grad_degrees_1000'=>'Graduate Degrees per Thousand Graduate Students', 
            'grad_cert_1000'=>'Graduate Certificates per Thousand Graduate Students',
            'bach_grad_rate_4'=>'Bachelor Degree 4-Yr Graduation Rate', 
            'bach_grad_rate_6'=>'Bachelor Degree 6-Yr Graduation Rate', 
            'assoc_grad_rate_4'=>'Associate Degree and Certificate 3-Yr Graduation Rate',
            'default_rate'=>'Default Rate' 
        ]);
        $this->yaxis_options = $yaxis_options;
    }


    public function index()
    {
    	$peerGroups = PeerGroup::where('PriPubFlg','=','public')->pluck('PeerGroupName','PeerGroupID')->toArray();
    	$this->viewData['peerGroups'] = $peerGroups;

        $test_data = '';
        $this->viewData['test_data'] = json_encode($test_data);
        $this->viewData['xaxis_options'] = $this->xaxis_options;
        $this->viewData['yaxis_options'] = $this->yaxis_options;
    	return view('data.index',$this->viewData);
    }

    public function refresh(Request $request)
    {
    	$sel_pgid = $request['sel_pgid'];
    	$sel_school_ids = DB::table('school_peergroups')->whereIn('PeerGroupID', [$sel_pgid])->pluck('School_ID');
    	$this->viewData['sel_pgid'] = $sel_pgid;

    	$sel_year = $request['sel_year'];
    	$this->viewData['sel_year'] = $sel_year;

        $this->viewData['xaxis_options'] = $this->xaxis_options;
        $this->viewData['yaxis_options'] = $this->yaxis_options;        

    	$sel_xaxis = $request['sel_xaxis'];
    	$this->viewData['sel_xaxis'] = $sel_xaxis;

        $sel_yaxis = $request['sel_yaxis'];
        $this->viewData['sel_yaxis'] = $sel_yaxis;        

    	$peerGroups = PeerGroup::where('PriPubFlg','=','public')->pluck('PeerGroupName','PeerGroupID')->toArray();
    	$this->viewData['peerGroups'] = $peerGroups;

        $test_data = Graduation::select('school_id','GradRate4yr_BacDgr100','GradRate6yr_BacDgr150')
        	->whereIn('school_id',[$sel_school_ids])
        	->get();
        $this->viewData['test_data'] = json_encode($test_data);
    	return view('data.index',$this->viewData);
    }    
}
