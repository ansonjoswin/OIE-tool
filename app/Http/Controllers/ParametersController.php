<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UG_UnduplicatedHeadCount;
//use Illuminate\Http\Request;
use App\Http\Requests;

use App\Parameter;

class ParametersController extends Controller
{
    public function index(){
		 
		
		$new=Parameter::all()->toArray();
		//dd($new);
	}

}