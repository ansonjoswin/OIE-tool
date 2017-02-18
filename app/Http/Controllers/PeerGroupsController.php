<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PeerGroup;
use App\User;

use Auth;
use Session;
use Log;

class PeerGroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
         $peergroups=PeerGroup::all();
        return view('peergroups.index',compact('peergroups'));
    }
}
