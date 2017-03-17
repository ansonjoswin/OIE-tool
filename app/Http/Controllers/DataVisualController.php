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
    public function index()
    {
    	$peerGroups = PeerGroup::where('PriPubFlg','=','public')->pluck('PeerGroupName','PeerGroupID')->toArray();
    	$this->viewData['peerGroups'] = $peerGroups;

        $test_data = '';
        $this->viewData['test_data'] = json_encode($test_data);
    	return view('data.index',$this->viewData);
    }

    public function refresh(Request $request)
    {
    	$sel_pgid = $request['sel_pgid'];
    	$sel_school_ids = DB::table('school_peergroups')->whereIn('PeerGroupID', [$sel_pgid])->pluck('School_ID');
    	$this->viewData['sel_pgid'] = $sel_pgid;

    	$sel_year = $request['sel_year'];
    	$this->viewData['sel_year'] = $sel_year;

    	$sel_xaxis = $request['sel_xaxis'];
    	$this->viewData['sel_xaxis'] = $sel_xaxis;

    	$peerGroups = PeerGroup::where('PriPubFlg','=','public')->pluck('PeerGroupName','PeerGroupID')->toArray();
    	$this->viewData['peerGroups'] = $peerGroups;

        $test_data = Graduation::select('school_id','GradRate4yr_BacDgr100','GradRate6yr_BacDgr150')
        	->whereIn('school_id',[$sel_school_ids])
        	->get();

        $this->viewData['test_data'] = json_encode($test_data);
    	return view('data.index',$this->viewData);
    }    
}
