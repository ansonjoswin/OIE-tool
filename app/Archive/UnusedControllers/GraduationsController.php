<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Log;

use App\Graduation;

class GraduationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
  {
      $graduations=Graduation::all();
      return view('graduations.index',compact('graduations'));
  }
}
