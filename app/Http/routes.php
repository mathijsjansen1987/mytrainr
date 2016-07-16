<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

///////////////////////////////////////////////////////////////////////////////
//	IMPORTS
///////////////////////////////////////////////////////////////////////////////
use App\User;
use App\Video;


///////////////////////////////////////////////////////////////////////////////
//	BACKEND ROUTES
///////////////////////////////////////////////////////////////////////////////

// URLS FOR GUESTS (NOT LOGGED IN)
Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

// URLS ONLY FOR SPORTERS
Route::group(['middleware' => 'role:sporter'], function () {
	Route::get('/videos', 'VideoController@index');
});

// URLS ONLY FOR COACHES
Route::group(['middleware' => 'role:coach'], function () {
	Route::get('/groups', ['as' => 'groups', 'uses' => 'GroupController@index']);
	Route::get('/group/add', ['as' => 'groupadd', 'uses' => 'GroupController@get_add']);
	Route::get('/group/{id}', ['as' => 'groupdetail', 'uses' => 'GroupController@detail']);

});

// URLS ONLY FOR CLUBS
Route::group(['middleware' => 'role:club'], function () {
	// Route::get('/videos', 'VideoController@index');
});


///////////////////////////////////////////////////////////////////////////////
//	API V1 ROUTES
///////////////////////////////////////////////////////////////////////////////

Route::group(['prefix' => 'api/v1/'], function () {

	Route::get('users', ['middleware' => 'throttle:60,1', function (User $user) {
		return $user::all();
	}]);

	// user video
	Route::get('user/{id}/videos', ['middleware' => 'throttle:60,1', function ($id) {
		return User::find($id)->videos;
	}]);


	// user video analyses
	Route::get('user/videos/{id}/analyses', ['middleware' => 'throttle:60,1', function ($id) {
		return Video::find($id)->analyses;
	}]);

	Route::get('videos', ['middleware' => 'throttle:60,1', function (Video $video) {
		return Video::all();
	}]);

});
