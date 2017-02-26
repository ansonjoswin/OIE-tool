<?php

namespace App\Http\Controllers;

use App\Map_Table;
use Illuminate\Support\Facades\Request;
use App\Jobs\SeedSchools;
use App\Jobs\SeedGraduations;
use App\Jobs\SeedAdmissions;
use App\Jobs\SeedFallenrollment;
use App\Jobs\SeedEmployees;
use App\Jobs\SeedDefaultrates;
use App\Jobs\SeedInstructionalstaff;
use App\Jobs\SeedNoninstructionalstaff;
use App\Jobs\SeedCompletions;
use App\Jobs\SeedPrivateprofit;
use App\Jobs\SeedUGCredithours;
use App\Jobs\SeedPublic;
use App\Jobs\SeedPrivateNonprofit;
use App\Jobs\SeedUGUnduplicatedheadcount;
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
        $requestParams = $request::all();

        $filetype = $requestParams["filetype"];
        $fileyear = $requestParams["fileyear"];

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
                
                $filename = $_FILES['upl']['name'];
                
                if($filetype == 'schools')
                   $this->dispatch(new SeedSchools());

                if($filetype == 'admissions')
                   $this->dispatch(new SeedAdmissions());

                if($filetype == 'fallenrollment')
                   $this->dispatch(new SeedFallenrollment());

                if($filetype == 'employees')
                   $this->dispatch(new SeedEmployees());

                if($filetype == 'defaultrates')
                   $this->dispatch(new SeedDefaultrates());

                if($filetype == 'instructionalstaff')
                   $this->dispatch(new SeedInstructionalstaff());

                if($filetype == 'graduations')
                   $this->dispatch(new SeedGraduations());

                if($filetype == 'noninstructionalstaff')
                   $this->dispatch(new SeedNoninstructionalstaff());

                if($filetype == 'completions')
                   $this->dispatch(new SeedCompletions());

                if($filetype == 'ugcredithours')
                   $this->dispatch(new SeedUGCredithours());

                if($filetype == 'ugunduplicatedheadcount')
                   $this->dispatch(new SeedUGUnduplicatedheadcount());

                if($filetype == 'privateprofit')
                   $this->dispatch(new SeedPrivateprofit());

                if($filetype == 'privatenonprofit')
                   $this->dispatch(new SeedPrivateNonprofit());

                if($filetype == 'public')
                   $this->dispatch(new SeedPublic());

                Map_Table::create(["csv_name" => $filename, "local_filename" => $filetype, "year" => $fileyear]);

                return '{"status":"success"}';
            }
        }
        return '{"status":"error"}';
    }
}
