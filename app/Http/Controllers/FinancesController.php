<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finance;
use App\School;

use Auth;
use Session;
use Log;


class FinancesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $finances=Finance::all();
        return view('finances.index',compact('finances'));
    }

}
