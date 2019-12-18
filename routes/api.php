<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {

    // get address routes
    Route::get('/provinces', 'AddressesController@provinces');
    Route::get('/provinces/{province_code}', 'AddressesController@municipalities');
    Route::get('/provinces/{province_code}/{municipality_code}', 'AddressesController@barangays');

    // walkin client routes
    Route::get('/clients', 'ClientsController@index')->name('clients.index');
    Route::post('/clients', 'ClientsController@store')->name('clients.store');

    Route::get('/users', 'UsersController@index');
    Route::post('/users', 'UsersController@store');
    Route::get('/users/{user}', 'UsersController@show');
    Route::put('/users/{user}', 'UsersController@update');
    Route::delete('/users/{user}', 'UsersController@destroy');
});