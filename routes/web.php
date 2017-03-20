<?php
use App\School;
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
Route::post('/datarefresh', 'DataVisualController@refresh');
/****************************************/

/**Export to csv****/
Route::get('/getExport', 'ExporttoExcelController@getExport');
/****************************************/


/***User Table route***/
Route::resource('users', 'UsersController');
/*******************/


/*** PEER GROUPS ***/
Route::resource('peergroups', 'PeerGroupsController');  // Lists Peer Groups (index method)
Route::get('peergroups/create', 'PeerGroupsController@create');  // Creates a Peer Group (create method)
Route::resource('peergroups/store', 'PeerGroupsController');  // Saves a Peer Group (store method)
Route::post('peergroups/delete', ['as'=>'pg_delete_url', 'uses'=>'PeerGroupsController@destroy']);  // Deletes a Peer Group (destory method)
/*******************/


/****Comments Functionality Routes****/
Route::resource('usercomments', 'UserCommentsController');
Route::resource('replies', 'CommentRepliesController');
/*******************/


/**Summary Table Route**/
Route::resource('datatable', 'DataTableController');
/*******************/


/**Uploads and Scheduler table Routes**/
Route::resource('uploads','UploadsController');
Route::post('uploads/enqueue','UploadsController@enqueue');
Route::resource('/logs', 'LogViewerController');
Route::resource('jobs','JobsController');
Route::resource('failed_jobs', 'Failed_jobsController');
/*******************/

/*** Peer Group Filter ***/
Route::resource('pgfilter', 'PeerGroupFilterController');
Route::get('/this', function() {
  //Log::info('This is the get route and i');
   if(Request::ajax()){
 
        $selected_instcat_list = Input::get('selected_instcat_list');
        $selected_stabbr_list = Input::get('selected_stabbr_list');

        //Both are "All". Return nothing.
        if($selected_instcat_list == 0 && $selected_stabbr_list == "0")
        {
          $results = School::pluck('name','id');
          $school_ids = $results->toArray();
          return $school_ids;
        }

        //Filter by Category and State
        if($selected_instcat_list != 0 && $selected_stabbr_list != "0")
        {
          $results = School::where('institute_category', '=', $selected_instcat_list)->where('state', '=', $selected_stabbr_list)->pluck('name','id');
          $school_ids = $results->toArray();
          return $school_ids;
        }

        //Filter by State
        if($selected_instcat_list == 0)
        {
          $results = School::where('state', '=', $selected_stabbr_list)->pluck('name','id');
          $school_ids = $results->toArray();
          return $school_ids;
        }

        //Filter by Category
        if($selected_stabbr_list == "0")
        {
          $results = School::where('institute_category', '=', $selected_instcat_list)->pluck('name','id');
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




