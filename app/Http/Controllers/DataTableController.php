<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Permission;
use App\Role;
use App\DataTable;
use App\User;
use App\School;
use App\PeerGroup;
use App\School_PeerGroup;
use Excel;


use App\Http\Requests\SchoolRequest;


use Auth;
use Session; 
use Log;

use Illuminate\Http\Request;

class DataTableController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        // $this->user = Auth::user();
        // $this->instcats = Instcat::all();
        // $this->stabbrs = Stabbr::all();
        // $this->results = School::pluck('name','id');
        //$this->school_ids = $this->results->toArray();
        $this->new_array = [];
        $this->viewData['peergroup_list'] = PeerGroup::pluck('peergroup_id','peergroup_name')->toArray();
        $this->viewData['selected_peergroup_list'] = PeerGroup::pluck('peergroup_id','peergroup_name')->toArray();

//                $schools = School::all();  //EHLbug: This crashes everything and causes an http 500 error
    }

    public function index(){
        
        $filtervalues = DataTable::all();
        $displayTable = false;
        $sum=0;
    	$peergroup_list = PeerGroup::pluck('peergroup_name','peergroup_id');
        $peergroup_school=PeerGroup::all();
        //$peergroup_school=PeerGroup::find(1);
        //$peergroup_school_list=$peergroup_school->school()->pluck('name','school_id');
        //$selected_peergroup_list = PeerGroup::all();
        // $selected_peergroup_list->school()->pluck('school_id');

        //dd($peergroup_school);
       
        //     echo('School name:');
        //     echo($peergroup_school->school()->pluck('school_id'));
        //     //dd($peergroup_school->school()->pluck('name'));  

        return view('data.tableindex',compact('datatables','peergroup_list','peergroup_school','filtervalues','displayTable','sum'));
        
    }  

     public function datadisplay(Request $request)
     {
        $filtervalues = [];
        //$check=[];
        $displayTable = true;
        $count=0;
        //$check='none';
        $peergroup_list = PeerGroup::pluck('peergroup_name','peergroup_id');
        $peergroup_school=PeerGroup::all();
        $selected_peergroup = PeerGroup::where('peergroup_id', $request['peergroup_id'])->first();
        //dd($selected_peergroup);
        $selected_school_list = $selected_peergroup->school()->pluck('name','school_id');
        //dd($peergroup_list);
        $sum=$selected_peergroup->school()->count();
        //dd($sum);
        foreach ($selected_school_list as $school_list_id => $school_list_name) {
            array_push($filtervalues, DataTable::where('school_id', $school_list_id)->first());
                   }
// dd($filtervalues);
                   //if($export)
     //return getExport($filtervalues);
     return view('data.tableindex',compact('datatables','peergroup_list','peergroup_school','filtervalues','displayTable','sum'));
     }

     public function getExport(){

        
        $export = DataTable::find(1);
               
        Excel::create("UNO's Summary Data Table", function($excel) use($export){
         $excel->sheet('Summary Table', function($sheet) use($export){
             $sheet->fromArray($export);
         });
            
        })->export('xlsx');
    }
}
