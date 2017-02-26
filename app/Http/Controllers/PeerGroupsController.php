<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PeerGroupIndvAddRequest;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\PeerGroup;
use App\User;
use App\School;

use Auth;
use Session;
use Log;

use App\Http\Controllers\Controller;

class PeerGroupsController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    public function index()
    { 
        Log::info('PeerGroupsController.index: ');
        $peergroups=PeerGroup::all();
        $this->viewData['heading'] = "Peer Groups";
        $this->viewData['peergroups'] = $peergroups;
        return view('peergroups.index', $this->viewData);  
        //return view('peergroups.index',compact('peergroups'));       
    }

    public function add_indv()
    {
        Log::info('PeerGroupsController.add_indv: ');

        $this->viewData['heading'] = "Add Institution to Peer Group";
        $this->viewData['schools'] = School::pluck('school_name', 'unit_id');

        return view('peergroups.individual.add', $this->viewData);
    }    

    public function edit_indv(PeerGroupIndvAddRequest $request)
    {
        Log::info('PeerGroupsController.edit_indv: ');
        $this->viewData['heading'] = "Add Institution to Peer Group";
        $this->viewData['schools'] = School::whereIn('unit_id', $request->input('institutionList'))->get();
        return view('peergroups.individual.add', $this->viewData);
    }        


    public function index_indv(PeerGroupIndvAddRequest $request)
    {
        Log::info('PeerGroupsController.index_indv: ');
        $this->viewData['heading'] = "Peer Group";
        $this->viewData['schools'] = School::whereIn('unit_id', $request->input('institutionList'))->get();
        return view('peergroups.individual.index', $this->viewData);
    } 

    public function index_new()
    {
        Log::info('PeerGroupsController.index_new: ');
        $this->viewData['heading'] = "Peer Group";
        return view('peergroups.individual.index', $this->viewData);
    }  

}
