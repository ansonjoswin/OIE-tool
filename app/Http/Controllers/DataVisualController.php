<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graduation;
use App\PeerGroup;
use App\School_PeerGroup;
use DB;

class DataVisualController extends Controller
{
    public function index()
    {
    	$peerGroups = PeerGroup::select('PeerGroupID','PeerGroupName')->where('PriPubFlg','=','public')->get();
    	$this->viewData['peerGroups'] = $peerGroups;
    	// $pg_arr = PeerGroup::pluck('PeerGroupName','PeerGroupID')->where('PriPubFlg','=','public')->get();
    	$pg_arr = DB::table('peergroups')->where('PriPubFlg', 'public')->pluck('PeerGroupName','PeerGroupID');
    	$this->viewData['pg_arr'] = $pg_arr;
        $test_data = Graduation::select('school_id','GradRate4yr_BacDgr100','GradRate6yr_BacDgr150')->whereIn('school_id',[2,3,4,5,6,7,8])->get();
        $this->viewData['test_data'] = json_encode($test_data);
    	return view('data.index',$this->viewData);
    }

    public function refresh(Request $request)
    {
    	$sel_pgid = $request['sel_pgid'];
    	// $sel_school_ids = School_PeerGroup::whereIn('PeerGroupID',[$sel_pgid])->pluck('School_ID');
    	$sel_school_ids = DB::table('school_peergroups')->whereIn('PeerGroupID', [$sel_pgid])->pluck('School_ID');

    	$peerGroups = PeerGroup::select('PeerGroupID','PeerGroupName')->where('PriPubFlg','=','public')->get();

    	$this->viewData['peerGroups'] = $peerGroups;
    	$pg_arr = DB::table('peergroups')->where('PriPubFlg', 'public')->pluck('PeerGroupName','PeerGroupID');

    	$this->viewData['pg_arr'] = $pg_arr;
        $test_data = Graduation::select('school_id','GradRate4yr_BacDgr100','GradRate6yr_BacDgr150')
        	->whereIn('school_id',[$sel_school_ids])
        	->get();

        $this->viewData['test_data'] = json_encode($test_data);
    	return view('data.index',$this->viewData);
    }    
}
