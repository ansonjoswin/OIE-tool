<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admission;
use App\School;

use Auth;
use Session;
use Log;

class AdmissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admissions=Admission::all();
        return view('admissions.index',compact('admissions'));
    }

}
