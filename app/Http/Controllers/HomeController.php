<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use App\UserComment;
use App\ReplyComment;

class HomeController extends Controller
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
            {
                $comments = UserComment::all();
                if(ReplyComment::first())
                {
                    $replyexists = true;
                }
                else{
                    $replyexists = false;
                }
                return view('adminhome', compact('user','comments','replyexists'));
            }

            // elseif ($user->hasRole('student'))
            //     return view('adminhome', compact('user'));
            else{
                $comments = UserComment::all();
                if(ReplyComment::first())
                {
                    $replyexists = true;
                }
                else{
                    $replyexists = false;
                }
                return view('home', compact('user', 'comments', 'replyexists'));
            }
        }
    }


    public function resetPassword()
    {
        $user = User::where('email', Auth::user()->email)->first();
        return view('auth.passwords.update',compact('user'));
    }
	
	public function uploads()
	{
         if (Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('admin'))
                return view('carousel', compact('user'));
            // elseif ($user->hasRole('student'))
            //     return view('carousel', compact('user'));
            else
                return view('home', compact('user'));
        }
    
        
	}

    public function updatePassword(Request $request)
    {
        $passwordSuccess = 'failed';
        $this->validate($request,[
                'password' => 'required|min:6|different:oldpassword|confirmed',
                
            ]);
        $user = User::where('email',Auth::user()->email)->first();
        if (Hash::check($request->oldpassword, $user->password))
        {
            $user->password = bcrypt($request->password);
            $user->update();
            $passwordSuccess = 'passed';
            return view('users.RegistrationSuccess',compact('passwordSuccess'));
        }
        return view('users.RegistrationSuccess',compact('passwordSuccess'));
    }
}
