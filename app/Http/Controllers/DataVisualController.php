<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graduation;
use App\PeerGroup;

class DataVisualController extends Controller
{
    public function index()
    {
    	$peerGroups = PeerGroup::select('PeerGroupID','PeerGroupName')->where('PriPubFlg','=','public')->get();
    	$this->viewData['peerGroups'] = $peerGroups;
        $test_data = Graduation::select('school_id','GradRate4yr_BacDgr100','GradRate6yr_BacDgr150')->whereIn('school_id',[2,3,4,5,6,7,8])->get();
        $this->viewData['test_data'] = json_encode($test_data);
    	return view('data.index',$this->viewData);
    }
}
