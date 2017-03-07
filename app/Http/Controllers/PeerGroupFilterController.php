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

class PeerGroupFilterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->user = Auth::user();
        // $this->instcats = Instcat::all();
        // $this->stabbrs = Stabbr::all();
        // $this->results = School::pluck('school_name','School_ID');
        // $this->school_ids = $this->results->toArray();
        $this->new_array = [];
        $this->userpeergroups = PeerGroup::all();
//                $schools = School::all();  //EHLbug: This crashes everything and causes an http 500 error
    }

    public function index()
    {
        $instcat_list = Instcat::pluck('desc','id')->toArray();
        $stabbr_list = Stabbr::pluck('desc','id')->toArray();

        $selected_instcat_list = Instcat::pluck('desc','id')->toArray();
//        dd($selected_instcat_list);
        $selected_stabbr_list = Stabbr::pluck('desc','id')->toArray();
//        $selected_attribute3_list = [];

        $results = School::pluck('school_name','School_ID');
        $school_ids = $results->toArray();

        return view('pgfilter.index', compact('instcats', 'stabbrs', 'results', 'instcat_list', 'stabbr_list', 'selected_instcat_list', 'selected_stabbr_list', 'selected_attribute3_list', 'school_ids'));
    }
    public function show()
    {

    }

//    public function store(PeerGroupFormRequest $request)
//    {
//          ***send institution list to Mathias's view/controller to save***
//
//        return view('');
//
//    }

    public function ajaxresults(Request $request)
    {
        if(Request::ajax())
        {
            Log::info('This is the request: '.$request.'\n\n\n');
            // only using instcat for select right now to get the ajax working; will add stabbr and if statements once functional
            $selected_instcat_list = $request->selected_instcat_list;
    //        var_dump($selected_instcat_list);
            $results = School::where('Inst_Catgry', '=', $selected_instcat_list)->pluck('school_name','School_ID');
            $school_ids = $results->toArray();
            return $school_ids; //this function is being called, but there is no response data in the script
        }
        else{
            return 'no';
        }




//    public function ajaxresults(Request $request)
//    {

//        $selected_instcat_list = Input::get('selected_instcat_list');
//var_dump($selected_instcat_list);
//        $results = School::where('Inst_Catgry', '=', $selected_instcat_list)->pluck('school_name','School_ID')->get();
//        $school_ids = $results->toArray();
//        return Response::json(array_pluck($school_ids, 'school_name', 'School_ID'));

//        $instcat_list = Instcat::pluck('desc','id')->toArray();
//        $stabbr_list = Stabbr::pluck('desc','id')->toArray();
//
//        $selected_instcat_list = [];
//        $selected_stabbr_list = [];
//        $selected_attribute3_list = [];
//        array_push($selected_instcat_list, $request->get('instcat'));
//        array_push($selected_stabbr_list, $request->get('stabbr'));
////        array_push($selected_attribute3_list, $request->get('attribute3'));
//
//        $flag1 = 1;
//        $flag2 = 1;
//
//        if ($request->get('instcat') === '0') {
//            $flag1 = 0;
//            $selected_instcat_list = null;
//        }
//        if($request->get('stabbr') === '0') {
//            $flag2 = 0;
//            $selected_stabbr_list = null;
//        }
////        dd($request->get('instcat'), $request->get('stabbr'), $flag1, $flag2);
//
//        if(($flag1 == '0') && ($flag2 == '0')) {
//            $results = School::pluck('school_name','School_ID');
//
//        } elseif($flag1 == '1' and $flag2 == '1') {
//            $results = School::where('Inst_Catgry', '=', $selected_instcat_list)->where('School_State', '=', $selected_stabbr_list)->pluck('school_name','School_ID');
//        } elseif($flag1 == '1') {
//            $results = School::where('Inst_Catgry', '=', $selected_instcat_list)->pluck('school_name','School_ID');
//        } elseif ($flag2 == '1') {
//            $results = School::where('School_State', '=', $selected_stabbr_list)->pluck('school_name','School_ID');
//        }
//        $school_ids = $results->toArray();  //$results is a collection; $school_ids is an array of school ids and names
////            dd($school_ids);
//
//        return Response::json($school_ids->get());

    }

}