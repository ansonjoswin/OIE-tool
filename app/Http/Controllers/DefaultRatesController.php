<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Defaultrate;
use App\School;
use Auth;
use Session;
use Log;


class DefaultRatesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $defaultrates=DefaultRate::all();
        return view('defaultrates.index',compact('defaultrates'));
    }

}
