<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PeerGroupIndvAddRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\PeerGroup;
use App\User;
use App\School;
use Auth;
use Session;
use Log;
use App\Http\Controllers\Controller;

class PeerGroupIndvFilterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        Log::info('PeerGroupsIndvFilterController.index: ');
        $this->viewData['heading'] = "Add Institution to Peer Group";
        return view('peergroups.individual.index', $this->viewData);
    }

}
