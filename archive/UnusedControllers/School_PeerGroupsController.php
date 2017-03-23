<?php
namespace App\Http\Controllers;

use App\School_PeerGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\SchoolsController;

use App\Http\Requests;
use App\Http\Requests\SchoolRequest;
use App\PeerGroup;
use App\User;
use App\School;

use Auth;
use Session;
use Log;
use Illuminate\Support\Facades\DB;

class School_PeerGroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->user = Auth::user();
//        $this->school_peergroups = School_PeerGroup::where('PeerGroupID', '=', 1);
//        $this->list_schools = School_PeerGroup::pluck('School_ID', 'SchoolPeerGroupID');
//        $this->heading = "Peer Group Institution List";
//
//        $this->viewData = [ 'user' => $this->user, 'school_peergroups' => $this->school_peergroups, 'list_schools' => $this->list_schools, 'heading' => $this->heading ];
    }

    public function index()
    {
        Log::info('School_PeerGroupsController.index: ');
        $peergroups = PeerGroup::all();
        $this->viewData['peergroups'] = $peergroups;

        return view('school_peergroups.index', $this->viewData);
    }

    public function show()
    {

    }

//    public function create()
//    {
//
//    }
//
//    public function store(School_PeerGroupRequest $request)
//    {
//
//    }
//
//    public function edit(School_PeerGroup $school_PeerGroup)
//    {
//
//    }
//
    public function update(School_PeerGroup $school_PeerGroup, School_PeerGroupRequest $request)
    {
        $object = $school_PeerGroup;

    }
//
//    /**
//     * Destroy the given skeletal element.
//     *
//     * @param  Request  $request
//     * @param  School_PeerGroup $school_PeerGroup
//     * @return Response
//     */
//    public function destroy(Request $request, School_PeerGroup $school_PeerGroup)
//    {
//        $object = $school_PeerGroup;
//    }


}