<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ApplicationDetail;
use App\School;


use App\Permission;
use App\Role;

use Auth;
use Session;
use Log;

class ApplicationDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
		$applicationdetails=Applicationdetail::all();
        return view('applicationdetails.index',compact('applicationdetails'));
    }
   


}
