<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\dokumen\MasterPlanController;
use App\Http\Controllers\dokumen\RoadMapController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\intervensi\perencanaan\keong\PerencanaanKeongController;
use App\Http\Controllers\intervensi\realisasi\keong\RealisasiKeongController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\masterData\AkunController;
use App\Http\Controllers\masterData\HewanController;
use App\Http\Controllers\masterData\lokasi\LokasiDesaController;
use App\Http\Controllers\masterData\lokasi\LokasiHewanController;
use App\Http\Controllers\masterData\lokasi\LokasiKeongController;
use App\Http\Controllers\masterData\OPDController;
use App\Http\Controllers\masterData\PendudukController;
use App\Http\Controllers\masterData\sekolah\JenjangSekolahController;
use App\Http\Controllers\masterData\sekolah\SekolahController;
use App\Http\Controllers\masterData\sekolah\SiswaController;
use App\Http\Controllers\masterData\TahunController;
use App\Http\Controllers\PengaturanAkunController;
use App\Models\Perencanaan;
use App\Models\Siswa;

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
    Route::post('master-data/lokasi/desa/export', [LokasiDesaController::class, 'export']);
    Route::resource('master-data/lokasi/desa', LokasiDesaController::class);

    Route::post('master-data/lokasi/keong/export-demografi', [LokasiKeongController::class, 'exportDemografi']);
    Route::post('master-data/lokasi/keong/export', [LokasiKeongController::class, 'export']);
    Route::resource('master-data/lokasi/keong', LokasiKeongController::class)->parameters(
        [
            'keong' => 'lokasi_keong'
        ]
    );
    Route::post('master-data/lokasi/hewan/export-demografi', [LokasiHewanController::class, 'exportDemografi']);
    Route::post('master-data/lokasi/hewan/export-lokasi', [LokasiHewanController::class, 'exportLokasiHewan']);
    Route::resource('master-data/lokasi/hewan', LokasiHewanController::class)->parameters(
        [
            'hewan' => 'lokasi_hewan'
        ]
    );
    Route::post('master-data/siswa/detail-siswa', [SiswaController::class, 'detailSiswa']);

    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('master-data/opd', OPDController::class);
        Route::resource('master-data/hewan', HewanController::class);
        Route::resource('master-data/tahun', TahunController::class);

        // Akun
        Route::resource('master-data/akun', AkunController::class)->parameters(['akun' => 'user']);

        // Dokumen
        Route::resource('dokumen/road-map', RoadMapController::class)->parameters(['road-map' => 'road_map'])->except(
            'index',
            'show'
        );
        Route::resource('dokumen/master-plan', MasterPlanController::class)->parameters(['master-plan' => 'master-plan'])->except(
            'index',
            'show'
        );

        Route::resource('master-data/penduduk', PendudukController::class)->except(
            'index',
            'show'
        );

        Route::resource('master-data/sekolah/{jenjangSekolah}', SekolahController::class)->parameters([
            '{jenjangSekolah}' => 'sekolah'
        ])->except(
            'index',
            'show'
        );

        Route::resource('master-data/siswa/{sekolah}', SiswaController::class)->parameters([
            '{sekolah}' => 'siswa'
        ])->except(
            'index',
            'show'
        );
    });

    Route::get('map/desa', [LokasiDesaController::class, 'getMapData']);
    Route::get('map/keong', [LokasiKeongController::class, 'getMapData']);
    Route::get('map/hewan', [LokasiHewanController::class, 'getMapData']);

    // List
    Route::get('list/desa', [ListController::class, 'desa']);
    Route::get('list/hewan', [ListController::class, 'hewan']);

    // Dokumen
    Route::resource('dokumen/road-map', RoadMapController::class)->parameters(['road-map' => 'road_map'])->only(
        'index',
        'show'
    );
    Route::resource('dokumen/master-plan', MasterPlanController::class)->parameters(['master-plan' => 'master-plan'])->only(
        'index',
        'show'
    );

    // Pengaturan Akun
    Route::get('pengaturan-akun', [PengaturanAkunController::class, 'index']);
    Route::put('pengaturan-akun', [PengaturanAkunController::class, 'update']);

    // Penduduk
    Route::post('master-data/penduduk/export-jumlah', [PendudukController::class, 'exportJumlah']);
    Route::post('master-data/penduduk/export', [PendudukController::class, 'export']);
    Route::resource('master-data/penduduk', PendudukController::class)->only(
        'index',
        'show'
    );

    // Sekolah
    Route::post('master-data/jenjang-sekolah/export', [JenjangSekolahController::class, 'export']);
    Route::get('master-data/jenjang-sekolah', [JenjangSekolahController::class, 'index']);

    Route::post('master-data/sekolah/{jenjangSekolah}/export', [SekolahController::class, 'export']);
    Route::resource('master-data/sekolah/{jenjangSekolah}', SekolahController::class)->parameters([
        '{jenjangSekolah}' => 'sekolah'
    ])->only(
        'index',
        'show'
    );

    Route::post('master-data/siswa/{sekolah}/export', [SiswaController::class, 'export']);
    Route::post('master-data/siswa/{sekolah}/delete-selected', [SiswaController::class, 'deleteSelected']);
    Route::resource('master-data/siswa/{sekolah}', SiswaController::class)->parameters([
        '{sekolah}' => 'siswa'
    ])->only(
        'index',
        'show'
    );
});
