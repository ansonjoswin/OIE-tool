<?php

namespace App\Http\Controllers;

use App\UG_UnduplicatedHeadCount;
use Illuminate\Http\Request;
use App\Http\Requests;
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
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }
}