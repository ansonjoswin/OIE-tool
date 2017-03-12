<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graduation;

class DataVisualController extends Controller
{
    public function index()
    {
        $test_data = Graduation::select('school_id','GradRate4yr_BacDgr100','GradRate6yr_BacDgr150')->whereIn('school_id',[2,3,4,5,6])->get();
        $this->viewData['test_data'] = json_encode($test_data);
    	return view('data.index',$this->viewData);
    }
}
