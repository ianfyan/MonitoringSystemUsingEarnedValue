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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

Route::post('/data_jabatan/create', 'App\Http\Controllers\DataController@createJabatan');
Route::post('/data_jabatan/edit/{id_jabatan}', 'App\Http\Controllers\DataController@editJabatan');
Route::get('/data_jabatan/delete/{id_jabatan}', 'App\Http\Controllers\DataController@deleteJabatan');

Route::post('/data_jenis/create', 'App\Http\Controllers\DataController@createJenis');
Route::post('/data_jenis/edit/{id_jenis}', 'App\Http\Controllers\DataController@editJenis');
Route::get('/data_jenis/delete/{id_jenis}', 'App\Http\Controllers\DataController@deleteJenis');

Route::post('/data_rekening/create', 'App\Http\Controllers\DataController@createRekening');
Route::post('/data_rekening/edit/{id_rekening}', 'App\Http\Controllers\DataController@editRekening');
Route::get('/data_rekening/delete/{id_rekening}', 'App\Http\Controllers\DataController@deleteRekening');

Route::post('/data_kegiatan/create', 'App\Http\Controllers\DataController@createKegiatan');
Route::post('/data_kegiatan/edit/{id_kegiatan}', 'App\Http\Controllers\DataController@editKegiatan');
Route::get('/data_kegiatan/delete/{id_kegiatan}', 'App\Http\Controllers\DataController@deleteKegiatan');

Route::post('/data_sumber/create', 'App\Http\Controllers\DataController@createSumber');
Route::post('/data_sumber/edit/{id_sumber}', 'App\Http\Controllers\DataController@editSumber');
Route::get('/data_sumber/delete/{id_sumber}', 'App\Http\Controllers\DataController@deleteSumber');

Route::post('/data_rkas/create', 'App\Http\Controllers\DataController@createRkas');
Route::post('/data_rkas/edit/{id_rkas}', 'App\Http\Controllers\DataController@editRkas');
Route::get('/data_rkas/delete/{id_rkas}', 'App\Http\Controllers\DataController@deleteRkas');

Route::post('/data_dana/create', 'App\Http\Controllers\DataController@createDana');
Route::post('/data_dana/edit/{id_dana}', 'App\Http\Controllers\DataController@editDana');
Route::get('/data_dana/delete/{id_dana}', 'App\Http\Controllers\DataController@deleteDana');

Route::post('/data_pengguna/create', 'App\Http\Controllers\DataController@createPengguna');
Route::post('/data_pengguna/edit/{id_pengguna}', 'App\Http\Controllers\DataController@editPengguna');
Route::get('/data_pengguna/delete/{id_pengguna}', 'App\Http\Controllers\DataController@deletePengguna');

Route::post('/data_login/edit/{id}', 'App\Http\Controllers\DataController@editLogin');

Route::post('/konfirmasi/{id_pengajuan}', 'App\Http\Controllers\DataController@konfirmasiPengajuan');

Route::post('/pengajuan/create', 'App\Http\Controllers\DataController@createPengajuan');
Route::post('/pengajuan/edit/{id_pengajuan}', 'App\Http\Controllers\DataController@editPengajuan');
Route::get('/pengajuan/delete/{id_pengajuan}', 'App\Http\Controllers\DataController@deletePengajuan');

Route::post('/realisasi/create', 'App\Http\Controllers\DataController@createRealisasi');
Route::post('/realisasi/edit/{id_realisasi}', 'App\Http\Controllers\DataController@editRealisasi');
Route::get('/realisasi/delete/{id_realisasi}', 'App\Http\Controllers\DataController@deleteRealisasi');

Route::get('/analisa/{id_rkas}', 'App\Http\Controllers\DashboardController@analisa');
Route::get('/autow/{id}', 'App\Http\Controllers\DashboardController@autow');
Route::get('/autok/{id}', 'App\Http\Controllers\DashboardController@autok');
Route::get('/getChart', 'App\Http\Controllers\DashboardController@getChart');

Route::group(['middleware' => ['auth', 'checkLevel:0, 1, 2, 3']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
    Route::get('/pengajuan', 'App\Http\Controllers\DashboardController@pengajuan');
    Route::get('/realisasi', 'App\Http\Controllers\DashboardController@realisasi');
});

Route::group(['middleware' => ['auth', 'checkLevel:0']], function(){
    Route::get('/data_jabatan', 'App\Http\Controllers\DashboardController@dataJabatan');

    Route::get('/data_pengguna', 'App\Http\Controllers\DashboardController@dataPengguna');
    Route::get('/data_login', 'App\Http\Controllers\DashboardController@dataLogin');

});

Route::group(['middleware' => ['auth', 'checkLevel:0, 2']], function(){
    Route::get('/data_sumber', 'App\Http\Controllers\DashboardController@dataSumber');
    Route::get('/data_jenis', 'App\Http\Controllers\DashboardController@dataJenis');
    Route::get('/data_rekening', 'App\Http\Controllers\DashboardController@dataRekening');

    Route::get('/data_rkas', 'App\Http\Controllers\DashboardController@dataRkas');
    Route::get('/data_dana', 'App\Http\Controllers\DashboardController@dataDana');
    Route::get('/data_belanja', 'App\Http\Controllers\DashboardController@dataBelanja');
    Route::get('/data_pengajuan', 'App\Http\Controllers\DashboardController@dataPengajuan');
    
    Route::get('/data_kegiatan', 'App\Http\Controllers\DashboardController@dataKegiatan');
});

Route::group(['middleware' => ['auth', 'checkLevel:0, 1, 2']], function(){
    Route::get('/monitoring', 'App\Http\Controllers\DashboardController@monitoring');
    Route::get('/laporan', 'App\Http\Controllers\DashboardController@laporan');
    Route::post('/print', 'App\Http\Controllers\DashboardController@print');
});

Route::group(['middleware' => ['auth', 'checkLevel:0, 3']], function(){
    Route::get('/pengajuan/{id_pengguna}', 'App\Http\Controllers\DashboardController@pengajuanId');
    Route::get('/realisasi/{id_pengguna}', 'App\Http\Controllers\DashboardController@realisasiId');
});

Route::group(['middleware' => ['auth', 'checkLevel:0, 2, 3']], function(){
    Route::get('/data_kegiatan/{id_pengguna}', 'App\Http\Controllers\DashboardController@dataKegiatanId');
});
