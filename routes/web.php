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
    Route::get('tabel-laporan-realisasi-keong', RealisasiKeongController::class . '@tabelLaporan');
    Route::get('realisasi-intervensi-keong/create-pelaporan/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@createPelaporan');
    Route::get('realisasi-intervensi-keong/show-laporan/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@showLaporan');
    Route::post('realisasi-intervensi-keong/konfirmasi/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@konfirmasi');
    Route::post('realisasi-intervensi-keong/update-opd/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@updateOPD');
    Route::delete('realisasi-intervensi-keong/delete-opd/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@deleteOPD');
    Route::delete('realisasi-intervensi-keong/delete-laporan/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@deleteLaporan');
    Route::delete('realisasi-intervensi-keong/delete-semua-laporan/{realisasi_intervensi_keong}', RealisasiKeongController::class . '@deleteSemuaLaporan');

    // Master Data
    // Lokasi
    Route::get('master-data/lokasi/desa/tabel', [LokasiDesaController::class, 'tabel']);
    Route::resource('master-data/lokasi/desa', LokasiDesaController::class);
    Route::resource('master-data/lokasi/keong', LokasiKeongController::class)->parameters(
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
    Route::get('map/desa', [LokasiDesaController::class, 'getMapData']);
    Route::get('map/keong', [LokasiKeongController::class, 'getMapData']);
    Route::get('map/hewan', [LokasiHewanController::class, 'getMapData']);
    // List
    Route::get('list/desa', [ListController::class, 'desa']);
    Route::get('list/hewan', [ListController::class, 'hewan']);
});
