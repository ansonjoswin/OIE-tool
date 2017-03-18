<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PublicF;
use App\School;

use Auth;
use Session;
use Log;

class PublicFsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publicfs=PublicF::all();
        return view('publicfs.index',compact('publicfs'));
    }
}
