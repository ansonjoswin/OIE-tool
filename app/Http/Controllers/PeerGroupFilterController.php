<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeerGroupFormRequest;
use Illuminate\Http\Request;
use Auth;
use Session;
use Input;
use DB;
use App\User;
use App\School;
use App\PeerGroup;
use App\School_PeerGroup;

class PeerGroupFilterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->results = School::pluck('school_name','school_ID');

//        School::chunk(200, function ($schools) {
//        foreach ($schools as $school) {
////            $results = ;
//            }
//        });
//        dd($this->results);
        $this->userpeergroups = PeerGroup::all();
            // DB::table('peergroups');
//        dd($this->results);
        //        $schools = School::all();  //EHLbug: This crashes everything and causes an http 500 error :(
    }

    public function index() // this request should probably be in a post action, need to figure out how to have on same page though
    {
        $selected_attribute1_list = [];
        $selected_attribute2_list = [];
        $selected_attribute3_list = [];
        //dd(DB::table('schools'));
        $results = School::pluck('school_name','school_ID');
        //dd($results);
        $attribute1_list = [
            '0' => 'All',
            '1' => 'Degree-granting, graduate with no undergraduate degrees',
            '2' => 'Degree-granting, primarily baccalaureate or above',
            '3' => 'Degree-granting, not primarily baccalaureate or above',
            '4' => 'Degree-granting, associate\'s and certificates',
            '5' => 'Nondegree-granting, above the baccalaureate',
            '6' => 'Nondegree-granting, sub-baccalaureate',
            '7' => 'Not reported',
            '9' => 'Not applicable'
        ]; // INSTCAT column (Schools table) - all options

        $attribute2_list = [
            '0' => 'All',
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming',
            'AS' => 'American Samoa',
            'FM' => 'Federated States of Micronesia',
            'GU' => 'Guam',
            'MH' => 'Marshall Islands',
            'MP' => 'Northern Marianas',
            'PW' => 'Palau',
            'PR' => 'Puerto Rico',
            'VI' => 'Virgin Islands'
        ]; // STABBR column (Schools table)

        $attribute3_list = [
            '0' => 'All',
            '17' => 'Doctoral/Research Universities',
            '18' => 'Master\'s Colleges and Universities (larger programs)',
            '23' => 'Baccalaureate/Associate\'s Colleges'
        ]; // CCBASIC column (Carnegie_Classification table) - sample of the options - may use different attribute

//        $attribute1 = 1;  // hard-coding a value to test the query
//        $attribute2 = 'AZ';  // hard-coding a value to test the query
//        $attribute3 = 17; // hard-coding a value to test the query


        // EHLbug: ^this needs to be fixed because the user may only choose one control; if only attribute1 is chosen it will not return correct list

//        var_dump($results);
//        dd($attribute1_list);


        return view('pgfilter.index', compact('attribute1_list', 'attribute2_list', 'attribute3_list', 'results', 'selected_attribute1_list', 'selected_attribute2_list', 'selected_attribute3_list'));
    }

// EHLbug: need to make create, edit, delete, etc functions - refactor!!! code is terribly written :(


    public function store(PeerGroupFormRequest $request)
        // need to create or update in another function
    {

        $selected_attribute1_list = [];
        $selected_attribute2_list = [];
        $selected_attribute3_list = [];

        $attribute1_list = [
            '0' => 'All',
            '1' => 'Degree-granting, graduate with no undergraduate degrees',
            '2' => 'Degree-granting, primarily baccalaureate or above',
            '3' => 'Degree-granting, not primarily baccalaureate or above',
            '4' => 'Degree-granting, associate\'s and certificates',
            '5' => 'Nondegree-granting, above the baccalaureate',
            '6' => 'Nondegree-granting, sub-baccalaureate',
            '-1' => 'Not reported',
            '-2' => 'Not applicable'
        ]; // INSTCAT column (Schools table) - all options

        $attribute2_list = [
            '0' => 'All',
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming',
            'AS' => 'American Samoa',
            'FM' => 'Federated States of Micronesia',
            'GU' => 'Guam',
            'MH' => 'Marshall Islands',
            'MP' => 'Northern Marianas',
            'PW' => 'Palau',
            'PR' => 'Puerto Rico',
            'VI' => 'Virgin Islands'
        ]; // STABBR column (Schools table)

        $attribute3_list = [
            '0' => 'All',
            '17' => 'Doctoral/Research Universities',
            '18' => 'Master\'s Colleges and Universities (larger programs)',
            '23' => 'Baccalaureate/Associate\'s Colleges'
        ]; // CCBASIC column (Carnegie_Classification table) - sample of the options - may use different attribute

        array_push($selected_attribute1_list, $request->get('attribute1'));
        array_push($selected_attribute2_list, $request->get('attribute2'));
        array_push($selected_attribute3_list, $request->get('attribute3'));

        $flag1 = 0;
        $flag2 = 0;
//dd($request->get('attribute2'));
        if ($request->get('attribute1') === '0') {
            $flag1 = 1;
            $selected_attribute1_list = null;
        }
        if($request->get('attribute2') === '0') {
            $flag2 = 1;
            $selected_attribute2_list = null;
        }
//dd($flag2);

        if(($flag1 == '1') && ($flag2 == '1')) {
            //dd('3');
            $results = School::pluck('school_name','school_ID')->toArray();

        } elseif($flag2 == '1') {
//            dd('1');
            $results = School::where('Inst_Catgry', '=', $selected_attribute1_list)->pluck('school_name','school_ID')->toArray();
        } elseif ($flag1 == '1') {
//            dd('2');
            $results = School::where('School_State', '=', $selected_attribute2_list)->pluck('school_name','school_ID')->toArray();
            //dd($results);
        }   else {
//            dd('dd');
            $results = School::where('Inst_Catgry', '=', $selected_attribute1_list)->where('School_State', '=', $selected_attribute2_list)->pluck('school_name','school_ID')->toArray();
        }

//        $results = School::where('Inst_Catgry', '=', $selected_attribute1_list)->where('School_State', '=', $selected_attribute2_list)->pluck('school_name','school_ID')->toArray();
dd($results);
//        request->all();
//        $this->populateCreateFields($input);
        return view('pgfilter.index', compact('attribute1_list', 'attribute2_list', 'attribute3_list', 'selected_attribute1_list', 'selected_attribute2_list', 'selected_attribute3_list', 'results'));

    }

//    public function showpeergroups($userpeergroups)
//    {
//        //        $peergroups = $this->user->peergroups()->get();
//        $this->userpeergroups = PeerGroup::where('user_ID','=', Auth::id())->get();
////        var_dump($this->peergroups);
//        dd($this->userpeergroups);
////        dd($user);
//        return redirect('pgfilter/viewpeergroups', compact('userpeergroups'));
//    }

}