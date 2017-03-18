<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Private_NProf;
use App\School;

use Auth;
use Session;
use Log;


class Private_NProfsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $private_nprofs=Private_NProf::all();
        return view('private_nprofs.index',compact('private_nprofs'));
    }
}
