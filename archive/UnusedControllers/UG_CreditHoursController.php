<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UG_CreditHour;
use App\School;

class UG_CreditHoursController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ug_credithours=UG_CreditHour::all();
        return view('ug_credithours.index',compact('ug_credithours'));
    }
}
