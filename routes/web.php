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

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('pegawai', 'PegawaiController');
    Route::resource('user', 'UserController');
    Route::resource('proyek', 'ProyekController');
    Route::resource('detailkehadiran', 'DetailKehadiranController');
    Route::resource('detailproyek', 'DetailProyekController');
    Route::resource('pembiayaan', 'PembiayaanController');
    Route::resource('jabatan', 'JabatanController');


    Route::resource('gaji', 'GajiController');
    Route::get('gaji/{id}/slip', 'GajiController@slip');
    Route::get('penggajian', 'PegawaiController@readgaji');
    Route::post('storegaji', 'PegawaiController@storegaji');

    Route::get('pegawai/{id}/addgaji', 'PegawaiController@addgaji');
    Route::get('pegawai/{id}/readdetailgaji', 'PegawaiController@detailgaji');
    Route::get('pegawai/{id}/show', 'PegawaiController@show');

    Route::get('proyek/{id}/show', 'ProyekController@show');
    Route::get('proyek/{id}/progres', 'ProyekController@progres');

    Route::resource('lapkehadiran', 'LaporanKehadiranController');
    Route::resource('lappenggajian', 'LaporanPenggajianController');
    Route::get('lappegawai', 'PegawaiController@lap');

    Route::get('mobileprofil', 'PegawaiController@mobile');

});





