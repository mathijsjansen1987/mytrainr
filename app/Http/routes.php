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

	// Analysis
	Route::get('/analysis', ['as' => 'analysis.index', 'uses' => 'Coach\AnalysisController@index']);
	Route::get('/analyse/add', ['as' => 'analysis.add', 'uses' => 'Coach\AnalysisController@get_add']);
	Route::post('/analyse/add', ['as' => 'analysis.add', 'uses' => 'Coach\AnalysisController@store']);
	Route::get('/analyse/edit/{id}', ['as' => 'analysis.edit', 'uses' => 'Coach\AnalysisController@get_edit']);
	Route::post('/analyse/edit/{id}', ['as' => 'analysis.edit', 'uses' => 'Coach\AnalysisController@update']);
	Route::get('/analyse/remove/{id}', ['as' => 'analysis.remove', 'uses' => 'Coach\AnalysisController@destroy']);
	Route::get('/analyse/{id}', ['as' => 'analysis.view', 'uses' => 'Coach\AnalysisController@get_view']);

	// Training
	Route::get('/trainings', ['as' => 'trainings.index', 'uses' => 'Coach\TrainingController@index']);
	Route::get('/training/add', ['as' => 'trainings.add', 'uses' => 'Coach\TrainingController@get_add']);
	Route::post('/training/add', ['as' => 'trainings.add', 'uses' => 'Coach\TrainingController@store']);
	Route::get('/training/edit/{id}', ['as' => 'trainings.edit', 'uses' => 'Coach\TrainingController@get_edit']);
	Route::post('/training/edit/{id}', ['as' => 'trainings.edit', 'uses' => 'Coach\TrainingController@update']);
	Route::get('/training/remove/{id}', ['as' => 'trainings.remove', 'uses' => 'Coach\TrainingController@destroy']);
	Route::get('/training/{id}', ['as' => 'trainings.view', 'uses' => 'Coach\TrainingController@get_view']);

});

// URLS ONLY FOR CLUBS
Route::group(['middleware' => 'role:club'], function () {

	// dashboard
	Route::get('/club-dashboard', ['as' => 'club.dashboard', 'uses' => 'Club\DashboardController@club_index']);

	// Locations
	Route::get('/locations', ['as' => 'locations.index', 'uses' => 'Club\LocationController@index']);
	Route::get('/location/add', ['as' => 'locations.add', 'uses' => 'Club\LocationController@get_add']);
	Route::post('/location/add', ['as' => 'locations.add', 'uses' => 'Club\LocationController@store']);
	Route::get('/location/edit/{id}', ['as' => 'locations.edit', 'uses' => 'Club\LocationController@get_edit']);
	Route::post('/location/edit/{id}', ['as' => 'locations.edit', 'uses' => 'Club\LocationController@update']);
	Route::get('/location/remove/{id}', ['as' => 'locations.remove', 'uses' => 'Club\LocationController@destroy']);
	Route::get('/location/{id}', ['as' => 'locations.view', 'uses' => 'Club\LocationController@get_view']);

	// Sports
	Route::get('/sports', ['as' => 'sports.index', 'uses' => 'Club\SportController@index']);
	Route::get('/sport/add', ['as' => 'sports.add', 'uses' => 'Club\SportController@get_add']);
	Route::post('/sport/add', ['as' => 'sports.add', 'uses' => 'Club\SportController@store']);
	Route::get('/sport/edit/{id}', ['as' => 'sports.edit', 'uses' => 'Club\SportController@get_edit']);
	Route::post('/sport/edit/{id}', ['as' => 'sports.edit', 'uses' => 'Club\SportController@update']);
	Route::get('/sport/remove/{id}', ['as' => 'sports.remove', 'uses' => 'Club\SportController@destroy']);
});


///////////////////////////////////////////////////////////////////////////////
//	API V1 ROUTES
///////////////////////////////////////////////////////////////////////////////

Route::group(['prefix' => 'api/v1/'], function () {

/*	Route::get('users', ['middleware' => 'throttle:60,1', function (User $user) {
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
	}]);*/

});
