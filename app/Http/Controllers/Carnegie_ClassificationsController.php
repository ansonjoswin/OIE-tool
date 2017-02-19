<?php

namespace App\Http\Controllers;

use App\Carnegie_Classification;
use Illuminate\Http\Request;

use Auth;
use Session;
use Log;

class Carnegie_ClassificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carnegie_classifications=Carnegie_Classification::all();
        return view('carnegie_classifications.index',compact('carnegie_classifications'));
    }
}
