<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Graduation;

class TestDataController extends Controller
{
    public function index()
    {
        $test_data = Graduation::select('stEnrl','year','Graduation_ID')->get();
        
 /*       $test1 = json_decode($test_data);*/
       // var_dump($test_data);    
    /*    $init = $test1[0];
        $finalKeys = array();
        $i =0;
        	# code...
        	foreach ( $init as $key => $value) {
        	# code...	
        	$finalKeys[$i] =$key;
      $i = $i + 1;
        }
       // var_dump($finalKeys);

        $final["keys"] = $finalKeys;
        $final["values"] = $test1;
          var_dump($final);
          $test=$final;
          //var_dump(json_encode($final));*/
        $this->viewData['test_data'] = json_encode($test_data);
    	return view('data.test',$this->viewData);
    	//return view('data.test');
    	//return view('data.test_mpd');
    }

    


}
