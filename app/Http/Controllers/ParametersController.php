<?php

namespace App\Http\Controllers;

use App\UG_UnduplicatedHeadCount;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permission;
use App\Role;
use App\School;
//use App\Studnet;
//use App\School;
use App\Http\Requests\SchoolRequest;


use Auth;
use Session;
use Log;

class ParametersController extends Controller
{
    

    public function index()
    {
        //$schools = School::all();
        //return view('schools.index', compact('schools'));
		
                $id = \App\Models\School::with('id')->get(); // note we changed all() to get()
                $ug_student_perthousandstudent = "Lorem ipsum.";
                $admin_professionalstaff_perthousandstudent = \App\Models\Employee::all();
				//$cars = \App\Models\Car::with('carsTypes')->get(); // note we changed all() to get()

    return view('parameters', compact('id', 'year', 'admin_professionalstaff_perthousandstudent', 'ug_student_perthousandstudent', 'infos', 'titreinfos'));
	
    }
	
	//on cherche en db

}



























   public function fillMapArray($source_array, $mapping) {

        $row_values = [];
        $columns = Schema::getColumnListing('maps');
        $no_of_columns_to_fill = sizeof($source_array);
        // Retrieve the CSV column header corresponding to
        // the Database column and store in a map
          // $filenam='%ef2014%';
        foreach($mapping as $dbCol) {
           

             DB::table('schools')
            ->join('students', 'schools.id', '=', 'students.id')
            ->join('employees', 'schools.id', '=', 'employees.schools_id')
            ->select('schools.id', 'students.year', 'students.ug_student_perthousandstudent', 'employees.emp.admin_professionalstaff_perthousandstudent')
            ->get();   
            
                    

   
                       
                    
                
            
        }
        
        return $row_values;
    }