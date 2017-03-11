<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graduation;

class TestDataController extends Controller
{
    public function index()
    {
        $test_data = Graduation::select('school_id','GradRate4yr_BacDgr100','GradRate6yr_BacDgr150')->whereIn('school_id',[2,3,4,5,6])->get();
        $this->viewData['test_data'] = json_encode($test_data);
    	return view('data.test',$this->viewData);
    	//return view('data.test');
    	//return view('data.test_mpd');
    }


}
