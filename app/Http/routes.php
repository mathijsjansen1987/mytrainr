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
	Route::get('/videos', ['as' => 'videos', 'uses' => 'VideoController@index']);
	Route::get('/video/add', ['as' => 'videoadd', 'uses' => 'VideoController@get_add']);
	Route::get('/video/{id}', ['as' => 'videodetail', 'uses' => 'VideoController@detail']);
});

// URLS ONLY FOR COACHES
Route::group(['middleware' => 'role:coach'], function () {

	// Groups
	Route::get('/groups', ['as' => 'groups.index', 'uses' => 'GroupController@index']);
	Route::get('/group/add', ['as' => 'groups.add', 'uses' => 'GroupController@get_add']);
	Route::post('/group/add', ['as' => 'groups.add', 'uses' => 'GroupController@store']);
	Route::get('/group/edit/{id}', ['as' => 'groups.edit', 'uses' => 'GroupController@get_edit']);
	Route::post('/group/edit/{id}', ['as' => 'groups.edit', 'uses' => 'GroupController@update']);
	Route::get('/group/remove/{id}', ['as' => 'groups.remove', 'uses' => 'GroupController@destroy']);
	Route::get('/group/{id}', ['as' => 'groups.view', 'uses' => 'GroupController@get_view']);

	// Videos
	Route::get('/videos', ['as' => 'videos.index', 'uses' => 'VideoController@index']);
	Route::get('/video/add', ['as' => 'videos.add', 'uses' => 'VideoController@get_add']);
	Route::post('/video/add', ['as' => 'videos.add', 'uses' => 'VideoController@store']);
	Route::get('/video/edit/{id}', ['as' => 'videos.edit', 'uses' => 'VideoController@get_edit']);
	Route::post('/video/edit/{id}', ['as' => 'videos.edit', 'uses' => 'VideoController@update']);
	Route::get('/video/remove/{id}', ['as' => 'videos.remove', 'uses' => 'VideoController@destroy']);
	Route::get('/video/{id}', ['as' => 'videos.view', 'uses' => 'VideoController@get_view']);

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
