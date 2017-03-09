<?php

namespace App\Http\Controllers;


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
    

    public function index()
    {
        $schools = School::all();
        //$schools = School::pluck('school_name');
        $this->viewData['schools'] = $schools;        
        $this->viewData['heading'] = "Institutions";
        //return view('schools.index', compact('schools'));
        return view('schools.index', $this->viewData);
    }


    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public static function getSchools()
    {
        $schools = School::all();
        return $this->$schools;
        //return $this->belongsTo('App\School');
    }


}