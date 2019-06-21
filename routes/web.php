<?php
// use Illuminate\Routing\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('surat', 'SuratController');

Route::resource('rt', 'RTController');

Route::resource('rw', 'RWController');

Route::resource('penduduk', 'PendudukController');
Route::get('carikota/{id}', 'PendudukController@cariKota')->name('penduduk.carikota');
Route::get('carikecamatan/{id}', 'PendudukController@cariKecamatan')->name('penduduk.carikecamatan');
Route::get('carikelurahan/{id}', 'PendudukController@cariKelurahan')->name('penduduk.carikelurahan');
Route::get('carirw/{id}', 'PendudukController@cariRW')->name('penduduk.carirw');
Route::get('carirt/{id}', 'PendudukController@cariRT')->name('penduduk.carirt');

Route::resource('gambar', 'ImageController');