<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UG_UnduplicatedHeadCount;
use App\School;

use Auth;
use Session;
use Log;
class UG_UnduplicatedHeadCountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ug_unduplicatedheadcounts=UG_UnduplicatedHeadCount::all();
        return view('ug_unduplicatedheadcounts.index',compact('ug_unduplicatedheadcounts'));
    }

}
