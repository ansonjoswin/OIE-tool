<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\SchoolRequest;
use App\Http\Requests\PeerGroupFormRequest;
use App\PeerGroup;
use App\User;
use App\School;
use App\Instcat;
use App\Stabbr;
use App\Ccbasic;
use App\DataTable;
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
        $this->viewData['ccbasicyearid'] = DataTable::distinct()->pluck('year')->toArray();
        $results = School::sortByName()->pluck('name','id');
        $this->viewData['school_ids'] = $results->toArray();
    }

    /*** Display list of Peer Groups ***/
    public function index()
    { 
        if(Auth::check()){

            //Log::info('PeerGroupsController.index: ');

            $userID = Auth::user()->id;
            if(Auth::user()->can(['manage-users','manage-roles']))
            {
                $this->viewData['heading'] = "Peer Groups";
                $peergroup = PeerGroup::all();
            }
            else
                {
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
        
        $pg_input['peergroup_name'] = $request['peergroup_name'];
        $pg_input['user_id'] = Auth::user()->id; 
        $pg_input['created_by'] = Auth::user()->email;
            if($request['private_public_flag'])
                {
                    $pg_input['private_public_flag'] = $request['private_public_flag'];
                }
            else
                {
                    $pg_input['private_public_flag'] = 'Private';  // Default flag to private
                }
    //Insert PeerGroup record in peergroups table

        $pg_object = PeerGroup::create($pg_input);

    //Create pivot table with attach function
        $pg_object->school()->attach($request->input('lstBox2'));

        Session::flash('flash_message', 'Peer Group successfully created!');
        Log::info('PeerGroupsController.store - End: '.$pg_object->id.'|'.$pg_object->name);
        return redirect('peergroups');
    }    

    /*** Edit a peer group ***/
    public function edit(PeerGroup $peergroup)
    {
        $object = $peergroup;
        $peergroup_id = $peergroup->peergroup_id;

        /****Use Pivot table for this*****/
        $list_school = PeerGroup::find($peergroup_id)->school->pluck('name','id')->toArray();

        $this->viewData['user'] = Auth::user();
        $this->viewData['user_id'] = Auth::user()->id;
        $this->viewData['peergroup'] = $object;
        $this->viewData['school_peergroup'] = $object;
        $this->viewData['heading'] = "Edit Peer Group";
        $this->viewData['list_school'] = $list_school;

        return view('peergroups.edit', $this->viewData);
    }

    /*** Update a peer group ***/
    public function update(PeerGroup $peergroup, Request $request)
    {
        $object = $peergroup;
        Log::info('PeerGroupsController.update - Start: '.$object->peergroup_id.'|'.$object->peergroup_name);
        /** Update PeerGroup updated_by and updated_at**/
        $object['updated_by'] = Auth::user()->email;
        if($request['private_public_flag'])
        {
            $object['private_public_flag'] = $request['private_public_flag'];
        }
        /** Update the PeerGroup **/
        $object->update($request->all());

        /** Update peergroup_school records to update PeerGroup**/
        $schoolsIDs = $request['lstBox2'];
        $peergroup->school()->sync($schoolsIDs);

         Session::flash('flash_message', 'Peer Group successfully updated!');
         Log::info('PeerGroupsController.update - End: '.$object->peergroup_id.'|'.$object->PeerGroupName);
         return redirect('peergroups');
}

public function createnew(Request $request)
{
       $pg_input['peergroup_name'] = $request['peergroup_name'];
        $pg_input['user_id'] = Auth::user()->id; 
        $pg_input['created_by'] = Auth::user()->email;
            if($request['private_public_flag'])
                {
                    $pg_input['private_public_flag'] = $request['private_public_flag'];
                }
            else
                {
                    $pg_input['private_public_flag'] = 'Private';  // Default flag to private
                }
    //Insert PeerGroup record in peergroups table

        $pg_object = PeerGroup::create($pg_input);

    //Create pivot table with attach function
        $pg_object->school()->attach($request->input('lstBox2'));

        Session::flash('flash_message', 'Peer Group successfully created!');
        Log::info('PeerGroupsController.store - End: '.$pg_object->id.'|'.$pg_object->name);
        return redirect('peergroups');


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

}
