<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::middleware(['auth','Ceklevel:admin,super,owner,karyawan'])->group(function () {
    Route::get('/artisan/st0rage', function () {
        $command = 'storage:link';
        $result = Artisan::call($command);
        return Artisan::output();

    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('pegawai', 'PegawaiController');
    Route::resource('user', 'UserController');
    Route::resource('proyek', 'ProyekController');
    Route::resource('kehadiran', 'KehadiranController');
    Route::resource('detailkehadiran', 'DetailKehadiranController');
    Route::resource('detailproyek', 'DetailProyekController');
    Route::resource('pembiayaan', 'PembiayaanController');
    Route::get('profil', 'PegawaiController@show');
    Route::resource('lapkehadiran', 'LaporanKehadiranController');
    Route::resource('lappembiayaan', 'LaporanPembiayaanController');
    Route::get('lappegawai', 'PegawaiController@lap');


    Route::get('mobileprofil', 'PegawaiController@mobile');

});





