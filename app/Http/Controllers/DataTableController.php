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
        $this->peergroup_list = PeerGroup::all();

//                $schools = School::all();  //EHLbug: This crashes everything and causes an http 500 error
    }

    public function index(){
    	$datatables = DataTable::all();
    	$peergroup_list = PeerGroup::pluck('peergroup_name','peergroup_id')->toArray();
       $peergroup_school=PeerGroup::find(13);
       //dd($peergroup_school->school->pluck('name'));

         

                return view('data.tableindex',compact('datatables','peergroup_list','peergroup_school'));
        
    }
}
