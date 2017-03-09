<?php
//namespace Rap2hpoutre\LaravelLogViewer;

//controller.php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;

use App\LaravelLogViewer;
use Auth;
use Log;
use App\User;
use App\Role;
// if (class_exists("\\Illuminate\\Routing\\Controller")) {
//     class BaseController extends \Illuminate\Routing\Controller {}
// } else if (class_exists("Laravel\\Lumen\\Routing\\Controller")) {
//     class BaseController extends \Laravel\Lumen\Routing\Controller {}
// }

class LogViewerController extends BaseController
{
    protected $request;

    public function __construct ()
    {
        $this->request = app('request');
    }
    public function index()
    {
        
        if (Auth::check()){
        if ($this->request->input('l')) {
            LaravelLogViewer::setFile(base64_decode($this->request->input('l')));
        }

        if ($this->request->input('dl')) {
            return $this->download(LaravelLogViewer::pathToLogFile(base64_decode($this->request->input('dl'))));
        } elseif ($this->request->has('del')) {
            app('files')->delete(LaravelLogViewer::pathToLogFile(base64_decode($this->request->input('del'))));
            return $this->redirect($this->request->url());
        }

        $logs = LaravelLogViewer::all();

        return app('view')->make('log', [
            'logs' => $logs,
            'files' => LaravelLogViewer::getFiles(true),
            'current_file' => LaravelLogViewer::getFileName()
        ]);
 
    }

    else
    {
        return('/login');
    }
}

    private function redirect($to)
    {
        if (function_exists('redirect')) {
            return redirect($to);
        }

        return app('redirect')->to($to);
    }

    private function download($data)
    {
        if (function_exists('response')) {
            return response()->download($data);
        }

        // For laravel 4.2
        return app('\Illuminate\Support\Facades\Response')->download($data);
    }
}
