<?php

namespace App\Http\Controllers;

use App\Finance;
use Illuminate\Http\Request;
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
        $finance=Finance::all();
        return view('finances.index',compact('finances'));
    }

}















=======
>>>>>>> featuremigrations
>>>>>>> feature-merge-migration-sprint3
