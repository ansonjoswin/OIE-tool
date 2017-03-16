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

Route::resource('instructional_ess', 'Instructional_ESsController');

Route::resource('noninstructional_ess', 'NonInstructional_ESsController');


/*** PEER GROUPS ***/
Route::resource('peergroups', 'PeerGroupsController');  // Lists Peer Groups (index method)
//Route::get('peergroups/create', 'PeerGroupsController@create');  // Creates a Peer Group (create method)
//Route::resource('peergroups/store', 'PeerGroupsController');  // Saves a Peer Group (store method)
Route::post('peergroups/delete', ['as'=>'pg_delete_url', 'uses'=>'PeerGroupsController@destroy']);  // Deletes a Peer Group (destroy method)
/*******************/

/*** School_peergroups ***/
Route::resource('school_peergroups', 'School_PeerGroupsController'); // Lists Peer Group Schools (index method)
/*** end School_peergroups***/

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
          $results = School::pluck('school_name','school_id');
          $school_ids = $results->toArray();
          return $school_ids;
        }

        //All filters selected. Filter by Category and Carnegie and State.
        elseif ($selected_instcat_list != 0 && $selected_stabbr_list != "0" && $selected_ccbasic_list != -9)
        {
          $results = School::where('Inst_Catgry', '=', $selected_instcat_list)->where('School_State', '=', $selected_stabbr_list)->whereHas('carnegie_classification',
              function($q) use($selected_ccbasic_list)
                {
                   $q->where('Cng_2010_Basic', '=', $selected_ccbasic_list)->where('Year', '=', $ccbasicyearid);
                })->pluck('school_name','school_id');
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
            $results = School::where('Inst_Catgry', '=', $selected_instcat_list)->where('School_State', '=', $selected_stabbr_list)->pluck('school_name','school_id');
            $school_ids = $results->toArray();
            return $school_ids;
        }

        //Filter by Category and Carnegie.
        elseif ($selected_instcat_list != 0 && $selected_stabbr_list == "0" && $selected_ccbasic_list != -9)
        {
            $results = School::where('Inst_Catgry', '=', $selected_instcat_list)->whereHas('carnegie_classification',
                function($q) use($selected_ccbasic_list)
                {
                    $q->where('Cng_2010_Basic', '=', $selected_ccbasic_list)->where('Year', '=', $ccbasicyearid);
                })->pluck('school_name','school_id');
            $school_ids = $results->toArray();
            return $school_ids;
        }

        //Filter by State and Carnegie.
        elseif ($selected_instcat_list == 0 && $selected_stabbr_list != "0" && $selected_ccbasic_list != -9)
        {
            $results = School::where('School_State', '=', $selected_stabbr_list)->whereHas('carnegie_classification',
                function($q) use($selected_ccbasic_list)
                {
                    $q->where('Cng_2010_Basic', '=', $selected_ccbasic_list)->where('Year', '=', $ccbasicyearid);
                })->pluck('school_name','school_id');
            $school_ids = $results->toArray();
            return $school_ids;
        }

        //Filter by Category
       elseif ($selected_instcat_list != 0 && $selected_stabbr_list == "0" && $selected_ccbasic_list == -9)
       {
           $results = School::where('Inst_Catgry', '=', $selected_instcat_list)->pluck('school_name','school_id');
           $school_ids = $results->toArray();
           return $school_ids;
       }
        //Filter by State
       	elseif ($selected_instcat_list == 0 && $selected_stabbr_list != "0" && $selected_ccbasic_list == -9)
       	{
       		$results = School::where('School_State', '=', $selected_stabbr_list)->pluck('school_name','school_id');
			    $school_ids = $results->toArray();
		      return $school_ids;
		    }

       //Filter by Carnegie Classification
       elseif ($selected_instcat_list == "0" && $selected_stabbr_list == 0 && $selected_ccbasic_list != -9)
       {
           $results = School::whereHas('carnegie_classification', function($q) use ($selected_ccbasic_list)
           {
               $q->where('Cng_2010_Basic', '=', $selected_ccbasic_list)->where('Year', '=', $ccbasicyearid);
           })->pluck('school_name','school_id');
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

