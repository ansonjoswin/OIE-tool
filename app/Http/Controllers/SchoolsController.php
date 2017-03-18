<?php

namespace App\Http\Controllers;


use App\UG_UnduplicatedHeadCount;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Permission;
use App\Role;
use App\School;

use App\Http\Requests\SchoolRequest;


use Auth;
use Session; 
use Log;

class SchoolsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return('View Not Available');
        // $schools = School::all();

        // //$schools = School::pluck('name');
        // $this->viewData['schools'] = $schools;        
        // $this->viewData['heading'] = "Institutions";
        // //return view('schools.index', compact('schools'));
        // return view('schools.index', $this->viewData);
    }


    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public static function getSchools()
    {
        return('View Not Available');
        // $schools = School::all();
        // return $this->$schools;
        // //return $this->belongsTo('App\School');
    }


        // return view('schools.index', compact('schools'));
    }

}