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

Route::get('/home', 'HomeController@index');
Route::get('resetPassword', 'HomeController@resetPassword');
Route::resource('/logs', 'LogViewerController');
Route::resource('failed_jobs', 'Failed_jobsController');


Route::post('updatePassword', 'HomeController@updatePassword');

Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController');
Route::resource('schools', 'SchoolsController');
Route::resource('jobs','JobsController');

Route::resource('ug_unduplicatedheadcounts', 'UG_UnduplicatedHeadCountsController');
Route::resource('ug_credithours', 'UG_CreditHoursController');
Route::resource('admissions', 'AdmissionsController');
Route::resource('finances', 'FinancesController');
Route::resource('private_nprofs', 'Private_NProfsController');
Route::resource('private_profs', 'Private_ProfsController');
Route::resource('publicfs', 'PublicFsController');

/**** DATA VISUALIZATION SCATTERPLOT ****/
Route::resource('/testvisual', 'TestDataController');
Route::resource('/datavisual', 'DataVisualController');
/****************************************/

Route::resource('instructional_ess', 'Instructional_ESsController');

Route::resource('noninstructional_ess', 'NonInstructional_ESsController');


/*** PEER GROUPS ***/
Route::resource('peergroups', 'PeerGroupsController');  // Lists Peer Groups (index method)
Route::get('peergroups/create', 'PeerGroupsController@create');  // Creates a Peer Group (create method)
Route::resource('peergroups/store', 'PeerGroupsController');  // Saves a Peer Group (store method)
Route::post('peergroups/delete', ['as'=>'pg_delete_url', 'uses'=>'PeerGroupsController@destroy']);  // Deletes a Peer Group (destory method)
/*******************/

/*** Peer Group Filter ***/
Route::resource('pgfilter', 'PeerGroupFilterController');
//Route::get('pgfilter/this', 'PeerGroupFilterController@ajaxresults');
//Route::get('pgfilter', 'HomeController@this');

Route::get('/this', function() {
	//Log::info('This is the get route and i');
   if(Request::ajax()){
       	$selected_instcat_list = Input::get('selected_instcat_list');
       	$selected_stabbr_list = Input::get('selected_stabbr_list');

        //Both are "All". Return nothing.
        if($selected_instcat_list == 0 && $selected_stabbr_list == "0")
        {
          $results = School::pluck('school_name','School_ID');
          $school_ids = $results->toArray();
          return $school_ids;
        }

        //Filter by Category and State
        if($selected_instcat_list != 0 && $selected_stabbr_list != "0")
        {
          $results = School::where('Inst_Catgry', '=', $selected_instcat_list)->where('School_State', '=', $selected_stabbr_list)->pluck('school_name','School_ID');
          $school_ids = $results->toArray();
          return $school_ids;
        }

        //Filter by State
       	if($selected_instcat_list == 0)
       	{
       		$results = School::where('School_State', '=', $selected_stabbr_list)->pluck('school_name','School_ID');
			    $school_ids = $results->toArray();
		      return $school_ids;
		    }

        //Filter by Category
       	if($selected_stabbr_list == "0")
       	{
       		$results = School::where('Inst_Catgry', '=', $selected_instcat_list)->pluck('school_name','School_ID');
          $school_ids = $results->toArray();
		      return $school_ids;
	      }
     }
});

/*******************/


Route::resource('applicationdetails', 'ApplicationDetailsController');

//Route::resource('comments', 'CommentsController');
Route::resource('usercomments', 'UserCommentsController');
//Route::resource('usercomments/reply', 'UserCommentsController@reply');
//Route::get('replies', 'CommentRepliesController@createreply');
//Route::post('repliesCreate', 'CommentRepliesController@createreply');
Route::resource('replies', 'CommentRepliesController');
//Route::post('replies', 'CommentRepliesController');


Route::resource('defaultrates', 'DefaultRatesController');

Route::resource('employees', 'EmployeesController');

Route::resource('graduations', 'GraduationsController');

Route::resource('completions', 'completionsController');

Route::resource('uploads','UploadsController');
Route::post('uploads/enqueue','UploadsController@enqueue');
Route::resource('map_tables','Map_TablesController');



//Route::delete('/comments/{comment}', 'CommentsController@destroy');
//Route::resource('comments', 'CommentsController');
//Route::get('comments/{student}/addforstudent', ['as' => 'comments.addforstudent',
//        'uses' => 'CommentsController@addforstudent']);
//    Route::get('comments/{planofstudy}/addforplanofstudy', ['as' => 'comments.addforplanofstudy',
//        'uses' => 'CommentsController@addforplanofstudy']);

//});


Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/home', 'HomeController@index');

