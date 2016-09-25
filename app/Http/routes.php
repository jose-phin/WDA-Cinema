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

Route::get('user/profile', [
    'middleware' => 'auth',
    'uses' => 'UserController@showProfile'
]);

Route::resource('user/wish', 'WishController');

Route::get('/movies', 'MovieController@showAllMovies');

Route::get('sessions/by_movie/{id}', [
    'as' => 'sessionsByMovie', 'uses' => 'MovieSessionController@showSessionsByMovie'
]);

Route::get('sessions/by_cinema/{id}', [
    'as' => 'sessionsByCinema', 'uses' => 'MovieSessionController@showSessionsByCinema'
]);

Route::post('bookings/new', [
    'as' => 'newBooking',
    'middleware' => 'auth',
    'uses' => 'BookingController@store'
]);
