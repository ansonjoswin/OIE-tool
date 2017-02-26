<?php
namespace App\Http\Controllers;

use App\School_PeerGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\SchoolsController;

use App\Http\Requests;
use App\PeerGroup;
use App\User;
//use App\School;

use Auth;
use Session;
use Log;

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
        return view('school_peergroups.individual.index', $this->viewData);                
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

    public function add_indv()
    {
        Log::info('School_PeerGroupsController.add_indv: ');
        $this->viewData['heading'] = "Add Institution to Peer Group";
        //$this->viewData['schools'] = School::pluck('school_name', 'unit_id', 'school_state', 'school_id');
        
        $schools = (new SchoolsController)->getSchools();
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
}