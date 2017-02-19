<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Log;

use App\Instructional_ES;

class Instructional_ESsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

      public function index()
  {
      $instructional_ess=Instructional_ES::all();
      return view('instructional_ess.index',compact('instructional_ess'));
  }
}
