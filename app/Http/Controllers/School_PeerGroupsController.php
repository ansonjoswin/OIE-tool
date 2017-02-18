<?php
namespace App\Http\Controllers;

use App\School_PeerGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\PeerGroup;
use App\User;

use Auth;
use Session;
use Log;

class School_PeerGroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $school_peergroups=School_PeerGroup::all();
        return view('school_peergroups.index',compact('school_peergroups'));
    }
}