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

Route::get('/', 'WelcomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('user/profile', [
    'middleware' => 'auth',
    'uses' => 'UserController@showProfile'
]);

Route::resource('user/wish', 'WishController');

# Movie and Session Routes
Route::get('movies', 'MovieController@showAllMovies');

# Individual movie page
Route::get('movies/{id}', [
    'as' => 'movieById', 'uses' => 'MovieController@showMovieById'
]);

Route::get('search', 'SearchController@index');

Route::get('sessions/by_location', [
    'as' => 'sessionsByLocation', 'uses' => 'SearchController@getSessionsByLocation'
]);

Route::get('sessions/by_movie', [
    'as' => 'sessionsByMovie', 'uses' => 'SearchController@getSessionsByMovie'
]);

# Cart Routes

Route::get('user/cart', 'CartController@displayCart');

Route::post('user/cart/add', [
    'as' => 'newCartItem', 'uses' => 'CartController@store'
]);

Route::delete('user/cart/delete/{id}', [
    'as' => 'deleteCartItem', 'uses' => 'CartController@delete'
]);

Route::put('user/cart/update/{id}', [
    'as' => 'updateCartItem', 'uses' => 'CartController@updateTicketQuantities'
]);

Route::post('user/cart/checkout', [
    'as' => 'checkoutCart', 'uses' => 'CartController@checkout'
]);

// Dummy route used to test adding of booking to cart
Route::get('addtocart', [
    'uses' => 'CartController@index'
]);
