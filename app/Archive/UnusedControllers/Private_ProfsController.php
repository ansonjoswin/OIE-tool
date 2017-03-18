<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Private_Prof;
use App\School;

use Auth;
use Session;
use Log;

class Private_ProfsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $private_profs=Private_Prof::all();
        return view('private_profs.index',compact('private_profs'));
    }
}
