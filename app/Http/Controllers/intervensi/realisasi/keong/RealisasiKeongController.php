<?php

namespace App\Http\Controllers\intervensi\realisasi\keong;


use Carbon\Carbon;
use App\Models\OPD;
use App\Models\Desa;
use App\Models\LokasiKeong;
use Illuminate\Http\Request;
use App\Models\RealisasiKeong;
use App\Models\OPDTerkaitKeong;
use App\Models\PerencanaanKeong;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RealisasiKeongExport;
use App\Models\DokumenRealisasiKeong;
use App\Models\LokasiRealisasiKeong;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Exports\HasilRealisasiKeongExport;

class RealisasiKeongController extends Controller
{
    public function dataRealisasi()
    {
        $query = RealisasiKeong::with('perencanaanKeong', 'lokasiRealisasiKeong')
            ->whereHas('perencanaanKeong', function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkaitKeong', function ($q) {
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest();
        return $query;
    }

    public function index(Request $request)
    {
        $realisasiKeong = $this->dataRealisasi();

        if ($request->ajax()) {
            $data = $realisasiKeong
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                        $query->whereYear('created_at', $request->tahun_filter);
                    }

                    if ($request->opd_filter && $request->opd_filter != 'semua') {
                        $query->whereHas('perencanaanKeong', function ($q) use ($request) {
                            $q->where('opd_id', $request->opd_filter);
                        });
                    }

                    if ($request->status_filter && $request->status_filter != 'semua') {
                        $filter = $request->status_filter;
                        if (in_array($filter, array("-", 1, 2))) {
                            if ($filter == "-") {
                                $query->where('status', 0);
                            } else {
                                if ($filter == 10) {
                                    $query->where('status', 1);
                                    $query->doesntHave('realisasiKeong');
                                } else if ($filter == 11) {
                                    $query->where('status', 1);
                                    $query->whereHas('realisasiKeong', function ($q) {
                                        $q->where('status', 1);
                                    });
                                } else {
                                    $query->where('status', $filter);
                                }
                            }
                        }
                    }

                    if ($request->search_filter && $request->search_filter != '') {
                        $query->whereHas('perencanaanKeong', function ($q) use ($request) {
                            $q->where('sub_indikator', 'like', '%' . $request->search_filter . '%');
                        });
                    }
                })->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('sub_indikator', function ($row) {
                    return $row->perencanaanKeong->sub_indikator;
                })

                ->addColumn('opd', function ($row) {
                    if (Auth::user()->role == 'OPD') {
                        if ($row->perencanaanKeong->opd_id == Auth::user()->opd_id) {
                            return $row->perencanaanKeong->opd->nama;
                        } else {
                            return '<span class="badge badge-primary">' . $row->perencanaanKeong->opd->nama . '</span>';
                        }
                    } else {
                        return $row->perencanaanKeong->opd->nama;
                    }
                })

                ->addColumn('penggunaan_anggaran', function ($row) {
                    return $row->perencanaanKeong->nilai_pembiayaan;
                })

                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        return '<span class="badge fw-bold badge-warning">Menunggu Konfirmasi</span>';
                    } else if ($row->status == 1) {
                        return '<span class="badge fw-bold badge-success">Disetujui</span>';
                    } else if ($row->status == 2) {
                        return '<span class="badge fw-bold badge-danger">Ditolak</span>';
                    }
                })

                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="text-center justify-content-center text-white my-1">';
                    if ($row->status == 0) {
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            if (Auth::user()->opd_id == $row->perencanaanKeong->opd_id) {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi-keong.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                                $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                            }
                        } else { //admin & pimpinan
                            if (Auth::user()->role == 'Admin') {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                            } else {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            }
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . route('realisasi-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-keong.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . route('realisasi-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if ((Auth::user()->role == 'OPD') && (Auth::user()->opd_id == $row->perencanaanKeong->opd_id)) {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-keong.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    }
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })


                ->rawColumns([
                    'status',
                    'opd',
                    'action',
                ])
                ->make(true);
        }

        if (Auth::user()->role == 'OPD') {
            $totalMenungguKonfirmasiRealisasiKeong = RealisasiKeong::with('perencanaanKeong')->whereHas('perencanaanKeong', function ($q) {
                $q->where('opd_id', Auth::user()->opd_id);
            })->where('status', 2)->count();
        } else {
            $totalMenungguKonfirmasiRealisasiKeong = RealisasiKeong::where('status', 0)->count();
        }

        $tahun = $this->dataRealisasi()->select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->pluck('year');

        $opdFilter = [];
        $iter = 1;
        foreach ($this->dataRealisasi()->get() as $item) {
            $data = [
                'id' => $item->perencanaanKeong->opd_id,
                'nama' => $item->perencanaanKeong->opd->nama
            ];
            if ($iter == 1) {
                array_push($opdFilter, $data);
            } else {
                $found_key = array_search($item->perencanaanKeong->opd_id, array_column($opdFilter, 'id'));
                if (!$found_key) {
                    array_push($opdFilter, $data);
                }
            }
            $iter++;
        }

        return view('dashboard.pages.intervensi.realisasi.keong.subIndikator.index', ['opdFilter' => $opdFilter, 'totalMenungguKonfirmasiRealisasi' => $totalMenungguKonfirmasiRealisasiKeong, 'tahun' => $tahun]);
    }

    public function create()
    {
        if (in_array(Auth::user()->role, ['Admin', 'Pimpinan'])) {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $listPerencanaan = PerencanaanKeong::with('opdTerkaitKeong')->whereDoesntHave('realisasiKeong')->where('opd_id', Auth::user()->opd_id)->where('status', 1)->whereYear('created_at', Carbon::now()->year)->get();

        $data = [
            'desa' => Desa::all(),
            'opd' => OPD::orderBy('nama')->whereNot('id', Auth::user()->opd_id)->get(),
            'listPerencanaan' => $listPerencanaan
        ];

        return view('dashboard.pages.intervensi.realisasi.keong.subIndikator.create', $data);
    }

    public function show(RealisasiKeong $realisasi_intervensi_keong)
    {
        $data = [
            'realisasi_intervensi_keong' => $realisasi_intervensi_keong,
            'opdTerkait' => json_encode($realisasi_intervensi_keong->perencanaanKeong->opdTerkaitKeong->pluck('opd_id')->toArray()),
            'opd' => OPD::orderBy('nama')->whereNot('id', $realisasi_intervensi_keong->opd_id)->get(),
        ];
        return view('dashboard.pages.intervensi.realisasi.keong.subIndikator.show', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
                'lokasi' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus dipilih',
                'lokasi.required' => 'Lokasi harus dipilih',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $perencanaanKeong = PerencanaanKeong::find($request->sub_indikator);
        $perencanaanKeong->opdTerkaitKeong()->delete();
        if ($request->opd_terkait) {
            foreach ($request->opd_terkait as $item) {
                $data = [
                    'perencanaan_keong_id' => $perencanaanKeong->id,
                    'opd_id' => $item,
                ];
                OPDTerkaitKeong::create($data);
            }
        }

        if ($request->nama_dokumen != null) {
            $countFileDokumen = count($request->file_dokumen ?? []);
            $countNamaDokumen = count($request->nama_dokumen);

            if ($countFileDokumen == $countNamaDokumen) {
                if (in_array(null, $request->nama_dokumen)) {
                    return 'nama_dokumen_kosong';
                }
            } else {
                return 'nama_dokumen_kosong_dan_file_dokumen_kosong';
            }
        }

        $dataRealisasi = [
            'perencanaan_keong_id' => $perencanaanKeong->id,
            'status' => 0,
        ];

        $insertRealisasi = RealisasiKeong::create($dataRealisasi);

        if ($request->lokasi != null) {
            foreach ($request->lokasi as $lokasi) {
                $dataLokasi = [
                    'realisasi_keong_id' => $insertRealisasi->id,
                    'lokasi_keong_id' => $lokasi,
                ];
                $insertLokasi = LokasiRealisasiKeong::create($dataLokasi);
            }
        }

        $no_dokumen = 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $perencanaanKeong->opd->nama . '-' . $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();

                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/keong',
                    $namaFile
                );

                $dataDokumen = [
                    'realisasi_keong_id' => $insertRealisasi->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenRealisasiKeong::create($dataDokumen);
                $no_dokumen++;
            }
        }

        return response()->json('kirim');
    }

    public function edit(RealisasiKeong $realisasi_intervensi_keong)
    {
        if (Auth::user()->role == 'Admin') {
            if (in_array($realisasi_intervensi_keong->status, [0, 2])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else if (Auth::user()->role == 'OPD') {
            if (Auth::user()->opd_id != $realisasi_intervensi_keong->perencanaanKeong->opd_id) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
            if (in_array($realisasi_intervensi_keong->status, [1])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $listPerencanaan = PerencanaanKeong::with('opdTerkaitKeong')
            ->where(function ($q) use ($realisasi_intervensi_keong) {
                $q->whereDoesntHave('realisasiKeong')->where('status', 1)->whereYear('created_at', Carbon::now()->year);
                if (Auth::user()->role == 'OPD') {
                    $q->where('opd_id', Auth::user()->opd_id);
                } else {
                    $q->where('opd_id', $realisasi_intervensi_keong->perencanaanKeong->opd_id);
                }
            })
            ->orWhere(function ($q) use ($realisasi_intervensi_keong) {
                $q->where('id', $realisasi_intervensi_keong->perencanaanKeong->id);
            })
            ->get();

        $data = [
            'realisasiIntervensiKeong' => $realisasi_intervensi_keong,
            'listPerencanaan' => $listPerencanaan,
            'opd' => OPD::orderBy('nama')->whereNot('id', $realisasi_intervensi_keong->perencanaanKeong->opd_id)->get(),
            'desa' => Desa::all(),
            'lokasiRealisasiKeong' => json_encode($realisasi_intervensi_keong->lokasiRealisasiKeong->where('realisasi_keong_id', $realisasi_intervensi_keong->id)->pluck('lokasi_keong_id')->toArray()),
            'opdTerkaitKeong' => json_encode($realisasi_intervensi_keong->perencanaanKeong->opdTerkaitKeong->pluck('opd_id')->toArray()),
        ];

        return view('dashboard.pages.intervensi.realisasi.keong.subIndikator.edit', $data);
    }

    public function update(Request $request, RealisasiKeong $realisasi_intervensi_keong)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
                'lokasi' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus dipilih',
                'lokasi.required' => 'Lokasi harus dipilih',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        // validate untuk dokumen lama
        if (in_array(null, $request->nama_dokumen_old)) {
            return 'nama_dokumen_kosong_old';
        }

        // validate untuk dokumen baru
        if ($request->nama_dokumen != null) {
            $countFileDokumen = count($request->file_dokumen ?? []);
            $countNamaDokumen = count($request->nama_dokumen);

            if ($countFileDokumen == $countNamaDokumen) {
                if (in_array(null, $request->nama_dokumen)) {
                    return 'nama_dokumen_kosong';
                }
            } else {
                return 'nama_dokumen_kosong_dan_file_dokumen_kosong';
            }
        }

        $perencanaan_id = $request->sub_indikator;
        $perencanaanKeong = PerencanaanKeong::find($perencanaan_id);
        $perencanaanKeong->opdTerkaitKeong()->delete();
        if ($request->opd_terkait) {
            foreach ($request->opd_terkait as $item) {
                $data = [
                    'perencanaan_keong_id' => $perencanaanKeong->id,
                    'opd_id' => $item,
                ];
                OPDTerkaitKeong::create($data);
            }
        }

        // update lokasi perencanaan
        if ($request->lokasi != null) {
            $realisasi_intervensi_keong->lokasiRealisasiKeong()->delete();
            foreach ($request->lokasi as $lokasi) {
                $dataLokasi = [
                    'realisasi_keong_id' => $realisasi_intervensi_keong->id,
                    'lokasi_keong_id' => $lokasi,
                ];
                if (Auth::user()->role == 'Admin') {
                    $dataLokasi['status'] = $realisasi_intervensi_keong->status;
                }
                $insertLokasi = LokasiRealisasiKeong::create($dataLokasi);
            }
        }

        // Hapus dokumen lama
        if ($request->deleteDocumentOld != null) {
            $deleteDocumentOld = explode(',', $request->deleteDocumentOld);
            foreach ($deleteDocumentOld as $item) {
                $namaFile = DokumenRealisasiKeong::where('id', $item)->first()->file;
                if (Storage::exists('uploads/dokumen/realisasi/keong/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/keong/' . $namaFile);
                }
                DokumenRealisasiKeong::where('id', $item)->delete();
            }
        }

        // update deskripsi/title dokumen lama
        if ($request->nama_dokumen_old) {
            foreach ($request->nama_dokumen_old as $key => $value) {
                $idUpdateNama = $realisasi_intervensi_keong->dokumenRealisasiKeong[$key]->id;
                $dataDokumen = DokumenRealisasiKeong::find($idUpdateNama);

                $dataDokumen->update([
                    'nama' => $request->nama_dokumen_old[$key],
                ]);
            }
        }

        //  update file dokumen lama
        if ($request->file_dokumen_old) {
            foreach ($request->file_dokumen_old as $key => $value) {
                $idUpdateDokumen = $realisasi_intervensi_keong->dokumenRealisasiKeong[$key]->id;
                $dataDokumen = DokumenRealisasiKeong::find($idUpdateDokumen);
                if (Storage::exists('uploads/dokumen/realisasi/keong/' . $dataDokumen->file)) {
                    Storage::delete('uploads/dokumen/realisasi/keong/' . $dataDokumen->file);
                }

                $namaFile = mt_rand() . '-' . $request->nama_dokumen_old[$key] . '-' . $realisasi_intervensi_keong->perencanaanKeong->opd->nama . '-' .  $dataDokumen->no_urut . '.' . $value->getClientOriginalExtension();
                $value->storeAs('uploads/dokumen/realisasi/keong/', $namaFile);

                $update = [
                    'nama' => $request->nama_dokumen_old[$key],
                    'file' => $namaFile,
                ];

                $dataDokumen->update($update);
            }
        }

        // update dokumen baru
        $no_dokumen = $realisasi_intervensi_keong->dokumenRealisasiKeong->max('no_urut') + 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $realisasi_intervensi_keong->perencanaanKeong->opd->nama . '-' .  $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();
                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/keong/',
                    $namaFile
                );

                $dataDokumen = [
                    'realisasi_keong_id' => $realisasi_intervensi_keong->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenRealisasiKeong::create($dataDokumen);
                $no_dokumen++;
            }
        }

        $dataRealisasi = [];

        $dataRealisasi['perencanaan_keong_id'] = $perencanaan_id;
        if (Auth::user()->role == 'OPD') {
            $dataRealisasi['status'] = 0;
            $dataRealisasi['alasan_ditolak'] = '-';
        }
        $realisasi_intervensi_keong->update($dataRealisasi);

        return response()->json('perbarui');
    }

    public function map(RealisasiKeong $realisasi_intervensi_keong)
    {
        $getLokasiKeong = $realisasi_intervensi_keong->lokasiRealisasiKeong->pluck('lokasi_keong_id')->toArray();
        $lokasiKeong = LokasiKeong::with(['desa', 'pemilikLokasiKeong', 'pemilikLokasiKeong.penduduk'])->whereIn('id', $getLokasiKeong)->get();
        return response()->json(['status' => 'success', 'data' => $lokasiKeong]);
    }

    public function konfirmasi(RealisasiKeong $realisasi_intervensi_keong, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'status' => 'required',
                'alasan_ditolak' => $request->status == 2 ? 'required' : '',
            ],
            [
                'status.required' => 'Status harus diisi',
                'alasan_ditolak.required' => 'Alasan ditolak harus diisi',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = [
            'status' => $request->status,
            'alasan_ditolak' => $request->status == 2 ? $request->alasan_ditolak : '-',
            'tanggal_konfirmasi' => Carbon::now(),
        ];

        $realisasi_intervensi_keong->update($data);

        // update lokasi perencanaan
        foreach ($realisasi_intervensi_keong->lokasiRealisasiKeong as $item) {
            if ($request->status == 1) {
                $item->status = 1;
            } else {
                $item->status = 2;
            }
            $item->save();
        }

        return response()->json(['success' => 'Berhasil mengkonfirmasi']);
    }

    function unique_multidim_array($array, $key)
    {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function destroy(RealisasiKeong $realisasi_intervensi_keong)
    {
        if ($realisasi_intervensi_keong->dokumenRealisasiKeong) {
            foreach ($realisasi_intervensi_keong->dokumenRealisasiKeong as $doc) {
                if (Storage::exists('uploads/dokumen/realisasi/keong/' . $doc->file)) {
                    Storage::delete('uploads/dokumen/realisasi/keong/' . $doc->file);
                }
                DokumenRealisasiKeong::where('id', $realisasi_intervensi_keong->id)->delete();
            }
            $realisasi_intervensi_keong->dokumenRealisasiKeong()->delete();
        }

        $realisasi_intervensi_keong->lokasiRealisasiKeong()->delete();
        $realisasi_intervensi_keong->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function hasilRealisasi(Request $request)
    {
        $tahun = $request->tahun;
        $tahun_filter = $request->tahun_filter;

        $habitatKeong = LokasiRealisasiKeong::where('status', 1)
            ->whereHas('realisasiKeong', function ($q) use ($tahun_filter) {
                if ($tahun_filter && $tahun_filter != 'Semua') {
                    $q->whereYear('created_at', $tahun_filter);
                }
            })
            ->groupBy('lokasi_keong_id')
            ->pluck('lokasi_keong_id')
            ->toArray();

        $dataHabitatKeong = LokasiKeong::with('listIndikator', 'desa')->whereIn('id', $habitatKeong);

        if ($request->ajax()) {
            $data = $dataHabitatKeong
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->opd_filter && $request->opd_filter != 'Semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('realisasiKeong', function ($query3) use ($request) {
                                $query3->whereHas('perencanaanKeong', function ($query4) use ($request) {
                                    $query4->where(function ($query5) use ($request) {
                                        $query5->where('opd_id', $request->opd_filter);
                                        $query5->orWhereHas('opdTerkaitKeong', function ($query6) use ($request) {
                                            $query6->where('opd_id', $request->opd_filter);
                                        });
                                    });
                                });
                                if ($request->tahun_filter && $request->tahun_filter != 'Semua') {
                                    $query3->whereYear('created_at', $request->tahun_filter);
                                }
                            });
                        });
                    }

                    if ($request->indikator_filter && $request->indikator_filter != 'Semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('realisasiKeong', function ($query3) use ($request) {
                                $query3->whereHas('perencanaanKeong', function ($query4) use ($request) {
                                    $query4->where('id', $request->indikator_filter);
                                });
                                if ($request->tahun_filter && $request->tahun_filter != 'Semua') {
                                    $query3->whereYear('created_at', $request->tahun_filter);
                                }
                            });
                        });
                    }

                    if ($request->search_filter) {
                        $query->where(function ($query2) use ($request) {
                            $query2->where('nama', 'like', '%' . $request->search_filter . '%');
                        });
                    }
                });
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('list_indikator', function ($row) use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'Semua') {
                            if (Carbon::parse($row2->realisasiKeong->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li>' . $row2->realisasiKeong->perencanaanKeong->sub_indikator . '</li>';
                            }
                        } else {
                            $list .= '<li>' . $row2->realisasiKeong->perencanaanKeong->sub_indikator . '</li>';
                        }
                    }
                    $list .= '</ol>';
                    return $list;
                })

                ->addColumn('list_opd', function ($row) use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'Semua') {
                            if (Carbon::parse($row2->realisasiKeong->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li class="font-weight-bold">' . $row2->realisasiKeong->perencanaanKeong->opd->nama . '</li>';
                                if ($row2->realisasiKeong->perencanaanKeong->opdTerkaitKeong) {
                                    foreach ($row2->realisasiKeong->perencanaanKeong->opdTerkaitKeong as $row3) {
                                        $list .= '<p class="p-0 m-0"> -' . $row3->opd->nama . '</p>';
                                    }
                                }
                            }
                        } else {
                            $list .= '<li class="font-weight-bold">' . $row2->realisasiKeong->perencanaanKeong->opd->nama . '</li>';
                            if ($row2->realisasiKeong->perencanaanKeong->opdTerkaitKeong) {
                                foreach ($row2->realisasiKeong->perencanaanKeong->opdTerkaitKeong as $row3) {
                                    $list .= '<p class="p-0 m-0"> -' . $row3->opd->nama . '</p>';
                                }
                            }
                        }
                    }
                    $list .= '</ol>';
                    return $list;
                })

                ->addColumn('tanggal_intervensi', function ($row) use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'Semua') {
                            if (Carbon::parse($row2->realisasiKeong->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li>' . Carbon::parse($row2->realisasiKeong->created_at)->translatedFormat('d F Y') . '</li>';
                            }
                        } else {
                            $list .= '<li>' . Carbon::parse($row2->realisasiKeong->created_at)->translatedFormat('d F Y') . '</li>';
                        }
                    }
                    $list .= '</ol>';
                    return $list;
                })

                ->rawColumns([
                    'list_indikator',
                    'list_opd',
                    'tanggal_intervensi'
                ])
                ->make(true);
        }

        $filterSubIndikator = [];
        $filterOpd = [];

        foreach ($dataHabitatKeong->get() as $item) {
            foreach ($item->listIndikator as $row) {
                $dataSubIndikator = [
                    'id' => $row->realisasiKeong->perencanaanKeong->id,
                    'sub_indikator' => $row->realisasiKeong->perencanaanKeong->sub_indikator,
                    'tahun' => $row->realisasiKeong->perencanaanKeong->created_at->format('Y'),
                    'created_at' => $row->realisasiKeong->perencanaanKeong->created_at
                ];
                $dataOpd = [
                    'id' => $row->realisasiKeong->perencanaanKeong->opd->id,
                    'opd' => $row->realisasiKeong->perencanaanKeong->opd->nama
                ];
                array_push($filterSubIndikator, $dataSubIndikator);
                array_push($filterOpd, $dataOpd);
                if ($row->realisasiKeong->perencanaanKeong->opdTerkaitKeong) {
                    foreach ($row->realisasiKeong->perencanaanKeong->opdTerkaitKeong as $row2) {
                        $dataOpdTerkait = [
                            'id' => $row2->opd->id,
                            'opd' => $row2->opd->nama
                        ];
                        array_push($filterOpd, $dataOpdTerkait);
                    }
                }
            }
        }

        array_multisort(array_column($filterSubIndikator, 'created_at'), SORT_DESC, $filterSubIndikator);

        $filterSubIndikator = $this->unique_multidim_array($filterSubIndikator, 'id');
        $filterOpd = $this->unique_multidim_array($filterOpd, 'id');
        $filterTahun = array_column($this->unique_multidim_array($filterSubIndikator, 'tahun'), 'tahun');

        return view('dashboard.pages.hasilRealisasi.keong.index', ['filterSubIndikator' => $filterSubIndikator, 'filterOpd' => $filterOpd, 'daftarTahun' => $filterTahun, 'tahun' => $tahun]);
    }

    public function export()
    {
        $dataRealisasi = RealisasiKeong::with('lokasiRealisasiKeong', 'perencanaanKeong')
            ->whereHas('perencanaanKeong', function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkaitKeong', function ($q) {
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest()->get();
        // return view('dashboard.pages.intervensi.realisasi.keong.subIndikator.export', ['dataRealisasi' => $dataRealisasi]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new RealisasiKeongExport($dataRealisasi), "Export Data Realisasi Habitat Keong" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportHasilRealisasi(Request $request)
    {
        $tahun_filter = $request->tahun_filter;

        $tahun = '';
        if ($tahun_filter != 'Semua') {
            $tahun = 'Tahun ' . $tahun_filter;
        }

        $habitatKeong = LokasiRealisasiKeong::where('status', 1)
            ->whereHas('realisasiKeong', function ($q) use ($tahun_filter) {
                if ($tahun_filter && $tahun_filter != 'Semua') {
                    $q->whereYear('created_at', $tahun_filter);
                }
            })
            ->groupBy('lokasi_keong_id')
            ->pluck('lokasi_keong_id')
            ->toArray();

        $dataRealisasi = LokasiKeong::with('listIndikator', 'desa')->whereIn('id', $habitatKeong)->get();
        // return view('dashboard.pages.hasilRealisasi.keong.export', ['dataRealisasi' => $dataRealisasi, 'tahun_filter' => $tahun_filter]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new HasilRealisasiKeongExport($dataRealisasi, $tahun_filter), "Export Data Hasil Realisasi Habitat Keong " . $tahun . " - " . $tanggal . " - " . rand(1, 9999) . '.xlsx');
    }
}
