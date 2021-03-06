<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::auth();

Route::get('/', function () { return redirect('/client'); });
Route::get('/client', 'SpaController@index');
// Route::get('/{vue_capture?}', 'SpaController@index')->where('vue_capture', '[\/\w\.-]*');
Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');