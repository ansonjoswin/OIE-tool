<?php

namespace App\Http\Controllers;


use App\Http\Controllers\students;

use Illuminate\Http\Request;
use App\Student;
use App\School;
use Auth;
use Session;
use Log;

class StudentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $student=Student::all();
        return view('students.index',compact('students'));
    }

}
