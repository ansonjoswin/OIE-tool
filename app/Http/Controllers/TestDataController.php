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
        $xaxis_options = collect([''=>'Resource',
            'cohort_status8'=>'cohort_status8',
            'cohort_status13'=>'cohort_status13'
        ]);
        $this->xaxis_options = $xaxis_options;

        //Defines performance drop down list
        $yaxis_options = collect([''=>'Performance',
            'cohort_status8'=>'cohort_status8',
            'cohort_status13'=>'cohort_status13'
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
        $sel_xaxis = 'cohort_status8';
        $this->viewData['sel_xaxis'] = $sel_xaxis;

        //Get selected performance parameter
        $sel_yaxis = 'cohort_status13';
        $this->viewData['sel_yaxis'] = $sel_yaxis;  
        
        $sel_pgid = PeerGroup::where('PeerGroup_Name','=',$sel_pg)
                   ->pluck('PeerGroup_ID');
        
        $sel_school_ids = PeerGroup::find($sel_pgid)->school()->pluck('school_id')->toArray();

        $this->viewData['sel_pgid'] = $sel_pgid->toArray();
        $test_data = Student::whereIn('school_id',$sel_school_ids)->get();

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

/*******************************This table is not available in the final migration**************/

        $test_data = Student::whereIn('school_id',$sel_school_ids)->get();


    /*   foreach ($selected_parameter as $student  => $school_id ) {
            array_push($filtervalues, Student::where('school_id', $school_id->first()));
         }

*/


            //dd($test_data);
   /*     $selected_school_list = $selected_parameter->school()->pluck('name','school_id');
        //Get scatterplot data based on list of schools
      /*   $test_data = Student::find($sel_school_ids)->school()->pluck('school_id','cohort_status8','cohort_status13')->toArray();

       */

    


        $this->viewData['test_data'] = json_encode($test_data);

        //Call view
        return view('data.test',$this->viewData);
    }  

      
}
