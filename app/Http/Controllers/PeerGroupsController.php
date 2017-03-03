<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PeerGroup;
use App\School_PeerGroup;
use App\User;

use Auth;
use Session;
use Log;

class PeerGroupsController extends Controller
{
    

    public function index()
    { 
         $peergroups=PeerGroup::all();
        return view('peergroups.index',compact('peergroups'));
    }

    public function store(Request $request)
    {
        Log::info('PeerGroupsController.store: ');
        /** Create PeerGroup **/
        $pg_input['PeerGroupName'] = $request['PeerGroupName'];
        $pg_input['User_ID'] = Auth::user()->id;
        $pg_input['created_by'] = Auth::user()->id;
        $pg_input['PriPubFlg'] = $request['PriPubFlag'];
        $pg_object = PeerGroup::create($pg_input);
        /** End Create Peer Group **/
        /** Create School_PeerGroup **/
        $pg_id = $pg_object->PeerGroupID;
        $uid = Auth::user()->id;
        $schoolsIDs = $request['schoolsIDs'];
        foreach ($schoolsIDs as $school_id) {
            $sch_peergroup = [ ['PeerGroupID'=>$pg_id, 'School_ID'=>$school_id, 'created_by'=>$uid, 'created_at'=>date_create() ] ];
            DB::table('school_peergroups')->insert($sch_peergroup);
        }
        /** End Create School_PeerGroup **/
        Session::flash('flash_message', 'Peer Group successfully created!');
        Log::info('PeerGroupController.store - End: '.$pg_object->id.'|'.$pg_object->name);
        return redirect('peergroups');  //go back to peergroups index
    }
}
