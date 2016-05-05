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

Route::auth();

Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'profile' => 'ProfileController',
        'profile.tutorial' => 'TutorialController',
        'envelope' => 'EnvelopeController',
        'envelope.transaction' => 'TransactionController',
        'envelope.transfer' => 'TransferController',
        'package' => 'PackageController',
        'cheque' => 'ChequeController',
        'transfer' => 'TransferController',
    ]);

    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index');
});
