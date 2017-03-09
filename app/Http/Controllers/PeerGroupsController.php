<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\SchoolRequest;
use App\PeerGroup;
use App\School_PeerGroup;
use App\User;
use App\School;
use Auth;
use Session;
use Log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SchoolsController;

class PeerGroupsController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /*** Display list of Peer Groups ***/
    public function index()
    { 
        if(Auth::check()){
            Log::info('PeerGroupsController.index: ');
            $userID = Auth::user()->id;
            if(Auth::user()->can(['manage-users','manage-roles'])){
                $this->viewData['heading'] = "Peer Groups";
                $peergroup = PeerGroup::all();
            }else{
                $this->viewData['heading'] = "My Peer Groups";
                $peergroup = PeerGroup::where('User_ID',Auth::user()->id)->get();
                //need to order this by PriPubFlg (public first)
            }
            $this->viewData['peergroups'] = $peergroup;
            return view('peergroups.index', $this->viewData);       
        }else{
            return redirect('/');
        }
    }


    /*** Invoke New Peer Group Form ***/
    public function create()  //this is to test functionality
    { 
        $schools=School::whereIn('school_id', [3001,3002,3003])->pluck('school_id');
        $this->viewData['heading'] = "Peer Groups";
        $this->viewData['schools'] = $schools;
        return view('peergroups.test_create_peergroup', $this->viewData);       
    }


    /*** Save a new peer group to database ***/
    public function store(Request $request)
    {
        Log::info('PeerGroupsController.store: ');

        /** Create PeerGroup record **/
        $pg_input['PeerGroupName'] = $request['PeerGroupName'];
        $pg_input['User_ID'] = Auth::user()->id; 
        $pg_input['created_by'] = Auth::user()->email;
        if($request['PriPubFlag'] == ''){
            $pg_input['PriPubFlg'] = 'private';  // Default flag to private
        }else{
            $pg_input['PriPubFlg'] = $request['PriPubFlag'];
        }
        $pg_object = PeerGroup::create($pg_input);

        /** Create School_PeerGroup records for new PeerGroup**/
        $pg_id = $pg_object->PeerGroupID;
        $schoolsIDs = $request['lstBox2'];
        foreach ($schoolsIDs as $school_id) {
            $sch_peergroup = [ ['PeerGroupID'=>$pg_id, 'School_ID'=>$school_id, 'created_by'=>Auth::user()->email, 'created_at'=>date_create() ] ];
            DB::table('school_peergroups')->insert($sch_peergroup);
        }
        
        Session::flash('flash_message', 'Peer Group successfully created!');
        Log::info('PeerGroupController.store - End: '.$pg_object->id.'|'.$pg_object->name);
        return redirect('peergroups');
    }    


    /*** Delete a peer group from database ***/
    public function destroy(Request $request)
    {
        Log::info('PeerGroupsController.destroy: '.$request['pg_id']);

        /** Delete PeerGroup record **/
        School_PeerGroup::where('PeerGroupID','=',$request['pg_id'])->delete();
        PeerGroup::where('PeerGroupID','=',$request['pg_id'])->delete();

        Session::flash('flash_message', 'Peer Group successfully deleted!');
        Log::info('PeerGroupController.store - End: '.$request['pg_id']);
        return redirect('peergroups');
    }      


}
