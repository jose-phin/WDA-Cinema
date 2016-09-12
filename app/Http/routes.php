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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Task 3 Routes
Route::get('movies/now_showing', 'MovieController@showNowShowing');
Route::get('movies/coming_soon', 'MovieController@showComingSoon');

// Task 4 Routes
Route::get('sessions/by_movie/{id}', [
    'as' => 'sessionsByMovie', 'uses' => 'MovieSessionController@showSessionsByMovie'
]);

Route::get('sessions/by_cinema/{id}', [
    'as' => 'sessionsByCinema', 'uses' => 'MovieSessionController@showSessionsByCinema'
]);