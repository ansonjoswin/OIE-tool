<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UG_CreditHour;
use App\School;

class UG_CreditHoursController extends Controller
{
    public function index()
    {
        $ug_credithours=UG_CreditHour::all();
        return view('ug_credithours.index',compact('ug_credithours'));
    }
    public function store(Request $request)
    {
        $ug_credithour= new UG_CreditHour($request->all());
        $ug_credithour->save();
        return redirect('ug_credithours');
    }
    public function update($UG_CreditHours_ID,Request $request)
    {
        //
        $ug_credithour= new UG_CreditHour($request->all());
        $ug_credithour=UG_CreditHour::find($UG_CreditHours_ID);
        $ug_credithour->update($request->all());
        return redirect('ug_credithours');
    }
    public function destroy($UG_CreditHours_ID)
    {
        try {

            $ug_credithour = UG_CreditHour::where('UG_CreditHours_ID', '=', $UG_CreditHours_ID)->delete();

        }catch(Exception $ex) {

            Log::exception($ex);
        }
        return redirect('ug_credithours'); //Once Deleted the page is redirected to customers.
    }
}
