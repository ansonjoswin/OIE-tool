<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\SchoolRequest;
use App\Http\Requests\PeerGroupFormRequest;
use App\PeerGroup;
//use App\School_PeerGroup;
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

        $results = School::pluck('name','id');
//        dd($results);
        $this->viewData['school_ids'] = $results->toArray();
//        dd($this->viewData['school_ids']);
    }

    /*** Display list of Peer Groups ***/
    public function index()
    { 
        if(Auth::check()){

            //Log::info('PeerGroupsController.index: ');

            $userID = Auth::user()->id;
            if(Auth::user()->can(['manage-users','manage-roles'])){
                $this->viewData['heading'] = "Peer Groups";
                $peergroup = PeerGroup::all();
            }else{
                $this->viewData['heading'] = "My Peer Groups";
                $peergroup = PeerGroup::where('user_id',Auth::user()->id)->get();
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
        Log::info('PeerGroupsController.show: '.$object->id.'|'.$object->name);
        $this->viewData['peergroup'] = $object;
        $this->viewData['heading'] = "View Peer Group: ".$object->name;
        return view('peergroups.show', $this->viewData);
    }


    /*** Invoke New Peer Group Form ***/
    public function create()  //this is to test functionality
    {
        Log::info('PeerGroupsController.create: ');
        $this->viewData['user'] = Auth::user();
        $this->viewData['heading'] = "New Peer Group";
        return view('peergroups.create', $this->viewData);
    }


    /*** Save a new peer group to database ***/
    public function store(Request $request)
    {

        //Log::info('PeerGroupsController.store: ');

        /** Create PeerGroup record **/

                //dd($request->all());
        
        $pg_input['peergroup_name'] = $request['PeerGroupName'];
        $pg_input['user_id'] = Auth::user()->id; 
        $pg_input['created_by'] = Auth::user()->email;
        //dd($request['PriPubFlag']);
            if($request['PriPubFlg'])
                {
                    $pg_input['private_public_flag'] = $request['PriPubFlg'];
                      
                   
                }
            else{
                     $pg_input['private_public_flag'] = 'private';  // Default flag to private
                  }  
    //Insert PeerGroup record in peergroups table

        $pg_object = PeerGroup::create($pg_input);

    //Create pivot table with attach function
        $pg_object->school()->attach($request->input('lstBox2'));

        Session::flash('flash_message', 'Peer Group successfully created!');
        Log::info('PeerGroupController.store - End: '.$pg_object->id.'|'.$pg_object->name);
        return redirect('peergroups');
    }    

    /*** Edit a peer group ***/
    public function edit(PeerGroup $peergroup)
    {
        $object = $peergroup;
//        dd($object);

        $pg_id = $peergroup->PeerGroupID;

        /****Use Pivot table for this*****/
        // $school_peergroups = DB::table('school_peergroups')->where('peergroup_id', '=', $pg_id)->get();

        // $list_schoolIDs = $school_peergroups->pluck('School_ID');
        $list_schoolIDs=0;

        $list_school = School::whereIn('id', $list_schoolIDs)->pluck('name','id')->toArray();

        $this->viewData['user'] = Auth::user();
        $this->viewData['User_ID'] = Auth::user()->id;
        $this->viewData['peergroup'] = $object;
        $this->viewData['school_peergroup'] = $object;
        $this->viewData['heading'] = "Edit Peer Group";
        $this->viewData['list_school'] = $list_school;

        return view('peergroups.edit', $this->viewData);
    }

    /*** Update a peer group ***/
    public function update(PeerGroup $peergroup, Request $request)
    {
//        return('in update route');
        Log::info('PeerGroupsController.update - Start: '.$request->PeerGroupID.'|'.$request->peergroup_name);
        $object = $peergroup;
        /** Update PeerGroup updated_by and updated_at**/
        $request['peergroup_name'] = $request['peergroup_name'];
        $request['user_id'] = Auth::user()->id;
        $request['updated_by'] = Auth::user()->email; //EHLbug: this gets overwritten, becomes 'System' (low priority)
//        dd($request['updated_by']);
        if($request['private_public_flag'] == ''){
            $request['private_public_flag'] = 'Private';  // Default flag to private
        }else{
            $request['private_public_flag'] = $request['PriPubFlg'];
        }
        $request['pg_ID'] = $request->peergroup_id;
//        dd($pg_input);
        $object->update($request->all()); // this works
//        dd($object);

        /** Update School_PeerGroup records to update PeerGroup**/
        $schoolsIDs = $request['lstBox2'];
        $pg_ID = $object->PeerGroupID;
        $updated_by = Auth::user()->email;
        //        dd($object->PeerGroupID);
        //        dd($request['lstBox2']);



// *****Cant use school_peergroup , use pivot table*****/



        // $old_school_IDs = School_PeerGroup::pluck('School_ID');
        // foreach ($schoolsIDs as $school_id) {
        //     // need if statement to determine if old school id not in new school id; if so, delete row
        //     // else update or create
        //     $school_peergroups = School_PeerGroup::updateOrCreate(
        //         //EHLbug: this runs if the schools selected are the same (so it doesn't have an issue with the update part, although the updated_at field does not change),
        //         //but it fails if schools are added - error is in date casting, I believe
        //         //ErrorException in HasAttributes.php line 818: Illegal offset type
        //         ['PeerGroupID' => $pg_ID,
        //         'School_ID' => $school_id]
        //         ,
        //         ['updated_at'=>date_create()]
        //     );
        // }

        // Session::flash('flash_message', 'Peer Group successfully updated!');
        // Log::info('PeerGroupsController.update - End: '.$object->PeerGroupID.'|'.$object->PeerGroupName);
        // return redirect('peergroups');

        //}
}


    /*** Delete a peer group from database ****/
    public function destroy(Request $request)
    {

        //Log::info('PeerGroupsController.destroy: '.$request['pg_id']);

    /*****************Delete PeerGroup record ********************/

    //First delete the pivot relationship
        PeerGroup::find($request['pg_id'])->school()->detach();
    //delete records using cascade delete property
        PeerGroup::where('peergroup_id','=',$request['pg_id'])->delete();     

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
