<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UG_UnduplicatedHeadCount;
use App\School;

class UG_UnduplicatedHeadCountsController extends Controller
{
    public function index()
    {
        $ug_unduplicatedheadcounts=UG_UnduplicatedHeadCount::all();
        return view('ug_unduplicatedheadcounts.index',compact('ug_unduplicatedheadcounts'));
    }
    public function store(Request $request)
    {
        $ug_unduplicatedheadcount= new UG_UnduplicatedHeadCount($request->all());
        $ug_unduplicatedheadcount->save();
        return redirect('ug_unduplicatedheadcounts');
    }
    public function update($UG_UndupHdcnt_ID,Request $request)
    {
        //
        $ug_unduplicatedheadcount= new UG_UnduplicatedHeadCount($request->all());
        $ug_unduplicatedheadcount=UG_UnduplicatedHeadCount::find($UG_UndupHdcnt_ID);
        $ug_unduplicatedheadcount->update($request->all());
        return redirect('ug_unduplicatedheadcounts');
    }
    public function destroy($UG_UndupHdcnt_ID)
    {
        try {

            $ug_unduplicatedheadcount = UG_UnduplicatedHeadCount::where('UG_UndupHdcnt_ID', '=', $UG_UndupHdcnt_ID)->delete();

        }catch(Exception $ex) {

            Log::exception($ex);
        }
        return redirect('ug_unduplicatedheadcounts'); //Once Deleted the page is redirected to customers.
    }

}
