<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeerGroupFormRequest;
use Illuminate\Auth\Access\Response;
use Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use DB;
use App\Instcat;
use App\Stabbr;
use App\User;
use App\School;
use App\PeerGroup;
use App\School_PeerGroup;
use App\Ccbasic;

class PeerGroupFilterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->user = Auth::user();
        // $this->instcats = Instcat::all();
        // $this->stabbrs = Stabbr::all();
        // $this->results = School::pluck('name','id');
        //$this->school_ids = $this->results->toArray();

        $this->new_array = [];
        //$this->userpeergroups = PeerGroup::all();
//                $schools = School::all();  //EHLbug: This crashes everything and causes an http 500 error
    }

    public function index()
    {
        $instcat_list = Instcat::pluck('desc','id')->toArray();
        $stabbr_list = Stabbr::pluck('desc','id')->toArray();
        $ccbasic_list = Ccbasic::pluck('desc','id')->toArray();

        $selected_instcat_list = Instcat::pluck('desc','id')->toArray();
        $selected_stabbr_list = Stabbr::pluck('desc','id')->toArray();
        $selected_ccbasic_list = Ccbasic::pluck('desc','id')->toArray();

        $ccbasicyearid = 2014;

        $results = School::pluck('name','id');
        $school_ids = $results->toArray();
        //return($school_ids);
        return view('pgfilter.index', compact('instcats', 'stabbrs', 'results', 'instcat_list', 'stabbr_list','ccbasic_list', 'selected_instcat_list', 'selected_stabbr_list','selected_ccbasic_list', 'school_ids','ccbasicyearid'));
    }

    public function show()
    {
        //
    }

//    public function store(PeerGroupFormRequest $request)
//    {
//          ***send institution list to Mathias's view/controller to save***
//
//        return view('');
//
//    }


/**Function not called here, resued in web.php to handle ajax requests****/

//     public function ajaxresults(Request $request)
//     {
//         if(Request::ajax())
//         {
//             Log::info('This is the request: '.$request.'\n\n\n');
//             // only using instcat for select right now to get the ajax working; will add stabbr and if statements once functional
//             $selected_instcat_list = $request->selected_instcat_list;
//     //        var_dump($selected_instcat_list);

//             $results = School::where('Inst_Catgry', '=', $selected_instcat_list)->pluck('School_Name','School_Id');

//             $school_ids = $results->toArray();
//             return $school_ids; //this function is being called, but there is no response data in the script
//         }
//         else{
//             return 'no';
//         }

//     }

 }


    /*** Edit a peer group ***/
    public function edit(PeerGroup $peergroup)
    {
        $instcat_list = Instcat::pluck('desc','id')->toArray();
        $stabbr_list = Stabbr::pluck('desc','id')->toArray();
        $ccbasic_list = Ccbasic::pluck('desc','id')->toArray();

        $selected_instcat_list = Instcat::pluck('desc','id')->toArray();
        $selected_stabbr_list = Stabbr::pluck('desc','id')->toArray();
        $selected_ccbasic_list = Ccbasic::pluck('desc','id')->toArray();

        $results = School::pluck('name','id');
        $school_ids = $results->toArray();

        $user = Auth::user();
        $peergroups = PeerGroup::where('user_id',Auth::user()->id)->get();
        $pg_id = $peergroup->peergroup_id;
        $list_school = $pgid->school()->pluck('id','name');
        //$school_peergroups = DB::table('school_peergroups')->where('PeerGroupID', '=', $pg_id)->get();
        $object = $peergroup;
        // $list_schoolIDs = $school_peergroups->pluck('id');
        // $list_school = School::select('School_ID', 'School_Name')->whereIn('School_ID', $list_schoolIDs)->get();
        $this->viewData['user_id'] = Auth::user()->id;
        $this->viewData['peergroup'] = $object;
        $this->viewData['school_peergroup'] = $object;
        $this->viewData['heading'] = "Edit Peer Group";
        $this->viewData['list_school'] = $list_school;
//        dd($list_school);
        return view('pgfilter.edit', $this->viewData, compact('instcats', 'stabbrs', 'results', 'instcat_list', 'stabbr_list', 'ccbasic_list', 'selected_instcat_list', 'selected_stabbr_list', 'selected_ccbasic_list', 'school_ids'));
    }

    /*** Update a peer group ***/
    public function update(PeerGroup $peergroup, PeerGroupFormRequest $request)
    {

//        $object = ;
        $this->populateUpdateFields($request);
        $peergroupid = $object->peergroup_id;


        /*-------------------------------------------------------------------*/
      /****** research how to update pivot table, the below will not work*****/
      /*-------------------------------------------------------------------*/

      
        // $list_school = School_PeerGroup::where('PeerGroupID', '=', $peergroupid);
        // Log::info('PeerGroupsController.update - Start: '.$object->PeerGroupID.'|'.$object->PeerGroupName);
        // $object->update($request->all());
        // $this->syncSchools($object, $request->input('schoollist'));
        // Session::flash('flash_message', 'Peer Group successfully updated!');

        // Log::info('PeerGroupsController.update - End: '.$object->PeerGroupID.'|'.$object->PeerGroupName);
        return redirect('peergroups');
    }


}