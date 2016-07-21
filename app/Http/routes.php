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


// URLS ONLY FOR SPORTERS
Route::group(['middleware' => 'role:sporter'], function () {

/*
	// dashboard
	Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'sporter\DashboardController@index']);

	// Videos
	Route::get('/videos', ['as' => 'videos', 'uses' => 'VideoController@index']);
	Route::get('/video/add', ['as' => 'videoadd', 'uses' => 'VideoController@get_add']);
	Route::get('/video/{id}', ['as' => 'videodetail', 'uses' => 'VideoController@detail']);
*/

});

// URLS ONLY FOR COACHES
Route::group(['middleware' => 'role:coach'], function () {

	// dashboard
	Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'coach\DashboardController@index']);

	// Groups
	Route::get('/groups', ['as' => 'groups.index', 'uses' => 'coach\GroupController@index']);
	Route::get('/group/add', ['as' => 'groups.add', 'uses' => 'coach\GroupController@get_add']);
	Route::post('/group/add', ['as' => 'groups.add', 'uses' => 'coach\GroupController@store']);
	Route::get('/group/edit/{id}', ['as' => 'groups.edit', 'uses' => 'coach\GroupController@get_edit']);
	Route::post('/group/edit/{id}', ['as' => 'groups.edit', 'uses' => 'coach\GroupController@update']);
	Route::get('/group/remove/{id}', ['as' => 'groups.remove', 'uses' => 'coach\GroupController@destroy']);
	Route::get('/group/{id}', ['as' => 'groups.view', 'uses' => 'coach\GroupController@get_view']);

	// Videos
	Route::get('/videos', ['as' => 'videos.index', 'uses' => 'coach\VideoController@index']);
	Route::get('/video/add', ['as' => 'videos.add', 'uses' => 'coach\VideoController@get_add']);
	Route::post('/video/add', ['as' => 'videos.add', 'uses' => 'coach\VideoController@store']);
	Route::get('/video/edit/{id}', ['as' => 'videos.edit', 'uses' => 'coach\VideoController@get_edit']);
	Route::post('/video/edit/{id}', ['as' => 'videos.edit', 'uses' => 'coach\VideoController@update']);
	Route::get('/video/remove/{id}', ['as' => 'videos.remove', 'uses' => 'coach\VideoController@destroy']);
	Route::get('/video/{id}', ['as' => 'videos.view', 'uses' => 'coach\VideoController@get_view']);

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
