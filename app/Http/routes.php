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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'dashboard' => 'DashboardController'
]);

Route::resource('envelopes', 'EnvelopeController');
Route::resource('envelopes.transaction', 'TransactionController');

Route::group(['middleware' => 'guest'], function () {
    Route::controller('/', 'GuestController');
});