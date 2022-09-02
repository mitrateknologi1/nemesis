<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Hewan;
use App\Models\JumlahHewan;
use App\Models\LokasiHewan;
use App\Models\LokasiKeong;
use App\Models\OPD;
use App\Models\Penduduk;
use App\Models\PerencanaanHewan;
use App\Models\PerencanaanKeong;
use App\Models\PerencanaanManusia;
use App\Models\RealisasiHewan;
use App\Models\RealisasiKeong;
use App\Models\RealisasiManusia;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use PDO;

class DashboardController extends Controller
{
    public function index()
    {
        $totalData = $this->_totalData();
        $lokasi = $this->_lokasi();
        $totalHewan = $this->_totalHewan();
        $intervensi = $this->_intervensi();

        $tabelKeong = $this->_tabelKeong();
        $tabelManusia = $this->_tabelManusia();
        $tabelHewan = $this->_tabelHewan();

        $anggaranPerencanaan = $this->_anggaranPerencanaan();
        $penggunaanAnggaran = $this->_penggunaanAnggaran();

        $tabelAnggaranKeong = $this->_tabelAnggaranKeong();
        $tabelAnggaranManusia = $this->_tabelAnggaranManusia();
        $tabelAnggaranHewan = $this->_tabelAnggaranHewan();
        $tabelAnggaranSemua = $this->_tabelAnggaranSemua();
        // dd($tabelAnggaranManusia);

        return view('dashboard.pages.dashboard', compact(
            [
                'totalData',
                'lokasi',
                'totalHewan',
                'intervensi',
                'tabelKeong',
                'tabelManusia',
                'tabelHewan',
                'anggaranPerencanaan',
                'penggunaanAnggaran',
                'tabelAnggaranKeong',
                'tabelAnggaranManusia',
                'tabelAnggaranHewan',
                'tabelAnggaranSemua'
            ]
        ));
    }

    private function _tabelKeong()
    {
        $tabel = [];
        $daftarOPD = OPD::orderBy('nama', 'asc')->get();
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanKeong::where('opd_id', $opd->id)->where('status', 1)->count();
            $realisasi = RealisasiKeong::with(['perencanaanKeong'])->whereHas('perencanaanKeong', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where('progress', '=', 100)->count();

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];
        }

        return $tabel;
    }

    private function _tabelManusia()
    {
        $tabel = [];
        $daftarOPD = OPD::orderBy('nama', 'asc')->get();
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanManusia::where('opd_id', $opd->id)->where('status', 1)->count();
            $realisasi = RealisasiManusia::with(['perencanaanManusia'])->whereHas('perencanaanManusia', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where('progress', '=', 100)->count();

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];
        }

        return $tabel;
    }

    private function _tabelHewan()
    {
        $tabel = [];
        $daftarOPD = OPD::orderBy('nama', 'asc')->get();
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanHewan::where('opd_id', $opd->id)->where('status', 1)->count();
            $realisasi = RealisasiHewan::with(['perencanaanHewan'])->whereHas('perencanaanHewan', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where('progress', '=', 100)->count();

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];
        }

        return $tabel;
    }

    private function _intervensi()
    {
        $perencanaanKeong = PerencanaanKeong::where('status', 1)->count();
        $perencanaanHewan = PerencanaanHewan::where('status', 1)->count();
        $perencanaanManusia = PerencanaanManusia::where('status', 1)->count();

        $realisasiKeong = RealisasiKeong::where('progress', '=', 100)->count();
        $realisasiHewan = RealisasiHewan::where('progress', '=', 100)->count();
        $realisasiManusia = RealisasiManusia::where('progress', '=', 100)->count();

        $persentaseKeong = round(($realisasiKeong / $perencanaanKeong) * 100, 2);
        $persentaseHewan = round(($realisasiHewan / $perencanaanHewan) * 100, 2);
        $persentaseManusia = round(($realisasiManusia / $perencanaanManusia) * 100, 2);

        $data = [
            'perencanaanKeong' => $perencanaanKeong,
            'perencanaanHewan' => $perencanaanHewan,
            'perencanaanManusia' => $perencanaanManusia,
            'realisasiKeong' => $realisasiKeong,
            'realisasiHewan' => $realisasiHewan,
            'realisasiManusia' => $realisasiManusia,
            'persentaseKeong' => $persentaseKeong,
            'persentaseHewan' => $persentaseHewan,
            'persentaseManusia' => $persentaseManusia,
        ];

        return $data;
    }

    private function _lokasi()
    {
        $desa = Desa::count();
        $lokasiKeong = LokasiKeong::count();
        $lokasiHewan = LokasiHewan::count();

        $data = [
            'desa' => $desa,
            'lokasiKeong' => $lokasiKeong,
            'lokasiHewan' => $lokasiHewan
        ];

        return $data;
    }

    private function _totalHewan()
    {
        $arrayHewan = [];
        $daftarHewan = Hewan::orderBy('nama', 'asc')->get();
        foreach ($daftarHewan as $hewan) {
            $jumlahHewan = JumlahHewan::where('hewan_id', $hewan->id)
                ->sum('jumlah');

            $arrayHewan[] = [
                'nama_hewan' => $hewan->nama,
                'jumlah' => $jumlahHewan
            ];
        }

        return $arrayHewan;
    }

    private function _totalData()
    {
        $penduduk = Penduduk::count();
        $sekolah = Sekolah::count();
        $siswaSekolah = Siswa::count();
        $opd = OPD::count();

        $data = [
            'penduduk' => $penduduk,
            'sekolah' => $sekolah,
            'siswaSekolah' => $siswaSekolah,
            'opd' => $opd
        ];

        return $data;
    }

    private function _anggaranPerencanaan()
    {
        $anggaranKeong = PerencanaanKeong::where('status', 1)->sum('nilai_pembiayaan');
        $anggaranManusia = PerencanaanManusia::where('status', 1)->sum('nilai_pembiayaan');
        $anggaranHewan = PerencanaanHewan::where('status', 1)->sum('nilai_pembiayaan');

        $data = [
            'anggaranKeong' => $anggaranKeong,
            'anggaranManusia' => $anggaranManusia,
            'anggaranHewan' => $anggaranHewan,
        ];

        return $data;
    }

    private function _penggunaanAnggaran()
    {
        $penggunaanKeong = RealisasiKeong::where('status', 1)->sum('penggunaan_anggaran');
        $penggunaanManusia = RealisasiManusia::where('status', 1)->sum('penggunaan_anggaran');
        $penggunaanHewan = RealisasiHewan::where('status', 1)->sum('penggunaan_anggaran');

        $data = [
            'penggunaanKeong' => $penggunaanKeong,
            'penggunaanManusia' => $penggunaanManusia,
            'penggunaanHewan' => $penggunaanHewan
        ];

        return $data;
    }

    private function _tabelAnggaranKeong()
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get();
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanKeong::where('opd_id', $opd->id)->where('status', 1)->sum('nilai_pembiayaan');
            $perencanaanDau = PerencanaanKeong::where('opd_id', $opd->id)->where('sumber_dana', 'DAU')->where('status', 1)->sum('nilai_pembiayaan');
            $perencanaanDak = PerencanaanKeong::where('opd_id', $opd->id)->where('sumber_dana', 'DAK')->where('status', 1)->sum('nilai_pembiayaan');

            $realisasi = RealisasiKeong::with(['perencanaanKeong'])->where('status', 1)->whereHas('perencanaanKeong', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->sum('penggunaan_anggaran');
            $realisasiDau = RealisasiKeong::with(['perencanaanKeong'])->where('status', 1)->whereHas('perencanaanKeong', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAU');
                $query->where('opd_id', $opd->id);
            })->sum('penggunaan_anggaran');
            $realisasiDak = RealisasiKeong::with(['perencanaanKeong'])->where('status', 1)->whereHas('perencanaanKeong', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAK');
                $query->where('opd_id', $opd->id);
            })->sum('penggunaan_anggaran');

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            if ($perencanaanDau == 0) {
                $persentaseDau = '-';
            } else {
                $persentaseDau = round(($realisasiDau / $perencanaanDau) * 100, 2);
            }

            if ($perencanaanDak == 0) {
                $persentaseDak = '-';
            } else {
                $persentaseDak = round(($realisasiDak / $perencanaanDak) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'perencanaanDau' => round($perencanaanDau, 2),
                'perencanaanDak' => round($perencanaanDak, 2),
                'realisasi' => round($realisasi, 2),
                'realisasiDau' => round($realisasiDau, 2),
                'realisasiDak' => round($realisasiDak, 2),
                'persentase' => $persentase,
                'persentaseDau' => $persentaseDau,
                'persentaseDak' => $persentaseDak,
            ];
        }

        return $tabel;
    }

    private function _tabelAnggaranManusia()
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get();
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanManusia::where('opd_id', $opd->id)->where('status', 1)->sum('nilai_pembiayaan');
            $perencanaanDau = PerencanaanManusia::where('opd_id', $opd->id)->where('sumber_dana', 'DAU')->where('status', 1)->sum('nilai_pembiayaan');
            $perencanaanDak = PerencanaanManusia::where('opd_id', $opd->id)->where('sumber_dana', 'DAK')->where('status', 1)->sum('nilai_pembiayaan');

            $realisasi = RealisasiManusia::with(['perencanaanManusia'])->where('status', 1)->whereHas('perencanaanManusia', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->sum('penggunaan_anggaran');
            $realisasiDau = RealisasiManusia::with(['perencanaanManusia'])->where('status', 1)->whereHas('perencanaanManusia', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAU');
                $query->where('opd_id', $opd->id);
            })->sum('penggunaan_anggaran');
            $realisasiDak = RealisasiManusia::with(['perencanaanManusia'])->where('status', 1)->whereHas('perencanaanManusia', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAK');
                $query->where('opd_id', $opd->id);
            })->sum('penggunaan_anggaran');

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            if ($perencanaanDau == 0) {
                $persentaseDau = '-';
            } else {
                $persentaseDau = round(($realisasiDau / $perencanaanDau) * 100, 2);
            }

            if ($perencanaanDak == 0) {
                $persentaseDak = '-';
            } else {
                $persentaseDak = round(($realisasiDak / $perencanaanDak) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'perencanaanDau' => round($perencanaanDau, 2),
                'perencanaanDak' => round($perencanaanDak, 2),
                'realisasi' => round($realisasi, 2),
                'realisasiDau' => round($realisasiDau, 2),
                'realisasiDak' => round($realisasiDak, 2),
                'persentase' => $persentase,
                'persentaseDau' => $persentaseDau,
                'persentaseDak' => $persentaseDak,
            ];
        }

        return $tabel;
    }

    private function _tabelAnggaranHewan()
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get();
        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanHewan::where('opd_id', $opd->id)->where('status', 1)->sum('nilai_pembiayaan');
            $perencanaanDau = PerencanaanHewan::where('opd_id', $opd->id)->where('sumber_dana', 'DAU')->where('status', 1)->sum('nilai_pembiayaan');
            $perencanaanDak = PerencanaanHewan::where('opd_id', $opd->id)->where('sumber_dana', 'DAK')->where('status', 1)->sum('nilai_pembiayaan');

            $realisasi = RealisasiHewan::with(['perencanaanHewan'])->where('status', 1)->whereHas('perencanaanHewan', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->sum('penggunaan_anggaran');
            $realisasiDau = RealisasiHewan::with(['perencanaanHewan'])->where('status', 1)->whereHas('perencanaanHewan', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAU');
                $query->where('opd_id', $opd->id);
            })->sum('penggunaan_anggaran');
            $realisasiDak = RealisasiHewan::with(['perencanaanHewan'])->where('status', 1)->whereHas('perencanaanHewan', function ($query) use ($opd) {
                $query->where('sumber_dana', 'DAK');
                $query->where('opd_id', $opd->id);
            })->sum('penggunaan_anggaran');

            if ($perencanaan == 0) {
                $persentase = '-';
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            if ($perencanaanDau == 0) {
                $persentaseDau = '-';
            } else {
                $persentaseDau = round(($realisasiDau / $perencanaanDau) * 100, 2);
            }

            if ($perencanaanDak == 0) {
                $persentaseDak = '-';
            } else {
                $persentaseDak = round(($realisasiDak / $perencanaanDak) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'perencanaanDau' => round($perencanaanDau, 2),
                'perencanaanDak' => round($perencanaanDak, 2),
                'realisasi' => round($realisasi, 2),
                'realisasiDau' => round($realisasiDau, 2),
                'realisasiDak' => round($realisasiDak, 2),
                'persentase' => $persentase,
                'persentaseDau' => $persentaseDau,
                'persentaseDak' => $persentaseDak,
            ];
        }

        return $tabel;
    }

    private function _tabelAnggaranSemua()
    {
        $tabelAnggaranHewan = $this->_tabelAnggaranHewan();
        $tabelAnggaranKeong = $this->_tabelAnggaranKeong();
        $tabelAnggaranManusia = $this->_tabelAnggaranManusia();

        for ($i = 0; $i < count($tabelAnggaranHewan); $i++) {
            $persentase = '-';
            $persentaseDau = '-';
            $persentaseDak = '-';

            $perencanaan = $tabelAnggaranHewan[$i]['perencanaan'] + $tabelAnggaranKeong[$i]['perencanaan'] + $tabelAnggaranManusia[$i]['perencanaan'];
            $perencanaanDau = $tabelAnggaranHewan[$i]['perencanaanDau'] + $tabelAnggaranKeong[$i]['perencanaanDau'] + $tabelAnggaranManusia[$i]['perencanaanDau'];
            $perencanaanDak = $tabelAnggaranHewan[$i]['perencanaanDak'] + $tabelAnggaranKeong[$i]['perencanaanDak'] + $tabelAnggaranManusia[$i]['perencanaanDak'];

            $realisasi = $tabelAnggaranHewan[$i]['realisasi'] + $tabelAnggaranKeong[$i]['realisasi'] + $tabelAnggaranManusia[$i]['realisasi'];
            $realisasiDau = $tabelAnggaranHewan[$i]['realisasiDau'] + $tabelAnggaranKeong[$i]['realisasi'] + $tabelAnggaranManusia[$i]['realisasi'];
            $realisasiDak = $tabelAnggaranHewan[$i]['realisasiDak'] + $tabelAnggaranKeong[$i]['realisasi'] + $tabelAnggaranManusia[$i]['realisasi'];

            if ($perencanaan != 0) {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            if ($perencanaanDau != 0) {
                $persentaseDau = round(($realisasiDau / $perencanaanDau) * 100, 2);
            }

            if ($perencanaanDak != 0) {
                $persentaseDak = round(($realisasiDak / $perencanaanDak) * 100, 2);
            }


            $tabel[] = [
                'opd' => $tabelAnggaranHewan[$i]['opd'],
                'perencanaan' => $perencanaan,
                'perencanaanDau' => $perencanaanDau,
                'perencanaanDak' => $perencanaanDak,
                'realisasi' => $realisasi,
                'realisasiDau' => $realisasiDau,
                'realisasiDak' => $realisasiDak,
                'persentase' => $persentase,
                'persentaseDau' => $persentaseDau,
                'persentaseDak' => $persentaseDak,
            ];
        }

        return $tabel;
    }
}
