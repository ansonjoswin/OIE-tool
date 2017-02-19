<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Completion;

use Auth;
use Session;
use Log;

class CompletionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
  {
      $completions=Completion::all();
      return view('completions.index',compact('completions'));
  }
}
