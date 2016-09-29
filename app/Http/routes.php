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

# Movie and Session Routes

Route::get('/movies', 'MovieController@showAllMovies');

Route::get('sessions/by_movie/{id}', [
    'as' => 'sessionsByMovie', 'uses' => 'MovieSessionController@showSessionsByMovie'
]);

Route::get('sessions/by_cinema/{id}', [
    'as' => 'sessionsByCinema', 'uses' => 'MovieSessionController@showSessionsByCinema'
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

Route::put('user/cart/checkout', [
    'as' => 'checkoutCart', 'uses' => 'CartController@checkout'
]);

// Dummy route used to test adding of booking to cart
Route::get('addtocart', [
    'uses' => 'CartController@index'
]);

