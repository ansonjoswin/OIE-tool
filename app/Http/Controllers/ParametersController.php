<?php

namespace App\Http\Controllers;

use App\UG_UnduplicatedHeadCount;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permission;
use App\Role;
use App\School;
use App\Parameter;
//use App\School;
use App\Http\Requests\SchoolRequest;


use Auth;
use Session;
use Log;

class ParametersController extends Controller
{
    

    public function index()
    {
        $new=Parameter::all();
        dd($new);
    }
	
	

}
