<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\SchoolRequest;
use App\Http\Requests\PeerGroupFormRequest;
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
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->heading = "Peer Groups";
        $this->peergroup = PeerGroup::all();
        $this->PriPubFlgList = ['Private' => 'Private', 'Public' => 'Public'];
        $this->viewData = [ 'user' => $this->user, 'heading' => $this->heading, 'peergroups' => $this->peergroup, 'PriPubFlgList'=>$this->PriPubFlgList ];
//        dd($this->viewData);
    }

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

    /*** Edit a peer group ***/
    public function edit(PeerGroup $peergroup)
    {
        $user = Auth::user();
        $peergroups = PeerGroup::where('User_ID',Auth::user()->id)->get();
//        dd($peergroups);
//        dd($peergroup);
        $pg_id = $peergroup->PeerGroupID;
//        dd($pg_id);

        $school_peergroups = DB::table('school_peergroups')->where('PeerGroupID', '=', $pg_id)->get();
        $object = $peergroup;
//                dd($object);
//        dd($school_peergroups);
//        $school_peergroups = School_PeerGroup::where('PeerGroupID', '=', $pg_id)->get();
//dd($school_peergroups);
//        $subset = $school_peergroups->map(function ($school_peergroup) {
//            return collect($school_peergroup)
//                ->only(['School_ID', 'PeerGroupID']);
//        });

//        dd($subset);
        //EHLbug: can't get rid of Illegal Offset Type error!
//        foreach ($school_peergroups as $school_peergroup)
//        {
////            foreach ()
//            var_dump($school_peergroup->School_ID);
////            var_dump($this->viewData);
//        }

//        $list_schoolIDs = School_PeerGroup::all();
////        dd($list_schoolIDs);
        $list_schoolIDs = $school_peergroups->pluck('School_ID');
//                dd($list_schoolIDs);
        $list_school = School::select('School_ID', 'School_Name')->whereIn('School_ID', $list_schoolIDs)->get();
//        dd($list_school);
//        Log::info('PeerGroupsController.edit: '.$object->SchoolPeerGroupID.'|'.$object->PeerGroupName);
        $this->viewData['User_ID'] = Auth::user()->id;
        $this->viewData['peergroup'] = $object;
        $this->viewData['school_peergroup'] = $object;
        $this->viewData['heading'] = "Edit Peer Group";
        $this->viewData['list_school'] = $list_school;
//        dd($list_school);
        return view('peergroups.edit', $this->viewData);

    }

    /*** Update a peer group ***/
    public function update(PeerGroup $peergroup, PeerGroupFormRequest $request)
    {

//        $object = ;
        $this->populateUpdateFields($request);
        $peergroupid = $object->PeerGroupID;
        $list_school = School_PeerGroup::where('PeerGroupID', '=', $peergroupid);
        Log::info('PeerGroupsController.update - Start: '.$object->PeerGroupID.'|'.$object->PeerGroupName);
        $object->update($request->all());
        $this->syncSchools($object, $request->input('schoollist'));
        Session::flash('flash_message', 'Peer Group successfully updated!');

        Log::info('PeerGroupsController.update - End: '.$object->PeerGroupID.'|'.$object->PeerGroupName);
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

//    private function syncSchool_PeerGroups(PeerGroup $peerGroup, array $schoollist)
//    {
//        Log::info('PeerGroupsController.syncSchools: Start: '.$peerGroup->PeerGroupID);
//        $peerGroup->perms()->sync($schoollist);
//    }
//
//    public function perms()
//    {
//        return $this->belongsToMany(Config::get('peergroupconfig.school_peergroup'), Config::get('peergroupconfig.school_peergroup_peergroup_table'), Config::get('peergroupconfig.peergroup_foreign_key'), Config::get('peergroupconfig.school_peergroup_foreign_key'));
//    }

    /**
     * Sync up the list of schools for the given peer group record.
     *
     * @param  User  $peergroup
     * @param  array  $school_peergroups (id)
     */
//    private function syncSchools(PeerGroup $peergroup, array $school_peergrouplist)
//    {
//        Log::info('School_PeerGroupsController.syncSchools: Start: '.$peergroup->peergroupID);
//        $peergroup->perms()->sync($school_peergrouplist);
//    }

}
