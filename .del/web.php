<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'RedirectIfAuthenticatedController');
Auth::routes();
Route::group(['Ceklevel'=>'super'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dataadmin', 'userkontrol@index');
    Route::post('/dataadmin', 'userkontrol@store');
    Route::patch('/dataadmin/{id}', 'userkontrol@update');
    Route::delete('/dataadmin/{id}', 'userkontrol@destroy');
    Route::get('/datautama', 'datautamakontrol@index');
    Route::post('/datautama', 'datautamakontrol@store');
    Route::patch('/datautama/update', 'datautamakontrol@update');
    Route::delete('/datautama/{datautama}', 'datautamakontrol@destroy');
    // Route::resource('/event', 'eventkontrol');
    Route::get('/event', 'eventkontrol@index');
    Route::post('/event', 'eventkontrol@store');
    Route::patch('/event', 'eventkontrol@update');
    Route::get('/event/{id}', 'eventkontrol@edit');
    Route::delete('/event/{event}', 'eventkontrol@destroy');
    Route::resource('/ulasan', 'ulasankontrol');
    Route::resource('/rating', 'ratingkontrol');
});
