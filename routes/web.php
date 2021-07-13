<?php

use App\Http\Controllers\DetailProyekController;
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
Route::group(['Ceklevel' => 'super'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('profil', 'HomeController@profil');

    Route::resource('pegawai', 'PegawaiController');
    Route::resource('user', 'UserController');
    Route::resource('proyek', 'ProyekController');
    Route::resource('detailkehadiran', 'DetailKehadiranController');
    Route::resource('detailproyek', 'DetailProyekController');

    Route::resource('gambarprogres', 'GambarProgresController');
    Route::resource('pembiayaan', 'PembiayaanController');
    Route::resource('jabatan', 'JabatanController');

    Route::resource('progres', 'DetailProyekController');

    Route::get('proyek/{id}/progres', 'DetailProyekController@create');
    Route::get('proyek/{id}/showprogres', 'DetailProyekController@show');

    Route::resource('gaji', 'GajiController');
    Route::get('gaji/{id}/slip', 'GajiController@slip');
    Route::get('penggajian', 'PegawaiController@readgaji');
    Route::post('storegaji', 'PegawaiController@storegaji');

    Route::get('pegawai/{id}/addgaji', 'PegawaiController@addgaji');
    Route::get('pegawai/{id}/show', 'PegawaiController@show');


    Route::resource('lapkehadiran', 'LaporanKehadiranController');
    Route::resource('lappenggajian', 'LaporanPenggajianController');
    Route::resource('lapprogres', 'LaporanProgresController');
    Route::get('lapprogres/{id}/progres', 'LaporanProgresController@progres');
    Route::get('mobileprofil', 'PegawaiController@mobile');
});



