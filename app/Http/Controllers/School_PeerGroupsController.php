<?php
namespace App\Http\Controllers;

use App\School_PeerGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\SchoolsController;

use App\Http\Requests;
use App\Http\Requests\SchoolRequest;
use App\PeerGroup;
//use App\User;
use App\School;

use Auth;
use Session;
use Log;
use Illuminate\Support\Facades\DB;

class School_PeerGroupsController extends Controller
{
	/*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    public function index()
    {
        Log::info('School_PeerGroupsController.index: ');
        $this->viewData['heading'] = "All Institutions";
        $schools=School::all();
        $this->viewData['schools'] = $schools;
        //return view('school_peergroups.index',compact('school_peergroups'));
        return view('school_peergroups.index', $this->viewData);                
    }

    public function store()
    {
        Log::info('School_PeerGroupsController.store: ');
        return view('peergroups', $this->viewData);                
    }    

    public function create()
    {
        Log::info('School_PeerGroupsController.create: ');
        $this->viewData['heading'] = "Peer Groups";
        $school_peergroups=School_PeerGroup::all();
        $this->viewData['school_peergroups'] = $school_peergroups;
        //return view('school_peergroups.index',compact('school_peergroups'));
        return view('school_peergroups.individual.create', $this->viewData);                
    }    

    public function append(SchoolRequest $request)
    {
        $this->viewData['heading'] = "Search for Institutions";

        return $request;
        // $in_name = $request['input_school_name']; 
        // $schools = School::all();
        // $schools = School::whereHas('school_name', function($q){
        //      $q->where('content', 'like', '%miami%');
        // })->get();
        // $this->viewData['schools'] = $schools;
        // return view('school_peergroups.individual.search', $this->viewData);                
    }     

    public function add_indv()
    {
        Log::info('School_PeerGroupsController.add_indv: ');
        $this->viewData['heading'] = "Add Institution to Peer Group";

        // if ($request['srch_name'] != null)
        // {
        //      $schools = DB::table('school')->select('unit_id', 'school_name')
        //          ->where('school_name', $request['srch_name'])
        //          ->get();
        // }else{
        //     $schools = School::pluck('unit_id','school_name');
        // }
        $schools = School::pluck('unit_id','school_name');
        $this->viewData['schools'] = $schools;
        return view('school_peergroups.individual.add', $this->viewData);        
    }        


    public function edit_indv()
    {
        Log::info('School_PeerGroupsController.add_indv: ');
        $this->viewData['heading'] = "Add Institution to Peer Group";
        $this->viewData['schools'] = School::pluck('school_name', 'unit_id');
        return view('school_peergroups.individual.add', $this->viewData);
    }       

    public function test()
    {
        $this->viewData['heading'] = "Search for Institutions";
        $this->viewData['schools'] = '';
        return view('school_peergroups.individual.search', $this->viewData);
    }       

    public function add_indv_post(Request $request) 
    {
        $object = $request['srch_name'];
        Log::info('School_PeerGroupsController.add_indv_post: '.$object);
        $this->viewData['heading'] = "Add Institution to Peer Group";
        if ($request['srch_name'] != null)
        {
              $schools = DB::table('school')->select('unit_id', 'school_name')
                  ->where('school_name', $request['srch_name'])
                  ->get();
        }else{
             $schools = School::pluck('unit_id','school_name');
        }
        $this->viewData['schools'] = $schools;
        /*
        $schools = School::query();
        if (Input::has('srch_name'))
        {
            $schools->where('school_name', Input::get('srch_name'));
        }
        $this->viewData['schools'] = $schools;
        return view('school_peergroups.individual.add', $this->viewData);
        */
        
        return view('school_peergroups.individual.add', $this->viewData); 

    }    

}