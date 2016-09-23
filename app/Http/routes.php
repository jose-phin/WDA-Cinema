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

/**
 * View the currently authenticated user's profile
 *
 * If a user tries to manually get to this route w/o auth, they will be receive a 404
 */
Route::get('user/profile', [
    'middleware' => 'auth',
    'uses' => 'UserController@showProfile'
]);


/**
 * Renders a list of all movies in the DB to the movie view
 *
 * You can distinguish b/w "Now Showing" and "Coming Soon" via the $movie->is_now_showing property
 */
Route::get('/movies', 'MovieController@showAllMovies');


/**
 * Displays all sessions for a given movie, at any location
 *
 * @param id int route expects the movie ID to be supplied in the URI/URL
 */
Route::get('sessions/by_movie/{id}', [
    'as' => 'sessionsByMovie', 'uses' => 'MovieSessionController@showSessionsByMovie'
]);

/**
 * Displays all sessions for all movies at a given location
 *
 * @param id int route expects the movie ID to be supplied in the URI/URL
 */
Route::get('sessions/by_cinema/{id}', [
    'as' => 'sessionsByCinema', 'uses' => 'MovieSessionController@showSessionsByCinema'
]);

/**
 * Displays all sessions for a given movie, at any location
 *
 * A user must be authenticated to book a ticket.
 *
 * @param request \App\Http\Requests\Request the request passed to this route should supply [movie session ID, quantity/amount,
 * and type (Adult, Concession, etc.)]
 */
Route::put('bookings/new', [
    'as' => 'newBooking',
    'middleware' => 'auth',
    'uses' => 'BookingController@store'
]);