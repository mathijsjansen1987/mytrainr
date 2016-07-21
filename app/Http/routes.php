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


	// dashboard
	Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'Sporter\DashboardController@index']);

	// Videos
	Route::get('/videos', ['as' => 'videos', 'uses' => 'Sporter\VideoController@index']);
	Route::get('/video/add', ['as' => 'videoadd', 'uses' => 'Sporter\VideoController@get_add']);
	Route::get('/video/{id}', ['as' => 'videodetail', 'uses' => 'Sporter\VideoController@detail']);


});

// URLS ONLY FOR COACHES
Route::group(['middleware' => 'role:coach'], function () {

	// dashboard
	Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'Coach\DashboardController@index']);

	// Groups
	Route::get('/groups', ['as' => 'groups.index', 'uses' => 'Coach\GroupController@index']);
	Route::get('/group/add', ['as' => 'groups.add', 'uses' => 'Coach\GroupController@get_add']);
	Route::post('/group/add', ['as' => 'groups.add', 'uses' => 'Coach\GroupController@store']);
	Route::get('/group/edit/{id}', ['as' => 'groups.edit', 'uses' => 'Coach\GroupController@get_edit']);
	Route::post('/group/edit/{id}', ['as' => 'groups.edit', 'uses' => 'Coach\GroupController@update']);
	Route::get('/group/remove/{id}', ['as' => 'groups.remove', 'uses' => 'Coach\GroupController@destroy']);
	Route::get('/group/{id}', ['as' => 'groups.view', 'uses' => 'Coach\GroupController@get_view']);

	// Videos
	Route::get('/videos', ['as' => 'videos.index', 'uses' => 'Coach\VideoController@index']);
	Route::get('/video/add', ['as' => 'videos.add', 'uses' => 'Coach\VideoController@get_add']);
	Route::post('/video/add', ['as' => 'videos.add', 'uses' => 'Coach\VideoController@store']);
	Route::get('/video/edit/{id}', ['as' => 'videos.edit', 'uses' => 'Coach\VideoController@get_edit']);
	Route::post('/video/edit/{id}', ['as' => 'videos.edit', 'uses' => 'Coach\VideoController@update']);
	Route::get('/video/remove/{id}', ['as' => 'videos.remove', 'uses' => 'Coach\VideoController@destroy']);
	Route::get('/video/{id}', ['as' => 'videos.view', 'uses' => 'Coach\VideoController@get_view']);

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
