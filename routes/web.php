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

Route::resource('peergroups', 'PeerGroupsController');

Route::resource('school_peergroups', 'School_PeerGroupsController');

Route::resource('applicationdetails', 'ApplicationDetailsController');

//Route::resource('comments', 'CommentsController');
Route::resource('usercomments', 'UserCommentsController');
//Route::resource('usercomments/reply', 'UserCommentsController@reply');
Route::resource('usercomment/replies', 'CommentRepliesController');


Route::resource('defaultrates', 'DefaultRatesController');

Route::resource('employees', 'EmployeesController');

Route::resource('graduations', 'GraduationsController');

Route::resource('completions', 'completionsController');

Route::resource('uploads','UploadsController');


//Route::delete('/comments/{comment}', 'CommentsController@destroy');
//Route::resource('comments', 'CommentsController');
//Route::get('comments/{student}/addforstudent', ['as' => 'comments.addforstudent',
//        'uses' => 'CommentsController@addforstudent']);
//    Route::get('comments/{planofstudy}/addforplanofstudy', ['as' => 'comments.addforplanofstudy',
//        'uses' => 'CommentsController@addforplanofstudy']);

//});

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
