<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NonInstructional_ES;

use Auth;
use Session;
use Log;

class NonInstructional_ESsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
  {
      $noninstructional_ess=NonInstructional_ES::all();
      return view('noninstructional_ess.index',compact('noninstructional_ess'));
  }
}
