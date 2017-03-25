<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\DataTable;
use App\User;
use App\School;
use App\PeerGroup;
use App\School_PeerGroup;
use App\Http\Requests\SchoolRequest;
use Auth;
use Session; 
use Log;
use Excel;

class ExporttoExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function getExport(){

        //dd($request);
    	$export = DataTable::all();
               
    	Excel::create("UNO's Summary Data Table", function($excel) use($export){
    		$excel->sheet('Summary Table', function($sheet) use($export){
    			$sheet->fromArray($export);
    		});
            
    	})->export('xlsx');
    }
}
