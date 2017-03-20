<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\SchoolRequest;
use App\PeerGroup;
//use App\School_PeerGroup;
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



    /*** Invoke New Peer Group Form ***/ //Not being used or called
    // public function create()  //this is to test functionality
    // { 
    //     //$schools=School::whereIn('school_id', [3001,3002,3003])->pluck('school_id');
    //     //$schools=School::pluck('School_Name','School_Name');
    //     $this->viewData['heading'] = "Peer Groups";
    //     $this->viewData['schools'] = $schools;
    //     return view('peergroups.test_create_peergroup', $this->viewData);       
    // }

    /*** Save a new peer group to database ***/
    public function store(Request $request)
    {

        //Log::info('PeerGroupsController.store: ');

        /** Create PeerGroup record **/
                //dd($request->all());
        
        $pg_input['peergroup_name'] = $request['peergroup_name'];
        $pg_input['user_id'] = Auth::user()->id; 
        $pg_input['created_by'] = Auth::user()->email;
        //dd($request['PriPubFlag']);
            if($request['private_public_flag'])
                {
                    $pg_input['private_public_flag'] = $request['private_public_flag'];
                      
                   
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


    /*** Delete a peer group from database ***/
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
