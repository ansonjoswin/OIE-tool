<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graduation;
use App\PeerGroup;
use App\School_PeerGroup;
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


    public function index()
    {
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

    
    private static function getPeerGroups()
    {
        //If logged in, user can see public and private peergroups
        if (Auth::user() != null) {
            $peerGroups = PeerGroup::where('PriPubFlg','=','public')
                ->orWhere('User_ID', '=', Auth::user()->id)
                ->pluck('PeerGroupName','PeerGroupID')->toArray();
        //If not logged in, user can only see public peergroups
        }else{
            $peerGroups = PeerGroup::where('PriPubFlg','=','public')
                ->pluck('PeerGroupName','PeerGroupID')->toArray();
        }
        return $peerGroups;        
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
        $sel_school_ids = School_PeerGroup::whereIn()
            ->whereIn('PeerGroupID', [$sel_pgid])
            ->pluck('School_ID');
        $this->viewData['sel_pgid'] = $sel_pgid;

        //Get scatterplot data based on list of schools
        $test_data= Graduation::select('stEnrl','year','Graduation_ID')
          ->whereIn('school_id',[2,5,6])
          ->get()->toArray();

            dd($test_data); 
        $this->viewData['test_data'] = json_encode($test_data);
  
        //Call view
      return view('data.test',$this->viewData);
    }    

}
