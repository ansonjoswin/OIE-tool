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

use Illuminate\Support\Facades\DB;

use Auth;
use Session;
use Log;

class ParametersController extends Controller
{
    

    public function index()
    {
        // $new=Parameter::all();
        //$new = DB::Table('myTestView')->get();
        $new = DB::table('myTestView')->whereIn('school_id',[2,3,4,5,5])->get();
        //$new = DB::raw('SELECT *  FROM parameters');

        dd($new);
    }
	
	

}
