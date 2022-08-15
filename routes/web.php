<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\intervensi\perencanaan\keong\PerencanaanKeongController;
use App\Http\Controllers\intervensi\realisasi\keong\RealisasiKeongController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\masterData\HewanController;
use App\Http\Controllers\masterData\lokasi\LokasiDesaController;
use App\Http\Controllers\masterData\lokasi\LokasiHewanController;
use App\Http\Controllers\masterData\lokasi\LokasiKeongController;
use App\Http\Controllers\masterData\OPDController;
use App\Models\Perencanaan;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('dashboard.pages.login');
    });
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/cekLogin', [AuthController::class, 'cekLogin']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/dashboard', DashboardController::class);

    Route::resource('rencana-intervensi-keong', PerencanaanKeongController::class);
    Route::post('rencana-intervensi-keong/konfirmasi/{rencana_intervensi_keong}', PerencanaanKeongController::class . '@konfirmasi');
    Route::get('rencana-intervensi-keong/map/{rencana_intervensi_keong}', PerencanaanKeongController::class . '@map');

    Route::resource('realisasi-intervensi-keong', RealisasiKeongController::class);

    // Master Data
    // Lokasi
    Route::get('master-data/lokasi/desa/tabel', [DesaController::class, 'tabel']);
    Route::resource('master-data/lokasi/desa', DesaController::class);
    Route::resource('master-data/lokasi/keong', KeongController::class)->parameters(
        [
            'keong' => 'lokasi_keong'
        ]
    );
    Route::resource('master-data/lokasi/hewan', LokasiHewanController::class)->parameters(
        [
            'hewan' => 'lokasi_hewan'
        ]
    );
    Route::resource('master-data/opd', OPDController::class);
    Route::resource('master-data/hewan', HewanController::class);
    Route::get('map/desa', [DesaController::class, 'getMapData']);
    Route::get('map/keong', [KeongController::class, 'getMapData']);
    Route::get('map/hewan', [LokasiHewanController::class, 'getMapData']);
    // List
    Route::get('list/desa', [ListController::class, 'desa']);
    Route::get('list/hewan', [ListController::class, 'hewan']);
});
