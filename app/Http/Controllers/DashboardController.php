<?php

namespace App\Http\Controllers;

use App\Exports\AnggaranIntervensiExport;
use App\Exports\IntervensiExport;
use PDO;
use App\Models\OPD;
use App\Models\Desa;
use App\Models\Hewan;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\Penduduk;
use App\Models\JumlahHewan;
use App\Models\LokasiHewan;
use App\Models\LokasiKeong;
use Illuminate\Http\Request;
use App\Models\RealisasiHewan;
use App\Models\RealisasiKeong;
use App\Models\PerencanaanHewan;
use App\Models\PerencanaanKeong;
use App\Models\RealisasiManusia;
use App\Models\PerencanaanManusia;
use App\Http\Controllers\Controller;
use App\Models\SumberDana;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun;
        $totalData = $this->_totalData();
        $lokasi = $this->_lokasi();
        $totalHewan = $this->_totalHewan();
        $intervensi = $this->_intervensi($tahun);

        $tabelKeong = $this->_tabelKeong($tahun);
        $tabelManusia = $this->_tabelManusia($tahun);
        $tabelHewan = $this->_tabelHewan($tahun);
        $tabelSemua = $this->_tabelSemua($tahun);

        $anggaranPerencanaan = $this->_anggaranPerencanaan($tahun);
        $penggunaanAnggaran = $this->_penggunaanAnggaran($tahun);

        $tabelAnggaranKeong = $this->_tabelAnggaranKeong($tahun);
        $tabelAnggaranManusia = $this->_tabelAnggaranManusia($tahun);
        $tabelAnggaranHewan = $this->_tabelAnggaranHewan($tahun);
        $tabelAnggaranSemua = $this->_tabelAnggaranSemua($tahun);

        $perencanaanKeong = PerencanaanKeong::where(function ($query) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            }
        })->latest()->get();
        $totalPerencanaanKeongTidakTerselesaikan = 0;

        $perencanaanManusia = PerencanaanManusia::where(function ($query) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            }
        })->latest()->get();
        $totalPerencanaanManusiaTidakTerselesaikan = 0;

        $perencanaanHewan = PerencanaanHewan::where(function ($query) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            }
        })->latest()->get();
        $totalPerencanaanHewanTidakTerselesaikan = 0;

        if (Auth::user()->role == 'OPD') {
            $totalMenungguKonfirmasiPerencanaanKeong = PerencanaanKeong::where('status', 2)->where('opd_id', Auth::user()->opd_id)->count();
            $totalMenungguKonfirmasiPerencanaanManusia = PerencanaanManusia::where('status', 2)->where('opd_id', Auth::user()->opd_id)->count();
            $totalMenungguKonfirmasiPerencanaanHewan = PerencanaanHewan::where('status', 2)->where('opd_id', Auth::user()->opd_id)->count();

            $listPerencanaanKeong = PerencanaanKeong::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
            $totalMenungguKonfirmasiRealisasiKeong = RealisasiKeong::whereIn('perencanaan_keong_id', $listPerencanaanKeong)->where('status', 2)->count();
            $listPerencanaanManusia = PerencanaanManusia::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
            $totalMenungguKonfirmasiRealisasiManusia = RealisasiManusia::whereIn('perencanaan_manusia_id', $listPerencanaanManusia)->where('status', 2)->count();
            $listPerencanaanHewan = PerencanaanHewan::where('opd_id', Auth::user()->opd_id)->where('status', 1)->pluck('id')->toArray();
            $totalMenungguKonfirmasiRealisasiHewan = RealisasiHewan::whereIn('perencanaan_hewan_id', $listPerencanaanHewan)->where('status', 2)->count();

            foreach ($perencanaanKeong as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
                    $totalPerencanaanKeongTidakTerselesaikan++;
                }
            }

            foreach ($perencanaanManusia as $row) {
                if (($row->created_at->year != Carbon::now()->year) && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
                    $totalPerencanaanManusiaTidakTerselesaikan++;
                }
            }

            foreach ($perencanaanHewan as $row) {
                if (($row->created_at->year != Carbon::now()->year)  && ($row->alasan_tidak_terselesaikan == null) && ($row->status_baca == null)) {
                    $totalPerencanaanHewanTidakTerselesaikan++;
                }
            }
        } else if (in_array(Auth::user()->role, ['Admin', 'Pimpinan'])) {
            $totalMenungguKonfirmasiPerencanaanKeong = PerencanaanKeong::where('status', 0)->count();
            $totalMenungguKonfirmasiPerencanaanManusia = PerencanaanManusia::where('status', 0)->count();
            $totalMenungguKonfirmasiPerencanaanHewan = PerencanaanHewan::where('status', 0)->count();

            $totalMenungguKonfirmasiRealisasiKeong = RealisasiKeong::where('status', 0)->count();
            $totalMenungguKonfirmasiRealisasiManusia = RealisasiManusia::where('status', 0)->count();
            $totalMenungguKonfirmasiRealisasiHewan = RealisasiHewan::where('status', 0)->count();

            foreach ($perencanaanKeong as $row) {
                if (($row->created_at->year != Carbon::now()->year)  && ($row->alasan_tidak_terselesaikan != null) && ($row->status_baca != 1)) {
                    $totalPerencanaanKeongTidakTerselesaikan++;
                }
            }

            foreach ($perencanaanManusia as $row) {
                if (($row->created_at->year != Carbon::now()->year)  && ($row->alasan_tidak_terselesaikan != null) && ($row->status_baca != 1)) {
                    $totalPerencanaanManusiaTidakTerselesaikan++;
                }
            }

            foreach ($perencanaanHewan as $row) {
                if (($row->created_at->year != Carbon::now()->year)  && ($row->alasan_tidak_terselesaikan != null) && ($row->status_baca != 1)) {
                    $totalPerencanaanHewanTidakTerselesaikan++;
                }
            }
        }

        $tahunKeong = PerencanaanKeong::selectRaw('year(created_at) year')->groupBy('year')->get()->pluck('year')->toArray();
        $tahunManusia = PerencanaanManusia::selectRaw('year(created_at) year')->groupBy('year')->get()->pluck('year')->toArray();
        $tahunHewan = PerencanaanHewan::selectRaw('year(created_at) year')->groupBy('year')->get()->pluck('year')->toArray();
        $daftarTahun = array_unique(array_merge($tahunKeong, $tahunManusia, $tahunHewan));
        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();

        return view('dashboard.pages.dashboard', compact(
            [
                'totalData',
                'lokasi',
                'totalHewan',
                'intervensi',
                'tabelKeong',
                'tabelManusia',
                'tabelHewan',
                'tabelSemua',
                'anggaranPerencanaan',
                'penggunaanAnggaran',
                'tabelAnggaranKeong',
                'tabelAnggaranManusia',
                'tabelAnggaranHewan',
                'tabelAnggaranSemua',
                'totalMenungguKonfirmasiPerencanaanKeong',
                'totalMenungguKonfirmasiPerencanaanManusia',
                'totalMenungguKonfirmasiPerencanaanHewan',
                'totalMenungguKonfirmasiRealisasiKeong',
                'totalMenungguKonfirmasiRealisasiManusia',
                'totalMenungguKonfirmasiRealisasiHewan',
                'totalPerencanaanKeongTidakTerselesaikan',
                'totalPerencanaanManusiaTidakTerselesaikan',
                'totalPerencanaanHewanTidakTerselesaikan',
                'daftarTahun',
                'daftarSumberDana',
                'tahun'
            ]
        ));
    }

    private function _tabelKeong($tahun)
    {
        $tabel = [];
        if (Auth::user()->role == 'OPD') {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where('id', Auth::user()->opd_id)->withTrashed()->get();
        } else {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('id', Auth::user()->opd_id);
                }
            })->get();
        }

        $totalPerencanaan = 0;
        $totalRealisasi = 0;
        $totalPersen = 0;

        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanKeong::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();
            $realisasi = RealisasiKeong::with(['perencanaanKeong'])->whereHas('perencanaanKeong', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();

            if ($perencanaan == 0) {
                $persentase = 0;
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];

            $totalPerencanaan += $perencanaan;
            $totalRealisasi += $realisasi;
        }

        if ($totalPerencanaan == 0) {
            $totalPersen = 0;
        } else {
            $totalPersen = round(($totalRealisasi / $totalPerencanaan) * 100, 2);
        }

        $total = [
            'totalPerencanaan' => $totalPerencanaan,
            'totalRealisasi' => $totalRealisasi,
            'totalPersen' => $totalPersen
        ];

        return [
            'tabel' => $tabel,
            'total' => $total
        ];
    }

    private function _tabelManusia($tahun)
    {
        $tabel = [];
        if (Auth::user()->role == 'OPD') {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where('id', Auth::user()->opd_id)->withTrashed()->get();
        } else {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('id', Auth::user()->opd_id);
                }
            })->get();
        }

        $totalPerencanaan = 0;
        $totalRealisasi = 0;
        $totalPersen = 0;

        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanManusia::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();
            $realisasi = RealisasiManusia::with(['perencanaanManusia'])->whereHas('perencanaanManusia', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();

            if ($perencanaan == 0) {
                $persentase = 0;
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];

            $totalPerencanaan += $perencanaan;
            $totalRealisasi += $realisasi;
        }

        if ($totalPerencanaan == 0) {
            $totalPersen = 0;
        } else {
            $totalPersen = round(($totalRealisasi / $totalPerencanaan) * 100, 2);
        }

        $total = [
            'totalPerencanaan' => $totalPerencanaan,
            'totalRealisasi' => $totalRealisasi,
            'totalPersen' => $totalPersen
        ];

        return [
            'tabel' => $tabel,
            'total' => $total
        ];
    }

    private function _tabelHewan($tahun)
    {
        $tabel = [];
        if (Auth::user()->role == 'OPD') {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where('id', Auth::user()->opd_id)->withTrashed()->get();
        } else {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('id', Auth::user()->opd_id);
                }
            })->get();
        }

        $totalPerencanaan = 0;
        $totalRealisasi = 0;
        $totalPersen = 0;

        foreach ($daftarOPD as $opd) {
            $perencanaan = PerencanaanHewan::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();
            $realisasi = RealisasiHewan::with(['perencanaanHewan'])->whereHas('perencanaanHewan', function ($query) use ($opd) {
                $query->where('opd_id', $opd->id);
            })->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->count();

            if ($perencanaan == 0) {
                $persentase = 0;
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];

            $totalPerencanaan += $perencanaan;
            $totalRealisasi += $realisasi;
        }

        if ($totalPerencanaan == 0) {
            $totalPersen = 0;
        } else {
            $totalPersen = round(($totalRealisasi / $totalPerencanaan) * 100, 2);
        }

        $total = [
            'totalPerencanaan' => $totalPerencanaan,
            'totalRealisasi' => $totalRealisasi,
            'totalPersen' => $totalPersen
        ];

        return [
            'tabel' => $tabel,
            'total' => $total
        ];
    }

    private function _tabelSemua($tahun)
    {
        $tabelKeong = $this->_tabelKeong($tahun);
        $tabelManusia = $this->_tabelManusia($tahun);
        $tabelHewan = $this->_tabelHewan($tahun);

        for ($i = 0; $i < count($tabelKeong['tabel']); $i++) {

            $perencanaan = $tabelKeong['tabel'][$i]['perencanaan'] + $tabelManusia['tabel'][$i]['perencanaan'] + $tabelHewan['tabel'][$i]['perencanaan'];
            $realisasi = $tabelKeong['tabel'][$i]['realisasi'] + $tabelManusia['tabel'][$i]['realisasi'] + $tabelHewan['tabel'][$i]['realisasi'];
            if ($perencanaan == 0) {
                $persentase = 0;
            } else {
                $persentase = round(($realisasi / $perencanaan) * 100, 2);
            }

            $tabel[] = [
                'opd' => $tabelKeong['tabel'][$i]['opd'],
                'perencanaan' => round($perencanaan, 2),
                'realisasi' => round($realisasi, 2),
                'persentase' => $persentase
            ];
        }

        $totalPerencanaan = $tabelKeong['total']['totalPerencanaan'] + $tabelManusia['total']['totalPerencanaan'] + $tabelHewan['total']['totalPerencanaan'];
        $totalRealisasi = $tabelKeong['total']['totalRealisasi'] + $tabelManusia['total']['totalRealisasi'] + $tabelHewan['total']['totalRealisasi'];
        if ($totalPerencanaan == 0) {
            $totalPersen = 0;
        } else {
            $totalPersen = round(($totalRealisasi / $totalPerencanaan) * 100, 2);
        }

        $total = [
            'totalPerencanaan' => $totalPerencanaan,
            'totalRealisasi' => $totalRealisasi,
            'totalPersen' => $totalPersen
        ];

        return [
            'tabel' => $tabel,
            'total' => $total
        ];
    }

    private function _intervensi($tahun)
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get()->pluck('id');
        $data = [];
        $perencanaanKeong = PerencanaanKeong::where('status', 1)->where(function ($query) use ($daftarOPD) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            } else {
                $query->whereIn('opd_id', $daftarOPD);
            }
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->count();
        $perencanaanHewan = PerencanaanHewan::where('status', 1)->where(function ($query) use ($daftarOPD) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            } else {
                $query->whereIn('opd_id', $daftarOPD);
            }
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->count();
        $perencanaanManusia = PerencanaanManusia::where('status', 1)->where(function ($query) use ($daftarOPD) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            } else {
                $query->whereIn('opd_id', $daftarOPD);
            }
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->count();
        $perencanaanTotal = $perencanaanHewan + $perencanaanKeong + $perencanaanManusia;

        $realisasiKeong = RealisasiKeong::where('status', '=', 1)->whereHas('perencanaanKeong', function ($query) use ($daftarOPD) {
            $query->where(function ($query) use ($daftarOPD) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                } else {
                    $query->whereIn('opd_id', $daftarOPD);
                }
            });
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->count();
        $realisasiHewan = RealisasiHewan::where('status', '=', 1)->whereHas('perencanaanHewan', function ($query) use ($daftarOPD) {
            $query->where(function ($query) use ($daftarOPD) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                } else {
                    $query->whereIn('opd_id', $daftarOPD);
                }
            });
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->count();

        $realisasiManusia = RealisasiManusia::where('status', '=', 1)->whereHas('perencanaanManusia', function ($query) use ($daftarOPD) {
            $query->where(function ($query) use ($daftarOPD) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                } else {
                    $query->whereIn('opd_id', $daftarOPD);
                }
            });
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->count();
        $realisasiTotal = $realisasiHewan + $realisasiKeong + $realisasiManusia; //tambah nanti realisasi manusia

        $persentaseKeong = $perencanaanKeong == 0 ? 0 : round(($realisasiKeong / $perencanaanKeong) * 100, 2);
        $persentaseHewan = $perencanaanHewan == 0 ? 0 : round(($realisasiHewan / $perencanaanHewan) * 100, 2);
        $persentaseManusia = $perencanaanManusia == 0 ? 0 : round(($realisasiManusia / $perencanaanManusia) * 100, 2);
        $persentaseTotal = $perencanaanTotal == 0 ? 0 : round(($realisasiTotal / $perencanaanTotal) * 100, 2);

        $data = [
            'perencanaanKeong' => $perencanaanKeong,
            'perencanaanHewan' => $perencanaanHewan,
            'perencanaanManusia' => $perencanaanManusia,
            'perencanaanTotal' => $perencanaanTotal,
            'realisasiKeong' => $realisasiKeong,
            'realisasiHewan' => $realisasiHewan,
            'realisasiManusia' => $realisasiManusia,
            'realisasiTotal' => $realisasiTotal,
            'persentaseKeong' => $persentaseKeong,
            'persentaseHewan' => $persentaseHewan,
            'persentaseManusia' => $persentaseManusia,
            'persentaseTotal' => $persentaseTotal
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

    private function _anggaranPerencanaan($tahun)
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get()->pluck('id');
        $anggaranKeong = PerencanaanKeong::where('status', 1)->where(function ($query) use ($daftarOPD) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            } else {
                $query->whereIn('opd_id', $daftarOPD);
            }
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->sum('nilai_pembiayaan');

        $anggaranManusia = PerencanaanManusia::where('status', 1)->where(function ($query) use ($daftarOPD) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            } else {
                $query->whereIn('opd_id', $daftarOPD);
            }
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->sum('nilai_pembiayaan');

        $anggaranHewan = PerencanaanHewan::where('status', 1)->where(function ($query) use ($daftarOPD) {
            if (Auth::user()->role == 'OPD') {
                $query->where('opd_id', Auth::user()->opd_id);
            } else {
                $query->whereIn('opd_id', $daftarOPD);
            }
        })->where(function ($query) use ($tahun) {
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->sum('nilai_pembiayaan');

        $totalAnggaran = $anggaranKeong + $anggaranManusia + $anggaranHewan;

        $data = [
            'anggaranKeong' => $anggaranKeong,
            'anggaranManusia' => $anggaranManusia,
            'anggaranHewan' => $anggaranHewan,
            'totalAnggaran' => $totalAnggaran
        ];

        return $data;
    }

    private function _penggunaanAnggaran($tahun)
    {
        $daftarOPD = OPD::orderBy('nama', 'asc')->get()->pluck('id');
        $anggaranPerencanaan = $this->_anggaranPerencanaan($tahun);

        $persenKeong = 0;
        $persenManusia = 0;
        $persenHewan = 0;
        $persenSisa = 0;
        $persenTotal = 0;

        $penggunaanKeong = PerencanaanKeong::whereHas('realisasiKeong', function ($query) use ($tahun) {
            $query->where('status', 1);
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->where(function ($query) use ($daftarOPD) {
            $query->where(function ($query) use ($daftarOPD) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                } else {
                    $query->whereIn('opd_id', $daftarOPD);
                }
            });
        })->sum('nilai_pembiayaan');

        $penggunaanHewan = PerencanaanHewan::whereHas('realisasiHewan', function ($query) use ($tahun) {
            $query->where('status', 1);
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->where(function ($query) use ($daftarOPD) {
            $query->where(function ($query) use ($daftarOPD) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                } else {
                    $query->whereIn('opd_id', $daftarOPD);
                }
            });
        })->sum('nilai_pembiayaan');

        $penggunaanManusia = PerencanaanManusia::whereHas('realisasiManusia', function ($query) use ($tahun) {
            $query->where('status', 1);
            if (($tahun != '') && $tahun != 'Semua') {
                $query->where('created_at', 'LIKE', '%' . $tahun . '%');
            }
        })->where(function ($query) use ($daftarOPD) {
            $query->where(function ($query) use ($daftarOPD) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                } else {
                    $query->whereIn('opd_id', $daftarOPD);
                }
            });
        })->sum('nilai_pembiayaan');

        if ($anggaranPerencanaan['anggaranKeong'] != 0) {
            $persenKeong = round(($penggunaanKeong / $anggaranPerencanaan['anggaranKeong']) * 100, 2);
        }

        if ($anggaranPerencanaan['anggaranManusia'] != 0) {
            $persenManusia = round(($penggunaanManusia / $anggaranPerencanaan['anggaranManusia']) * 100, 2);
        }

        if ($anggaranPerencanaan['anggaranHewan'] != 0) {
            $persenHewan = round(($penggunaanHewan / $anggaranPerencanaan['anggaranHewan']) * 100, 2);
        }

        $anggaranTotal = $anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'] + $anggaranPerencanaan['anggaranHewan'];
        $penggunaanAnggaran = $penggunaanKeong + $penggunaanHewan + $penggunaanManusia;
        $sisa = $anggaranTotal - $penggunaanAnggaran;


        if ($anggaranTotal != 0) {
            $persenTotal = round(($penggunaanKeong + $penggunaanManusia + $penggunaanHewan)  / ($anggaranPerencanaan['anggaranKeong'] + $anggaranPerencanaan['anggaranManusia'] + $anggaranPerencanaan['anggaranHewan']) * 100, 2);

            $persenSisa = round(($sisa / $anggaranTotal) * 100, 2);
        }

        $data = [
            'penggunaanKeong' => $penggunaanKeong,
            'penggunaanHewan' => $penggunaanHewan,
            'penggunaanManusia' => $penggunaanManusia,
            'penggunaanTotal' => $penggunaanAnggaran,
            'sisaAnggaran' => $sisa,
            'persenKeong' => $persenKeong,
            'persenManusia' => $persenManusia,
            'persenHewan' => $persenHewan,
            'persenTotal' => $persenTotal,
            'persenSisa' => $persenSisa
        ];

        return $data;
    }

    private function _tabelAnggaranKeong($tahun)
    {
        $tabel = [];
        $arrayPerencanaan = [];
        $arrayRealisasi = [];
        $arrayPersentase = [];
        if (Auth::user()->role == 'OPD') {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where('id', Auth::user()->opd_id)->withTrashed()->get();
        } else {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('id', Auth::user()->opd_id);
                }
            })->get();
        }

        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();

        foreach ($daftarOPD as $opd) {
            $arrayPerencanaan = [];
            $arrayRealisasi = [];
            $arrayPersentase = [];
            $arraySisa = [];
            $totalPerencanaan = PerencanaanKeong::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');

            $totalRealisasi = PerencanaanKeong::whereHas('realisasiKeong', function ($query) use ($tahun) {
                $query->where('status', 1);
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->where('opd_id', $opd->id)->sum('nilai_pembiayaan');

            if ($totalPerencanaan == 0) {
                $totalPersentase = 0;
            } else {
                $totalPersentase = round(($totalRealisasi / $totalPerencanaan) * 100, 2);
            }

            foreach ($daftarSumberDana as $sumberDana) {
                $perencanaan = PerencanaanKeong::where('opd_id', $opd->id)->where('sumber_dana_id', $sumberDana->id)->where(function ($query) use ($tahun) {
                    if (($tahun != '') && $tahun != 'Semua') {
                        $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                    }
                })->where('status', 1)->sum('nilai_pembiayaan');

                $realisasi = PerencanaanKeong::whereHas('realisasiKeong', function ($query) use ($tahun) {
                    $query->where('status', 1);
                    if (($tahun != '') && $tahun != 'Semua') {
                        $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                    }
                })->where('sumber_dana_id', $sumberDana->id)->where('status', 1)->where('opd_id', $opd->id)->sum('nilai_pembiayaan');

                if ($perencanaan == 0) {
                    $persentase = 0;
                } else {
                    $persentase = round(($realisasi / $perencanaan) * 100, 2);
                }

                $sisaAnggaran = $perencanaan - $realisasi;

                $arrayPerencanaan[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'perencanaan' => $perencanaan,
                ];

                $arrayRealisasi[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'realisasi' => $realisasi,
                ];

                $arrayPersentase[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'persentase' => $persentase,
                ];

                $arraySisa[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'sisa_anggaran' => $sisaAnggaran
                ];
            }

            $totalSisa = $totalPerencanaan - $totalRealisasi;

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => $arrayPerencanaan,
                'realisasi' => $arrayRealisasi,
                'persentase' => $arrayPersentase,
                'sisaAnggaran' => $arraySisa,
                'totalPerencanaan' => round($totalPerencanaan, 2),
                'totalRealisasi' => round($totalRealisasi, 2),
                'totalSisaAnggaran' => round($totalSisa, 2),
                'totalPersentase' => $totalPersentase,
            ];
        }

        $totalSeluruhPerencanaan = 0;
        $totalSeluruhRealisasi = 0;
        $totalSeluruhSisaAnggaran = 0;
        $totalSeluruhPersentase = 0;
        $totalArrayPerencanaan = [];
        $totalArrayRealisasi = [];
        $totalArrayPersentase = [];
        $totalArraySisaAnggaran = [];


        foreach ($tabel as $jumlah) {
            foreach ($jumlah['perencanaan'] as $perencanaan) {
                if (array_key_exists($perencanaan['sumber_dana'], $totalArrayPerencanaan))
                    $perencanaan['perencanaan'] += $totalArrayPerencanaan[$perencanaan['sumber_dana']]['perencanaan'];

                $totalArrayPerencanaan[$perencanaan['sumber_dana']] = $perencanaan;
            }

            foreach ($jumlah['realisasi'] as $realisasi) {
                if (array_key_exists($realisasi['sumber_dana'], $totalArrayRealisasi))
                    $realisasi['realisasi'] += $totalArrayRealisasi[$realisasi['sumber_dana']]['realisasi'];

                $totalArrayRealisasi[$realisasi['sumber_dana']] = $realisasi;
            }

            foreach ($jumlah['sisaAnggaran'] as $sisaAnggaran) {
                if (array_key_exists($sisaAnggaran['sumber_dana'], $totalArraySisaAnggaran))
                    $sisaAnggaran['sisa_anggaran'] += $totalArraySisaAnggaran[$sisaAnggaran['sumber_dana']]['sisa_anggaran'];

                $totalArraySisaAnggaran[$sisaAnggaran['sumber_dana']] = $sisaAnggaran;
            }

            $totalSeluruhPerencanaan += $jumlah['totalPerencanaan'];
            $totalSeluruhRealisasi += $jumlah['totalRealisasi'];
            $totalSeluruhSisaAnggaran += $jumlah['totalSisaAnggaran'];
        }

        if ($totalSeluruhPerencanaan == 0) {
            $totalSeluruhPersentase = 0;
        } else {
            $totalSeluruhPersentase = round(($totalSeluruhRealisasi / $totalSeluruhPerencanaan) * 100, 2);
        }

        $totalArrayPerencanaan = array_values($totalArrayPerencanaan);
        $totalArrayRealisasi = array_values($totalArrayRealisasi);
        $totalArraySisaAnggaran = array_values($totalArraySisaAnggaran);

        for ($i = 0; $i < count($totalArrayPerencanaan); $i++) {

            if ($totalArrayPerencanaan[$i]['perencanaan'] == 0) {
                $persentase = 0;
            } else {
                $persentase = round(($totalArrayRealisasi[$i]['realisasi'] / $totalArrayPerencanaan[$i]['perencanaan']) * 100, 2);
            }

            $totalArrayPersentase[] = [
                'sumber_dana' => $totalArrayPerencanaan[$i]['sumber_dana'],
                'persentase' => $persentase
            ];
        }

        $total = [
            'totalSeluruhPerencanaan' => $totalSeluruhPerencanaan,
            'totalSeluruhRealisasi' => $totalSeluruhRealisasi,
            'totalSeluruhPersentase' => $totalSeluruhPersentase,
            'totalSeluruhSisaAnggaran' => $totalSeluruhSisaAnggaran,
            'totalArrayPerencanaan' => $totalArrayPerencanaan,
            'totalArrayRealisasi' => $totalArrayRealisasi,
            'totalArraySisaAnggaran' => $totalArraySisaAnggaran,
            'totalArrayPersentase' => $totalArrayPersentase,
        ];

        return [
            'tabel' => $tabel,
            'total' => $total
        ];
    }

    private function _tabelAnggaranManusia($tahun)
    {
        $tabel = [];
        $arrayPerencanaan = [];
        $arrayRealisasi = [];
        $arrayPersentase = [];
        if (Auth::user()->role == 'OPD') {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where('id', Auth::user()->opd_id)->withTrashed()->get();
        } else {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('id', Auth::user()->opd_id);
                }
            })->get();
        }

        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();

        foreach ($daftarOPD as $opd) {
            $arrayPerencanaan = [];
            $arrayRealisasi = [];
            $arrayPersentase = [];
            $arraySisa = [];
            $totalPerencanaan = PerencanaanManusia::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');

            $totalRealisasi = PerencanaanManusia::whereHas('realisasiManusia', function ($query) use ($tahun) {
                $query->where('status', 1);
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->where('opd_id', $opd->id)->sum('nilai_pembiayaan');

            if ($totalPerencanaan == 0) {
                $totalPersentase = 0;
            } else {
                $totalPersentase = round(($totalRealisasi / $totalPerencanaan) * 100, 2);
            }

            foreach ($daftarSumberDana as $sumberDana) {
                $perencanaan = PerencanaanManusia::where('opd_id', $opd->id)->where('sumber_dana_id', $sumberDana->id)->where(function ($query) use ($tahun) {
                    if (($tahun != '') && $tahun != 'Semua') {
                        $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                    }
                })->where('status', 1)->sum('nilai_pembiayaan');

                $realisasi = PerencanaanManusia::whereHas('realisasiManusia', function ($query) use ($tahun) {
                    $query->where('status', 1);
                    if (($tahun != '') && $tahun != 'Semua') {
                        $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                    }
                })->where('sumber_dana_id', $sumberDana->id)->where('status', 1)->where('opd_id', $opd->id)->sum('nilai_pembiayaan');

                if ($perencanaan == 0) {
                    $persentase = 0;
                } else {
                    $persentase = round(($realisasi / $perencanaan) * 100, 2);
                }

                $sisaAnggaran = $perencanaan - $realisasi;

                $arrayPerencanaan[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'perencanaan' => $perencanaan,
                ];

                $arrayRealisasi[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'realisasi' => $realisasi,
                ];

                $arrayPersentase[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'persentase' => $persentase,
                ];

                $arraySisa[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'sisa_anggaran' => $sisaAnggaran
                ];
            }

            $totalSisa = $totalPerencanaan - $totalRealisasi;

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => $arrayPerencanaan,
                'realisasi' => $arrayRealisasi,
                'persentase' => $arrayPersentase,
                'sisaAnggaran' => $arraySisa,
                'totalPerencanaan' => round($totalPerencanaan, 2),
                'totalRealisasi' => round($totalRealisasi, 2),
                'totalSisaAnggaran' => round($totalSisa, 2),
                'totalPersentase' => $totalPersentase,
            ];
        }

        $totalSeluruhPerencanaan = 0;
        $totalSeluruhRealisasi = 0;
        $totalSeluruhSisaAnggaran = 0;
        $totalSeluruhPersentase = 0;
        $totalArrayPerencanaan = [];
        $totalArrayRealisasi = [];
        $totalArrayPersentase = [];
        $totalArraySisaAnggaran = [];


        foreach ($tabel as $jumlah) {
            foreach ($jumlah['perencanaan'] as $perencanaan) {
                if (array_key_exists($perencanaan['sumber_dana'], $totalArrayPerencanaan))
                    $perencanaan['perencanaan'] += $totalArrayPerencanaan[$perencanaan['sumber_dana']]['perencanaan'];

                $totalArrayPerencanaan[$perencanaan['sumber_dana']] = $perencanaan;
            }

            foreach ($jumlah['realisasi'] as $realisasi) {
                if (array_key_exists($realisasi['sumber_dana'], $totalArrayRealisasi))
                    $realisasi['realisasi'] += $totalArrayRealisasi[$realisasi['sumber_dana']]['realisasi'];

                $totalArrayRealisasi[$realisasi['sumber_dana']] = $realisasi;
            }

            foreach ($jumlah['sisaAnggaran'] as $sisaAnggaran) {
                if (array_key_exists($sisaAnggaran['sumber_dana'], $totalArraySisaAnggaran))
                    $sisaAnggaran['sisa_anggaran'] += $totalArraySisaAnggaran[$sisaAnggaran['sumber_dana']]['sisa_anggaran'];

                $totalArraySisaAnggaran[$sisaAnggaran['sumber_dana']] = $sisaAnggaran;
            }

            $totalSeluruhPerencanaan += $jumlah['totalPerencanaan'];
            $totalSeluruhRealisasi += $jumlah['totalRealisasi'];
            $totalSeluruhSisaAnggaran += $jumlah['totalSisaAnggaran'];
        }

        if ($totalSeluruhPerencanaan == 0) {
            $totalSeluruhPersentase = 0;
        } else {
            $totalSeluruhPersentase = round(($totalSeluruhRealisasi / $totalSeluruhPerencanaan) * 100, 2);
        }

        $totalArrayPerencanaan = array_values($totalArrayPerencanaan);
        $totalArrayRealisasi = array_values($totalArrayRealisasi);
        $totalArraySisaAnggaran = array_values($totalArraySisaAnggaran);

        for ($i = 0; $i < count($totalArrayPerencanaan); $i++) {

            if ($totalArrayPerencanaan[$i]['perencanaan'] == 0) {
                $persentase = 0;
            } else {
                $persentase = round(($totalArrayRealisasi[$i]['realisasi'] / $totalArrayPerencanaan[$i]['perencanaan']) * 100, 2);
            }

            $totalArrayPersentase[] = [
                'sumber_dana' => $totalArrayPerencanaan[$i]['sumber_dana'],
                'persentase' => $persentase
            ];
        }

        $total = [
            'totalSeluruhPerencanaan' => $totalSeluruhPerencanaan,
            'totalSeluruhRealisasi' => $totalSeluruhRealisasi,
            'totalSeluruhPersentase' => $totalSeluruhPersentase,
            'totalSeluruhSisaAnggaran' => $totalSeluruhSisaAnggaran,
            'totalArrayPerencanaan' => $totalArrayPerencanaan,
            'totalArrayRealisasi' => $totalArrayRealisasi,
            'totalArraySisaAnggaran' => $totalArraySisaAnggaran,
            'totalArrayPersentase' => $totalArrayPersentase,
        ];

        return [
            'tabel' => $tabel,
            'total' => $total
        ];
    }

    private function _tabelAnggaranHewan($tahun)
    {
        $tabel = [];
        $arrayPerencanaan = [];
        $arrayRealisasi = [];
        $arrayPersentase = [];
        if (Auth::user()->role == 'OPD') {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where('id', Auth::user()->opd_id)->withTrashed()->get();
        } else {
            $daftarOPD = OPD::orderBy('nama', 'asc')->where(function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('id', Auth::user()->opd_id);
                }
            })->get();
        }

        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();

        foreach ($daftarOPD as $opd) {
            $arrayPerencanaan = [];
            $arrayRealisasi = [];
            $arrayPersentase = [];
            $arraySisa = [];
            $totalPerencanaan = PerencanaanHewan::where('opd_id', $opd->id)->where('status', 1)->where(function ($query) use ($tahun) {
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->sum('nilai_pembiayaan');

            $totalRealisasi = PerencanaanHewan::whereHas('realisasiHewan', function ($query) use ($tahun) {
                $query->where('status', 1);
                if (($tahun != '') && $tahun != 'Semua') {
                    $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                }
            })->where('opd_id', $opd->id)->sum('nilai_pembiayaan');

            if ($totalPerencanaan == 0) {
                $totalPersentase = 0;
            } else {
                $totalPersentase = round(($totalRealisasi / $totalPerencanaan) * 100, 2);
            }

            foreach ($daftarSumberDana as $sumberDana) {
                $perencanaan = PerencanaanHewan::where('opd_id', $opd->id)->where('sumber_dana_id', $sumberDana->id)->where(function ($query) use ($tahun) {
                    if (($tahun != '') && $tahun != 'Semua') {
                        $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                    }
                })->where('status', 1)->sum('nilai_pembiayaan');

                $realisasi = PerencanaanHewan::whereHas('realisasiHewan', function ($query) use ($tahun) {
                    $query->where('status', 1);
                    if (($tahun != '') && $tahun != 'Semua') {
                        $query->where('created_at', 'LIKE', '%' . $tahun . '%');
                    }
                })->where('sumber_dana_id', $sumberDana->id)->where('status', 1)->where('opd_id', $opd->id)->sum('nilai_pembiayaan');

                if ($perencanaan == 0) {
                    $persentase = 0;
                } else {
                    $persentase = round(($realisasi / $perencanaan) * 100, 2);
                }

                $sisaAnggaran = $perencanaan - $realisasi;

                $arrayPerencanaan[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'perencanaan' => $perencanaan,
                ];

                $arrayRealisasi[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'realisasi' => $realisasi,
                ];

                $arrayPersentase[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'persentase' => $persentase,
                ];

                $arraySisa[] = [
                    'sumber_dana' => $sumberDana->nama,
                    'sisa_anggaran' => $sisaAnggaran
                ];
            }

            $totalSisa = $totalPerencanaan - $totalRealisasi;

            $tabel[] = [
                'opd' => $opd->nama,
                'perencanaan' => $arrayPerencanaan,
                'realisasi' => $arrayRealisasi,
                'persentase' => $arrayPersentase,
                'sisaAnggaran' => $arraySisa,
                'totalPerencanaan' => round($totalPerencanaan, 2),
                'totalRealisasi' => round($totalRealisasi, 2),
                'totalSisaAnggaran' => round($totalSisa, 2),
                'totalPersentase' => $totalPersentase,
            ];
        }

        $totalSeluruhPerencanaan = 0;
        $totalSeluruhRealisasi = 0;
        $totalSeluruhSisaAnggaran = 0;
        $totalSeluruhPersentase = 0;
        $totalArrayPerencanaan = [];
        $totalArrayRealisasi = [];
        $totalArrayPersentase = [];
        $totalArraySisaAnggaran = [];


        foreach ($tabel as $jumlah) {
            foreach ($jumlah['perencanaan'] as $perencanaan) {
                if (array_key_exists($perencanaan['sumber_dana'], $totalArrayPerencanaan))
                    $perencanaan['perencanaan'] += $totalArrayPerencanaan[$perencanaan['sumber_dana']]['perencanaan'];

                $totalArrayPerencanaan[$perencanaan['sumber_dana']] = $perencanaan;
            }

            foreach ($jumlah['realisasi'] as $realisasi) {
                if (array_key_exists($realisasi['sumber_dana'], $totalArrayRealisasi))
                    $realisasi['realisasi'] += $totalArrayRealisasi[$realisasi['sumber_dana']]['realisasi'];

                $totalArrayRealisasi[$realisasi['sumber_dana']] = $realisasi;
            }

            foreach ($jumlah['sisaAnggaran'] as $sisaAnggaran) {
                if (array_key_exists($sisaAnggaran['sumber_dana'], $totalArraySisaAnggaran))
                    $sisaAnggaran['sisa_anggaran'] += $totalArraySisaAnggaran[$sisaAnggaran['sumber_dana']]['sisa_anggaran'];

                $totalArraySisaAnggaran[$sisaAnggaran['sumber_dana']] = $sisaAnggaran;
            }

            $totalSeluruhPerencanaan += $jumlah['totalPerencanaan'];
            $totalSeluruhRealisasi += $jumlah['totalRealisasi'];
            $totalSeluruhSisaAnggaran += $jumlah['totalSisaAnggaran'];
        }

        if ($totalSeluruhPerencanaan == 0) {
            $totalSeluruhPersentase = 0;
        } else {
            $totalSeluruhPersentase = round(($totalSeluruhRealisasi / $totalSeluruhPerencanaan) * 100, 2);
        }

        $totalArrayPerencanaan = array_values($totalArrayPerencanaan);
        $totalArrayRealisasi = array_values($totalArrayRealisasi);
        $totalArraySisaAnggaran = array_values($totalArraySisaAnggaran);

        for ($i = 0; $i < count($totalArrayPerencanaan); $i++) {

            if ($totalArrayPerencanaan[$i]['perencanaan'] == 0) {
                $persentase = 0;
            } else {
                $persentase = round(($totalArrayRealisasi[$i]['realisasi'] / $totalArrayPerencanaan[$i]['perencanaan']) * 100, 2);
            }

            $totalArrayPersentase[] = [
                'sumber_dana' => $totalArrayPerencanaan[$i]['sumber_dana'],
                'persentase' => $persentase
            ];
        }

        $total = [
            'totalSeluruhPerencanaan' => $totalSeluruhPerencanaan,
            'totalSeluruhRealisasi' => $totalSeluruhRealisasi,
            'totalSeluruhPersentase' => $totalSeluruhPersentase,
            'totalSeluruhSisaAnggaran' => $totalSeluruhSisaAnggaran,
            'totalArrayPerencanaan' => $totalArrayPerencanaan,
            'totalArrayRealisasi' => $totalArrayRealisasi,
            'totalArraySisaAnggaran' => $totalArraySisaAnggaran,
            'totalArrayPersentase' => $totalArrayPersentase,
        ];

        return [
            'tabel' => $tabel,
            'total' => $total
        ];
    }

    private function _tabelAnggaranSemua($tahun)
    {
        $tabel = [];
        $tabelAnggaranHewan = $this->_tabelAnggaranHewan($tahun);
        $tabelAnggaranKeong = $this->_tabelAnggaranKeong($tahun);
        $tabelAnggaranManusia = $this->_tabelAnggaranManusia($tahun);

        for ($i = 0; $i < count($tabelAnggaranHewan['tabel']); $i++) {
            $arrayPerencanaan = [];
            $arrayRealisasi = [];
            $arrayPersentase = [];
            $arraySisa = [];
            $totalPerencanaan = $tabelAnggaranHewan['tabel'][$i]['totalPerencanaan'] + $tabelAnggaranKeong['tabel'][$i]['totalPerencanaan'] + $tabelAnggaranManusia['tabel'][$i]['totalPerencanaan'];

            $totalRealisasi = $tabelAnggaranHewan['tabel'][$i]['totalRealisasi'] + $tabelAnggaranKeong['tabel'][$i]['totalRealisasi'] + $tabelAnggaranManusia['tabel'][$i]['totalRealisasi'];

            if ($totalPerencanaan == 0) {
                $totalPersentase = 0;
            } else {
                $totalPersentase = round(($totalRealisasi / $totalPerencanaan) * 100, 2);
            }

            for ($j = 0; $j < count($tabelAnggaranHewan['tabel'][$i]['perencanaan']); $j++) {
                $perencanaan = $tabelAnggaranHewan['tabel'][$i]['perencanaan'][$j]['perencanaan'] + $tabelAnggaranKeong['tabel'][$i]['perencanaan'][$j]['perencanaan'] + $tabelAnggaranManusia['tabel'][$i]['perencanaan'][$j]['perencanaan'];

                $realisasi = $tabelAnggaranHewan['tabel'][$i]['realisasi'][$j]['realisasi'] + $tabelAnggaranKeong['tabel'][$i]['realisasi'][$j]['realisasi'] + $tabelAnggaranManusia['tabel'][$i]['realisasi'][$j]['realisasi'];

                if ($perencanaan == 0) {
                    $persentase = 0;
                } else {
                    $persentase = round(($realisasi / $perencanaan) * 100, 2);
                }

                $sisaAnggaran = $perencanaan - $realisasi;

                $arrayPerencanaan[] = [
                    'sumber_dana' => $tabelAnggaranHewan['tabel'][$i]['perencanaan'][$j]['sumber_dana'],
                    'perencanaan' => $perencanaan,
                ];

                $arrayRealisasi[] = [
                    'sumber_dana' => $tabelAnggaranHewan['tabel'][$i]['perencanaan'][$j]['sumber_dana'],
                    'realisasi' => $realisasi,
                ];

                $arrayPersentase[] = [
                    'sumber_dana' => $tabelAnggaranHewan['tabel'][$i]['perencanaan'][$j]['sumber_dana'],
                    'persentase' => $persentase,
                ];

                $arraySisa[] = [
                    'sumber_dana' => $tabelAnggaranHewan['tabel'][$i]['perencanaan'][$j]['sumber_dana'],
                    'sisa_anggaran' => $sisaAnggaran
                ];
            }

            $totalSisa = $totalPerencanaan - $totalRealisasi;

            $tabel[] = [
                'opd' => $tabelAnggaranHewan['tabel'][$i]['opd'],
                'perencanaan' => $arrayPerencanaan,
                'realisasi' => $arrayRealisasi,
                'persentase' => $arrayPersentase,
                'sisaAnggaran' => $arraySisa,
                'totalPerencanaan' => round($totalPerencanaan, 2),
                'totalRealisasi' => round($totalRealisasi, 2),
                'totalSisaAnggaran' => round($totalSisa, 2),
                'totalPersentase' => $totalPersentase,
            ];
        }

        $totalSeluruhPerencanaan = 0;
        $totalSeluruhRealisasi = 0;
        $totalSeluruhSisaAnggaran = 0;
        $totalSeluruhPersentase = 0;
        $totalArrayPerencanaan = [];
        $totalArrayRealisasi = [];
        $totalArrayPersentase = [];
        $totalArraySisaAnggaran = [];


        foreach ($tabel as $jumlah) {
            foreach ($jumlah['perencanaan'] as $perencanaan) {
                if (array_key_exists($perencanaan['sumber_dana'], $totalArrayPerencanaan))
                    $perencanaan['perencanaan'] += $totalArrayPerencanaan[$perencanaan['sumber_dana']]['perencanaan'];

                $totalArrayPerencanaan[$perencanaan['sumber_dana']] = $perencanaan;
            }

            foreach ($jumlah['realisasi'] as $realisasi) {
                if (array_key_exists($realisasi['sumber_dana'], $totalArrayRealisasi))
                    $realisasi['realisasi'] += $totalArrayRealisasi[$realisasi['sumber_dana']]['realisasi'];

                $totalArrayRealisasi[$realisasi['sumber_dana']] = $realisasi;
            }

            foreach ($jumlah['sisaAnggaran'] as $sisaAnggaran) {
                if (array_key_exists($sisaAnggaran['sumber_dana'], $totalArraySisaAnggaran))
                    $sisaAnggaran['sisa_anggaran'] += $totalArraySisaAnggaran[$sisaAnggaran['sumber_dana']]['sisa_anggaran'];

                $totalArraySisaAnggaran[$sisaAnggaran['sumber_dana']] = $sisaAnggaran;
            }

            $totalSeluruhPerencanaan += $jumlah['totalPerencanaan'];
            $totalSeluruhRealisasi += $jumlah['totalRealisasi'];
            $totalSeluruhSisaAnggaran += $jumlah['totalSisaAnggaran'];
        }

        if ($totalSeluruhPerencanaan == 0) {
            $totalSeluruhPersentase = 0;
        } else {
            $totalSeluruhPersentase = round(($totalSeluruhRealisasi / $totalSeluruhPerencanaan) * 100, 2);
        }

        $totalArrayPerencanaan = array_values($totalArrayPerencanaan);
        $totalArrayRealisasi = array_values($totalArrayRealisasi);
        $totalArraySisaAnggaran = array_values($totalArraySisaAnggaran);

        for ($i = 0; $i < count($totalArrayPerencanaan); $i++) {

            if ($totalArrayPerencanaan[$i]['perencanaan'] == 0) {
                $persentase = 0;
            } else {
                $persentase = round(($totalArrayRealisasi[$i]['realisasi'] / $totalArrayPerencanaan[$i]['perencanaan']) * 100, 2);
            }

            $totalArrayPersentase[] = [
                'sumber_dana' => $totalArrayPerencanaan[$i]['sumber_dana'],
                'persentase' => $persentase
            ];
        }

        $total = [
            'totalSeluruhPerencanaan' => $totalSeluruhPerencanaan,
            'totalSeluruhRealisasi' => $totalSeluruhRealisasi,
            'totalSeluruhPersentase' => $totalSeluruhPersentase,
            'totalSeluruhSisaAnggaran' => $totalSeluruhSisaAnggaran,
            'totalArrayPerencanaan' => $totalArrayPerencanaan,
            'totalArrayRealisasi' => $totalArrayRealisasi,
            'totalArraySisaAnggaran' => $totalArraySisaAnggaran,
            'totalArrayPersentase' => $totalArrayPersentase,
        ];

        return [
            'tabel' => $tabel,
            'total' => $total
        ];
    }

    public function exportIntervensi(Request $request)
    {
        $tipe = $request->tipe;
        $tahun = $request->tahun;
        if (!in_array($tipe, ['semua', 'keong', 'manusia', 'hewan'])) {
            return redirect()->back();
        }

        $tabelKeong = $this->_tabelKeong($tahun);
        $tabelManusia = $this->_tabelManusia($tahun);
        $tabelHewan = $this->_tabelHewan($tahun);
        $tabelSemua = $this->_tabelSemua($tahun);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new IntervensiExport($tipe, $tabelKeong, $tabelManusia, $tabelHewan, $tabelSemua, $tahun), "Export Intervensi" . "-" . $tipe . '-' . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportAnggaran(Request $request)
    {
        $tipe = $request->tipe;
        $tahun = $request->tahun;
        if (!in_array($tipe, ['semua', 'keong', 'manusia', 'hewan'])) {
            return redirect()->back();
        }

        $tabelAnggaranKeong = $this->_tabelAnggaranKeong($tahun);
        $tabelAnggaranManusia = $this->_tabelAnggaranManusia($tahun);
        $tabelAnggaranHewan = $this->_tabelAnggaranHewan($tahun);
        $tabelAnggaranSemua = $this->_tabelAnggaranSemua($tahun);

        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new AnggaranIntervensiExport($tipe, $tabelAnggaranKeong, $tabelAnggaranManusia, $tabelAnggaranHewan, $tabelAnggaranSemua, $tahun, $daftarSumberDana), "Export Anggaran Intervensi" . "-" . $tipe . '-' . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
