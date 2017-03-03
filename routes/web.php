<?php

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
Route::post('updatePassword', 'HomeController@updatePassword');
Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController');
Route::resource('schools', 'SchoolsController');

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
Route::get('peergroups/create', 'PeerGroupsController@create');  // Creates a Peer Group (create method)
Route::resource('peergroups/store', 'PeerGroupsController');  // Saves a Peer Group (store method)
Route::post('peergroups/delete', ['as'=>'pg_delete_url', 'uses'=>'PeerGroupsController@destroy']);  // Deletes a Peer Group (destory method)
/*******************/

/*** Peer Group Filter ***/
Route::resource('pgfilter', 'PeerGroupFilterController');
Route::get('/pgfilter/ajaxresults', 'PeerGroupFilterController@ajaxresults');

//Route::get('/ajaxresults', function() {
//    if(Request::ajax()){
//        $selected_instcat_list = Input::get('selected_instcat_list');
//        var_dump($selected_instcat_list);
//        return 'ajaxResults has loaded';
//    }
//});

/*******************/


Route::resource('applicationdetails', 'ApplicationDetailsController');

Route::resource('comments', 'CommentsController');

Route::resource('defaultrates', 'DefaultRatesController');

Route::resource('employees', 'EmployeesController');

Route::resource('graduations', 'GraduationsController');

Route::resource('completions', 'completionsController');

Route::resource('uploads','UploadsController');


Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/home', 'HomeController@index');

