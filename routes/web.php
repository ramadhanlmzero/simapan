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

// Route::get('upload', function () {
//     return view('upload');
// })->name('gambar.index');
// Route::get('upload', 'GambarController@index')->name('gambar.index');
Route::post('uploading', 'GambarController@upload')->name('gambar.uploading');
Route::get('upload', 'GambarController@show')->name('gambar.lihat');
Route::post('upload/hapus/{id}', 'GambarController@delete')->name('gambar.hapus');

// Route::post('process', function (Request $request) {
//     $path = $request->file('photo')->store('photos');
// });

// Route::post('processEditName', function (Request $request) {
//     $tambahGambar = new Gambar();
//     $file = $request->file('photo');
//     $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
//     $file->storeAs('public/photos', $filename);
//     $tambahGambar->nama_file = (string)$filename;
//     $tambahGambar->save();
// });