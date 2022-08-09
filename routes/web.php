<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\intervensi\perencanaan\PerencanaanKeongController;
use App\Http\Controllers\masterData\lokasi\DesaController;
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

// Master Data
// Lokasi
Route::resource('master-data/lokasi/desa', DesaController::class);
Route::get('map/desa', [DesaController::class, 'getMapData']);
