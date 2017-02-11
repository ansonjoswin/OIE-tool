<?php

namespace App\Http\Controllers;

use App\UG_UnduplicatedHeadCount;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permission;
use App\Role;
use App\School;
use App\Http\Requests\SchoolRequest;


use Auth;
use Session;
use Log;

class SchoolsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $schools=School::all();
        return view('schools.index',compact('schools'));
    }
    public function store(Request $request)
    {
        $school= new School($request->all());
        $school->save();
        return redirect('schools');
    }
    public function update($School_Id,Request $request)
    {
        //
        $school= new School($request->all());
        $school=School::find($School_Id);
        $school->update($request->all());
        return redirect('schools');
    }
    public function destroy($School_Id)
    {
        try {

            $ug_credithour = UG_CreditHour::where('School_Id', '=', $School_Id)->delete();
            $ug_unduplicatedheadcount = UG_UnduplicatedHeadCount::where('School_Id', '=', $School_Id)->delete();


        }catch(Exception $ex) {

            Log::exception($ex);
        }
        return redirect('schools'); //Once Deleted the page is redirected to customers.
    }
}
