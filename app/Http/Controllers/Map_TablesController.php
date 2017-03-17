<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Map_Table;

use Auth;
use Session;
use Log;

class Map_TablesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $map_tables=Map_Table::all();
        return view('map_tables.index',compact('map_tables'));
    }

}