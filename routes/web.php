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
//Route::get('peergroups/create', 'PeerGroupsController@create');  // Creates a Peer Group (create method)
//Route::resource('peergroups/store', 'PeerGroupsController');  // Saves a Peer Group (store method)
Route::post('peergroups/delete', ['as'=>'pg_delete_url', 'uses'=>'PeerGroupsController@destroy']);  // Deletes a Peer Group (destroy method)
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
// Route::get('/this', function() {
  //Log::info('This is the get route and i');
   // if(Request::ajax()){
 
   //      $selected_instcat_list = Input::get('selected_instcat_list');
   //      $selected_stabbr_list = Input::get('selected_stabbr_list');

// /*** School_peergroups ***/
// Route::resource('school_peergroups', 'School_PeerGroupsController'); // Lists Peer Group Schools (index method)
// /*** end School_peergroups***/

/*** Peer Group Filter ***/
Route::resource('pgfilter', 'PeerGroupFilterController');
Route::get('pgfilter/edit', 'PeerGroupsController@edit');
/*** end Peer Group filter ***/

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

          $results = School::where('institute_category', '=', $selected_instcat_list)->where('state', '=', $selected_stabbr_list)->whereHas('carnegie_classification',
              function($q) use($selected_ccbasic_list)
                {
                   $q->where('carnegie_basic', '=', $selected_ccbasic_list)->where('year', '=', $ccbasicyearid);
                })->pluck('name','id');
            //EHLbug: when schools and cc tables both had PK/FK = School_ID, the child query produced the SQL:
            //"and exists (select * from `carnegie_classifications` where `schools`.`School_ID` = `carnegie_classifications`.`school_School_ID` and `Cng_2000` = 21))"
            //Eloquent default is that parent PK = 'id' and child FK = 'parentmodelname_id', so it was appending "school_" to look for the FK in cc table
            //I have changed the hasOne and belongsTo statements to specify exact column names rather than use defaults
            //It works!

          $school_ids = $results->toArray();
          return $school_ids;
        }

        //Filter by Category and State.
        elseif ($selected_instcat_list != 0 && $selected_stabbr_list != "0" && $selected_ccbasic_list == -9)
        {
            $results = School::where('institute_category', '=', $selected_instcat_list)->where('state', '=', $selected_stabbr_list)->pluck('name','school_id');
            $school_ids = $results->toArray();
            return $school_ids;
        }

        //Filter by Category and Carnegie.
        elseif ($selected_instcat_list != 0 && $selected_stabbr_list == "0" && $selected_ccbasic_list != -9)
        {
            $results = School::where('institute_category', '=', $selected_instcat_list)->whereHas('carnegie_classification',
                function($q) use($selected_ccbasic_list)
                {
                    $q->where('carnegie_basic', '=', $selected_ccbasic_list)->where('year', '=', $ccbasicyearid);
                })->pluck('name','school_id');
            $school_ids = $results->toArray();
            return $school_ids;
        }

        //Filter by State and Carnegie.
        elseif ($selected_instcat_list == 0 && $selected_stabbr_list != "0" && $selected_ccbasic_list != -9)
        {
            $results = School::where('state', '=', $selected_stabbr_list)->whereHas('carnegie_classification',
                function($q) use($selected_ccbasic_list)
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

       	elseif ($selected_instcat_list == 0 && $selected_stabbr_list != "0" && $selected_ccbasic_list == -9)
       	{
       		$results = School::where('state', '=', $selected_stabbr_list)->pluck('name','id');
			    $school_ids = $results->toArray();
		      return $school_ids;
		    }

       //Filter by Carnegie Classification
       elseif ($selected_instcat_list == "0" && $selected_stabbr_list == 0 && $selected_ccbasic_list != -9)
       {
           $results = School::whereHas('carnegie_classification', function($q) use ($selected_ccbasic_list)
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




