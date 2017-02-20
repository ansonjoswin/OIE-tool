<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SeedSchools;
use Auth;

class UploadsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
         if (Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('admin'))
                return view('uploads.index', compact('user'));
            elseif ($user->hasRole('student'))
                return view('uploads.index', compact('user'));
            else
                return view('home', compact('user'));
        }
	}

    public function enqueue(Request $request)
    {
        $allowed = array('csv');

        if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

            $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

            if(!in_array(strtolower($extension), $allowed)){
                return '{"status":"wrong file"}';
            }

            $upload_dir = '../storage/app/uploads/';

            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if(move_uploaded_file($_FILES['upl']['tmp_name'], $upload_dir.$_FILES['upl']['name'])){
                $this->dispatch(new SeedSchools());
                return '{"status":"success"}';
            }
        }
        return '{"status":"error"}';
    }
}
