<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graduation;
use App\PeerGroup;
//use App\School_PeerGroup;
use DB;
use Illuminate\Routing\Controller;
use Auth;



class TestDataController extends Controller
{

 public function __construct()
    {
        //Defines resource drop down list
        $xaxis_options = collect([''=>'stEnrl', 
            'year'=>'year',
            'Graduation_ID'=>'Graduation_ID'
        ]);
        $this->xaxis_options = $xaxis_options;

        //Defines performance drop down list
        $yaxis_options = collect([''=>'stEnrl', 
            'year'=>'year',
            'Graduation_ID'=>'Graduation_ID'
        ]);
        $this->yaxis_options = $yaxis_options;
    }


   
    private static function getPeerGroups()
    {
        //If logged in, user can see public and private peergroups
        if (Auth::user() != null) {
            $peerGroups = PeerGroup::where('private_public_flag','=','public')
                ->orWhere('user_id', '=', Auth::user()->id)
                ->pluck('PeerGroup_Name','PeerGroup_ID')->toArray();
                echo("status:success");
        //If not logged in, user can only see public peergroups
        }else{
            $peerGroups = PeerGroup::where('private_public_flag','=','public')
                ->pluck('PeerGroup_Name','PeerGroup_ID')->toArray();
                echo ("status:success");
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
        $sel_school_ids = DB::table('peergroup_school')
            ->whereIn('PeerGroup_ID', [$sel_pgid])
            ->pluck('school_id');
        $this->viewData['sel_pgid'] = $sel_pgid;

/*******************************This table is not available in the final migration**************/

        dd($sel_school_ids);

        //Get scatterplot data based on list of schools
        // $test_data = Graduation::select('school_id','GradRate4yr_BacDgr100','GradRate6yr_BacDgr150')
        //  ->whereIn('school_id',[$sel_school_ids])
        //  ->get();

        $this->viewData['test_data'] = json_encode($test_data);

        //Call view
        return view('data.test',$this->viewData);
    }  

      
}
