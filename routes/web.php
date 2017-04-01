<?php
use App\School;
use App\Carnegie_Classification;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('php-version', function()
{
    return phpinfo();
});

Route::get('laravel-version', function()
{
    $laravel = app();
    return 'Your Laravel Version is '.$laravel::VERSION;
});


Route::resource('new','ParametersController');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => 'web'], function () {
Route::auth();

/**Auth Routes**/
Auth::routes();
Route::get('/home', 'HomeController@index');
/*******************/


/***Password Routes***/
Route::get('resetPassword', 'HomeController@resetPassword');
Route::post('updatePassword', 'HomeController@updatePassword');
/*******************/


/***User Statistics Routes***/
Route::get('/userstats', 'UsersController@userstat');
/*******************/


/**** DATA VISUALIZATION SCATTERPLOT ****/
Route::resource('/testvisual', 'TestDataController');
Route::resource('/datavisual', 'DataVisualController');
Route::post('/datarefresh', 'TestDataController@refresh');
Route::get('/getExport', 'TestDataController@getExport');  // Export data to excel
/****************************************/

/*** Purge Data ***/
Route::resource('purgedata', 'PurgeDataController');
/*******************/


/***User Table route***/
Route::resource('users', 'UsersController');
/*******************/


/*** PEER GROUPS ***/
Route::resource('peergroups', 'PeerGroupsController');  // Lists Peer Groups (index method)
//Route::get('peergroups/create', 'PeerGroupsController@create');  // Creates a Peer Group (create method)
//Route::resource('peergroups/store', 'PeerGroupsController');  // Saves a Peer Group (store method)
Route::post('peergroups/delete', ['as'=>'pg_delete_url', 'uses'=>'PeerGroupsController@destroy']);  // Deletes a Peer Group (destroy method)
/*******************/


/****Comments Functionality Routes****/
Route::resource('usercomments', 'UserCommentsController');
Route::resource('replies', 'CommentRepliesController');
/*******************/


/**Summary Table Route**/
Route::post('datadisplay', 'DataTableController@datadisplay');
Route::resource('datatable', 'DataTableController');
Route::get('/data',function() {
  //Log::info('This is the get route and i');
   if(Request::ajax()){
      return('in ajax request ');
        // $selected_peergroup_list = Input::get('selected_instcat_list');


        //   $results = $selected_peergroup_list->school()->pluck('school_id','name');
        //   $school_ids = $results->toArray();
        //   return $school_ids;
        }
});
        
/*******************/


/**Uploads and Scheduler table Routes**/
Route::resource('uploads','UploadsController');
Route::post('uploads/enqueue','UploadsController@enqueue');
Route::resource('/logs', 'LogViewerController');
Route::resource('jobs','JobsController');
Route::resource('failed_jobs', 'Failed_jobsController');
/*******************/

/**AJAX for Institution filter (Peer Group create/edit) - called from peergroups/partial**/
Route::get('/this', function() {
Log::info('This is the get route and i');
   if(Request::ajax()){
//       return('in ajax request ');
       	$selected_instcat_list = Input::get('selected_instcat_list');
       	$selected_stabbr_list = Input::get('selected_stabbr_list');
        $selected_ccbasic_list = Input::get('selected_ccbasic_list');
        $ccbasicyearid = Input::get('ccbasicyearid');


        //No filters selected. Return all schools.
        if($selected_instcat_list == 0 && $selected_stabbr_list == "0" && $selected_ccbasic_list == -9)
        {

          $results = School::pluck('name','id');
          $school_ids = $results->toArray();
          return $school_ids;
        }

        //All filters selected. Filter by Category and Carnegie and State.
        elseif ($selected_instcat_list != 0 && $selected_stabbr_list != "0" && $selected_ccbasic_list != -9)
        {

          $results = School::where('institute_category', '=', $selected_instcat_list)->where('state', '=', $selected_stabbr_list)->pluck('name','id');

          $results = School::where('institute_category', '=', $selected_instcat_list)->where('state', '=', $selected_stabbr_list)->whereHas('carnegie_classifications',
              function($q) use($selected_ccbasic_list, $ccbasicyearid)
                {
                   $q->where('carnegie_basic', '=', $selected_ccbasic_list)->where('year', '=', $ccbasicyearid);
                })->pluck('name','id');

          $school_ids = $results->toArray();
          return $school_ids;
        }

        //Filter by Category and State.
        elseif ($selected_instcat_list != 0 && $selected_stabbr_list != "0" && $selected_ccbasic_list == -9)
        {
            $results = School::where('institute_category', '=', $selected_instcat_list)->where('state', '=', $selected_stabbr_list)->pluck('name','id');
            $school_ids = $results->toArray();
            return $school_ids;
        }

        //Filter by Category and Carnegie.
        elseif ($selected_instcat_list != 0 && $selected_stabbr_list == "0" && $selected_ccbasic_list != -9)
        {
            $results = School::where('institute_category', '=', $selected_instcat_list)->whereHas('carnegie_classifications',
                function($q) use($selected_ccbasic_list, $ccbasicyearid)
                {
                    $q->where('carnegie_basic', '=', $selected_ccbasic_list)->where('year', '=', $ccbasicyearid);
                })->pluck('name','id');
            $school_ids = $results->toArray();
            return $school_ids;
        }

        //Filter by State and Carnegie.
        elseif ($selected_instcat_list == 0 && $selected_stabbr_list != "0" && $selected_ccbasic_list != -9)
        {
            $results = School::where('state', '=', $selected_stabbr_list)->whereHas('carnegie_classifications',
                function($q) use($selected_ccbasic_list, $ccbasicyearid)
                {
                    $q->where('carnegie_basic', '=', $selected_ccbasic_list)->where('year', '=', $ccbasicyearid);
                })->pluck('name','id');
            $school_ids = $results->toArray();
            return $school_ids;
        }

        //Filter by Category
       elseif ($selected_instcat_list != 0 && $selected_stabbr_list == "0" && $selected_ccbasic_list == -9)
       {
           $results = School::where('institute_category', '=', $selected_instcat_list)->pluck('name','id');
           $school_ids = $results->toArray();
           return $school_ids;
       }
        //Filter by State
        elseif($selected_instcat_list == 0 && $selected_stabbr_list != "0" && $selected_ccbasic_list == -9)
        {
          $results = School::where('state', '=', $selected_stabbr_list)->pluck('name','id');
          $school_ids = $results->toArray();
          return $school_ids;
        }

       //Filter by Carnegie Classification
       elseif ($selected_instcat_list == "0" && $selected_stabbr_list == 0 && $selected_ccbasic_list != -9)
       {
           $results = School::whereHas('carnegie_classifications', function($q) use($selected_ccbasic_list, $ccbasicyearid)
           {
               $q->where('carnegie_basic', '=', $selected_ccbasic_list)->where('year', '=', $ccbasicyearid);
           })->pluck('name','id');
           $school_ids = $results->toArray();
           return $school_ids;
       }
     }
});
/*******************/

/**Roles Table Routes***/
// Route::resource('roles', 'RolesController');
/*******************/

/*** Test Table Views ***/
// Route::resource('ug_unduplicatedheadcounts', 'UG_UnduplicatedHeadCountsController');
// Route::resource('ug_credithours', 'UG_CreditHoursController');
// Route::resource('admissions', 'AdmissionsController');
// Route::resource('finances', 'FinancesController');
// Route::resource('private_nprofs', 'Private_NProfsController');
// Route::resource('private_profs', 'Private_ProfsController');
// Route::resource('publicfs', 'PublicFsController');
// Route::resource('defaultrates', 'DefaultRatesController');
// Route::resource('employees', 'EmployeesController');
// Route::resource('graduations', 'GraduationsController');
// Route::resource('completions', 'completionsController');
// Route::resource('instructional_ess', 'Instructional_ESsController');
// Route::resource('noninstructional_ess', 'NonInstructional_ESsController');
// Route::resource('applicationdetails', 'ApplicationDetailsController
// Route::resource('map_tables','Map_TablesController');
// Route::resource('schools', 'SchoolsController');
// Route::resource('instructional_ess', 'Instructional_ESsController');
/*******************/




