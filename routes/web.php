<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\intervensi\perencanaan\keong\PerencanaanKeongController;
use App\Http\Controllers\intervensi\realisasi\keong\RealisasiKeongController;
use App\Http\Controllers\masterData\HewanController;
use App\Http\Controllers\masterData\lokasi\DesaController;
use App\Http\Controllers\masterData\lokasi\KeongController;
use App\Http\Controllers\masterData\LokasiKeongController;
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

Route::resource('/', DashboardController::class);

Route::resource('rencana-intervensi-keong', PerencanaanKeongController::class);
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
Route::resource('master-data/opd', OPDController::class);
Route::resource('master-data/hewan', HewanController::class);
Route::get('map/desa', [DesaController::class, 'getMapData']);
Route::get('map/keong', [KeongController::class, 'getMapData']);
