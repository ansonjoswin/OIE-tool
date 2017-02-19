<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

use Auth;
use Session;
use Log;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
  {
      $employees=Employee::all();
      return view('employees.index',compact('employees'));
  }
}
