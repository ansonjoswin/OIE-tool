<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserComment;
use Session;
use DB;
use Log;



class UserCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            $comments = UserComment::all();
        return view('usercomments.index',compact('comments'));
    }
    else
    {
        return redirect('/login');
    }
    }

    //  /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function reply()
    // {
    //     if(Auth::check()){
    //         $comments = UserComment::all();
    //     return view('usercomments.index',compact('comments'));
    // }
    // else
    // {
    //     return redirect('/login');
    // }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){  
        $user = Auth::user();
        $data=[
        'user_id'=>$request->user_id,
        'author'=>$user->name,
        'email'=>$user->email,
        'comment_text'=>$request->comment_text
        ];


UserComment::create($data);

      
        Session::flash('flash_message', 'Your comment has been submitted and is waiting moderation by the administrator');

       // $request->session()->flash('comment_flash','Your comment has been submitted and is waiting moderation by the administrator');

        return redirect()->back();
    }

    else
    {
        return redirect('/login');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrfail($id);
        $comments = $user->comments;
        return view('usercomments/show',compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       
        UserComment::findOrfail($id)->update($request->all());
        return redirect('/usercomments');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        UserComment::find($id)->delete();
        
 
        Session::flash('flash_message', 'Comment successfully deleted!');
        //Log::info('UsersController.destroy: End: ');
        return redirect()->back();


        
    }
}
