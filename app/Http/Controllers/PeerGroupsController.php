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
use App\Instcat;
use App\Stabbr;
use App\Ccbasic;
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
        $this->viewData['user'] = Auth::user();
        $this->viewData['heading'] = "Peer Groups";
        $this->viewData['peergroup'] = PeerGroup::all();
        $this->viewData['PriPubFlgList'] = ['Private' => 'Private', 'Public' => 'Public'];
        $this->viewData['instcat_list'] = Instcat::pluck('desc','id')->toArray();
        $this->viewData['stabbr_list'] = Stabbr::pluck('desc','id')->toArray();
        $this->viewData['ccbasic_list'] = Ccbasic::pluck('desc','id')->toArray();

        $this->viewData['selected_instcat_list'] = Instcat::pluck('desc','id')->toArray();
        $this->viewData['selected_stabbr_list'] = Stabbr::pluck('desc','id')->toArray();
        $this->viewData['selected_ccbasic_list'] = Ccbasic::pluck('desc','id')->toArray();

        $this->viewData['ccbasicyearid'] = 2014;

        $results = School::pluck('school_name','School_ID');
//        dd($results);
        $this->viewData['school_ids'] = $results->toArray();
//        dd($this->viewData['school_ids']);
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

    public function show(PeerGroup $peergroups)
    {
        return('in show route');
        $object = $peergroups;
//        var_dump($object);
        Log::info('PeerGroupsController.show: '.$object->id.'|'.$object->name);
        $this->viewData['peergroup'] = $object;
        $this->viewData['heading'] = "View Peer Group: ".$object->name;
        return view('peergroups.show', $this->viewData);
    }

    /*** Invoke New Peer Group Form ***/
    public function create()  //this is to test functionality
    {
        Log::info('PeerGroupsController.create: ');
//        $this->viewData['instcat_list'] = Instcat::pluck('desc','id')->toArray();
//        $this->viewData['stabbr_list'] = Stabbr::pluck('desc','id')->toArray();
//        $this->viewData['ccbasic_list'] = Ccbasic::pluck('desc','id')->toArray();
//
//        $this->viewData['selected_instcat_list'] = Instcat::pluck('desc','id')->toArray();
//        $this->viewData['selected_stabbr_list'] = Stabbr::pluck('desc','id')->toArray();
//        $this->viewData['selected_ccbasic_list'] = Ccbasic::pluck('desc','id')->toArray();
//
//        $this->viewData['ccbasicyearid'] = 2014;
//
//        $results = School::pluck('school_name','School_ID');
//        $this->viewData['school_ids'] = $results->toArray();
        $this->viewData['heading'] = "New Peer Group";
        return view('peergroups.create', $this->viewData);

        //Mathias code:
        //$schools=School::whereIn('school_id', [3001,3002,3003])->pluck('school_id');
//        $this->viewData['heading'] = "Peer Groups";
//        $this->viewData['schools'] = $schools;
//        return view('peergroups.test_create_peergroup', $this->viewData);
    }


    /*** Save a new peer group to database ***/
    public function store(Request $request)
    {
//        return('in store route');
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
        $pg_id = $peergroup->PeerGroupID;
        $school_peergroups = DB::table('school_peergroups')->where('PeerGroupID', '=', $pg_id)->get();

        $list_schoolIDs = $school_peergroups->pluck('School_ID');

        $list_school = School::whereIn('School_ID', $list_schoolIDs)->pluck('school_name','School_ID')->toArray();

        $this->viewData['User_ID'] = Auth::user()->id;
        $this->viewData['peergroup'] = $peergroup;
        $this->viewData['school_peergroup'] = $peergroup;
        $this->viewData['heading'] = "Edit Peer Group";
        $this->viewData['list_school'] = $list_school;

        return view('peergroups.edit', $this->viewData);
    }

    /*** Update a peer group ***/
    public function update(PeerGroup $peergroup, PeerGroupFormRequest $request)
    {
        $object = $peergroup;
        $pg_input['PeerGroupName'] = $request['PeerGroupName'];
        $pg_input['User_ID'] = Auth::user()->id;
        $pg_input['created_by'] = Auth::user()->email;
        if($request['PriPubFlag'] == ''){
            $pg_input['PriPubFlg'] = 'private';  // Default flag to private
        }else{
            $pg_input['PriPubFlg'] = $request['PriPubFlag'];
        }
        $pg_object = PeerGroup::create($pg_input);

        /** Create School_PeerGroup records to update PeerGroup**/
        $pg_id = $pg_object->PeerGroupID;
        $schoolsIDs = $request['lstBox2'];
        foreach ($schoolsIDs as $school_id) {
            $sch_peergroup = [ ['PeerGroupID'=>$pg_id, 'School_ID'=>$school_id, 'created_by'=>Auth::user()->email, 'created_at'=>date_create() ] ];
            DB::table('school_peergroups')->insert($sch_peergroup);
        }
        $this->populateUpdateFields($request); //update "updated_by" field

        $peergroupid = $request->PeerGroupID;
        $list_school = School_PeerGroup::where('PeerGroupID', '=', $peergroupid);
        Log::info('PeerGroupsController.update - Start: '.$request->PeerGroupID.'|'.$request->PeerGroupName);
        $object->update($request->all());
//        $this->syncSchools($object, $request->input('schoollist'));

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
