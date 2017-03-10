<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestDataController extends Controller
{
    public function index()
    {
    	return view('data.test');
    }
}
