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

class PeerGroupFilterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->results = DB::table('schools')->pluck('school_name');
//        dd($this->results);
        //        $schools = School::all();  //EHLbug: This crashes everything and causes an http 500 error :(
    }

    public function index() // this request should probably be in a post action, need to figure out how to have on same page though
    {
        $selected_attribute1_list = [];
        $selected_attribute2_list = [];
        $selected_attribute3_list = [];
        //dd(DB::table('schools'));
        $results = DB::table('schools')->pluck('school_name');
        //dd($results);
        $attribute1_list = [
            '1' => 'Public',
            '2' => 'Private not-for-profit',
            '3' => 'Private for-profit',
            '-3' => '{Not available}'
        ]; // CONTROL column (Schools table) - all options
        $attribute2_list = [
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas'
        ]; // STABBR column (Schools table) - sample of the options (need to complete list)

        $attribute3_list = [
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




    public function store(PeerGroupFormRequest $request)
        // need to create or update in another function?
    {

        $selected_attribute1_list = [];
        $selected_attribute2_list = [];
        $selected_attribute3_list = [];
        //$var1 = $request->get('attribute1');
        $attribute1_list = [
            '1' => 'Public',
            '2' => 'Private not-for-profit',
            '3' => 'Private for-profit',
            '-3' => '{Not available}'
        ]; // CONTROL column (Schools table) - all options
        $attribute2_list = [
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas'
        ]; // STABBR column (Schools table) - sample of the options (need to complete list)

        $attribute3_list = [
            '17' => 'Doctoral/Research Universities',
            '18' => 'Master\'s Colleges and Universities (larger programs)',
            '23' => 'Baccalaureate/Associate\'s Colleges'
        ]; // CCBASIC column (Carnegie_Classification table) - sample of the options - may use different attribute

        array_push($selected_attribute1_list, $request->get('attribute1'));
        array_push($selected_attribute2_list, $request->get('attribute2'));
        array_push($selected_attribute3_list, $request->get('attribute3'));

        $results = DB::table('schools')->where('School_Control', '=', $selected_attribute1_list)->where('School_State', '=', $selected_attribute2_list)->pluck('school_name')->toArray();

        $input = $request->all();
        $this->populateCreateFields($input);
        return view('pgfilter.index', compact('attribute1_list', 'attribute2_list', 'attribute3_list', 'selected_attribute1_list', 'selected_attribute2_list', 'selected_attribute3_list', 'results'));

    }

}