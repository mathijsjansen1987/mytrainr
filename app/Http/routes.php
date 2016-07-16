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
use App\User;
use App\Video;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/videos', 'VideoController@index');


// API

Route::group(['prefix' => 'api/v1/'], function () {

// API V1 //////////////////////////

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
