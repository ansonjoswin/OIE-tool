<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

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
        //return view('home');
        if (Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('admin'))
                return view('carousel', compact('user'));
            elseif ($user->hasRole('student'))
                return view('carousel', compact('user'));
            else
                return view('home', compact('user'));
        }
    }

     public function resetPassword()
    {
        $user = User::where('email', Auth::user()->email)->first();
        return view('auth.passwords.reset',compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $passwordSuccess = 'failed';
        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required|confirmed',
            ]);
        $user = User::where('email',Auth::user()->email)->first();
        if (Hash::check($request->oldpassword, $user->password))
        {
            $user->password = bcrypt($request->password);
            $user->update();
            $passwordSuccess = 'passed';
            return view('home',compact('passwordSuccess'));
        }
        return view('home',compact('passwordSuccess'));
    }
}
