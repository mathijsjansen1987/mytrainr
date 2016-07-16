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



// API V1 //////////////////////////

Route::get('/api/v1/users', ['middleware' => 'throttle:60,1', function (User $user) {
    return $user::all();
}]);

Route::get('/api/v1/videos', ['middleware' => 'throttle:60,1', function (Video $video) {
    return Video::all();
}]);
