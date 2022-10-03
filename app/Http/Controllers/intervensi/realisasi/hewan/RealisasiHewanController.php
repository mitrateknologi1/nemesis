<?php

namespace App\Http\Controllers\intervensi\realisasi\hewan;


use App\Models\OPD;
use App\Models\Desa;
use App\Models\LokasiHewan;
use Illuminate\Http\Request;
use App\Models\RealisasiHewan;
use Illuminate\Support\Carbon;
use App\Models\OPDTerkaitHewan;
use App\Models\PerencanaanHewan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LokasiRealisasiHewan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RealisasiHewanExport;
use App\Models\DokumenRealisasiHewan;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Exports\HasilRealisasiHewanExport;

class RealisasiHewanController extends Controller
{
    public function dataRealisasi()
    {
        $query = RealisasiHewan::with('perencanaanHewan', 'lokasiRealisasiHewan')
            ->whereHas('perencanaanHewan', function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkaitHewan', function ($q) {
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest();
        return $query;
    }

    public function index(Request $request)
    {
        $realisasiHewan = $this->dataRealisasi();

        if ($request->ajax()) {
            $data = $realisasiHewan
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                        $query->whereYear('created_at', $request->tahun_filter);
                    }

                    if ($request->opd_filter && $request->opd_filter != 'semua') {
                        $query->whereHas('perencanaanHewan', function ($q) use ($request) {
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
                                    $query->doesntHave('realisasiHewan');
                                } else if ($filter == 11) {
                                    $query->where('status', 1);
                                    $query->whereHas('realisasiHewan', function ($q) {
                                        $q->where('status', 1);
                                    });
                                } else {
                                    $query->where('status', $filter);
                                }
                            }
                        }
                    }

                    if ($request->search_filter && $request->search_filter != '') {
                        $query->whereHas('perencanaanHewan', function ($q) use ($request) {
                            $q->where('sub_indikator', 'like', '%' . $request->search_filter . '%');
                        });
                    }
                })->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('sub_indikator', function ($row) {
                    return $row->perencanaanHewan->sub_indikator;
                })

                ->addColumn('opd', function ($row) {
                    if (Auth::user()->role == 'OPD') {
                        if ($row->perencanaanHewan->opd_id == Auth::user()->opd_id) {
                            return $row->perencanaanHewan->opd->nama;
                        } else {
                            return '<span class="badge badge-primary">' . $row->perencanaanHewan->opd->nama . '</span>';
                        }
                    } else {
                        return $row->perencanaanHewan->opd->nama;
                    }
                })

                ->addColumn('penggunaan_anggaran', function ($row) {
                    return $row->perencanaanHewan->nilai_pembiayaan;
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
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            if (Auth::user()->opd_id == $row->perencanaanHewan->opd_id) {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                                $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                            }
                        } else { //admin & pimpinan
                            if (Auth::user()->role == 'Admin') {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                            } else { // pimpinan
                                $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            }
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if ((Auth::user()->role == 'OPD') && (Auth::user()->opd_id == $row->perencanaanHewan->opd_id)) {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
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
            $totalMenungguKonfirmasiRealisasiHewan = RealisasiHewan::with('perencanaanHewan')->whereHas('perencanaanHewan', function ($q) {
                $q->where('opd_id', Auth::user()->opd_id);
            })->where('status', 2)->count();
        } else {
            $totalMenungguKonfirmasiRealisasiHewan = RealisasiHewan::where('status', 0)->count();
        }

        $tahun = $this->dataRealisasi()->select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->pluck('year');

        $opdFilter = [];
        $iter = 1;
        foreach ($this->dataRealisasi()->get() as $item) {
            $data = [
                'id' => $item->perencanaanHewan->opd_id,
                'nama' => $item->perencanaanHewan->opd->nama
            ];
            if ($iter == 1) {
                array_push($opdFilter, $data);
            } else {
                $found_key = array_search($item->perencanaanHewan->opd_id, array_column($opdFilter, 'id'));
                if (!$found_key) {
                    array_push($opdFilter, $data);
                }
            }
            $iter++;
        }

        return view('dashboard.pages.intervensi.realisasi.hewan.subIndikator.index', ['opdFilter' => $opdFilter, 'totalMenungguKonfirmasiRealisasi' => $totalMenungguKonfirmasiRealisasiHewan, 'tahun' => $tahun]);
    }

    public function create()
    {
        if (in_array(Auth::user()->role, ['Admin', 'Pimpinan'])) {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $listPerencanaan = PerencanaanHewan::with('opdTerkaitHewan')->whereDoesntHave('realisasiHewan')->where('opd_id', Auth::user()->opd_id)->where('status', 1)->whereYear('created_at', Carbon::now()->year)->get();

        $data = [
            'desa' => Desa::all(),
            'opd' => OPD::orderBy('nama')->whereNot('id', Auth::user()->opd_id)->get(),
            'listPerencanaan' => $listPerencanaan
        ];

        return view('dashboard.pages.intervensi.realisasi.hewan.subIndikator.create', $data);
    }

    public function show(RealisasiHewan $realisasi_intervensi_hewan)
    {
        $data = [
            'realisasi_intervensi_hewan' => $realisasi_intervensi_hewan,
            'opdTerkait' => json_encode($realisasi_intervensi_hewan->perencanaanHewan->opdTerkaitHewan->pluck('opd_id')->toArray()),
            'opd' => OPD::orderBy('nama')->whereNot('id', $realisasi_intervensi_hewan->opd_id)->get(),
        ];
        return view('dashboard.pages.intervensi.realisasi.hewan.subIndikator.show', $data);
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

        $perencanaanHewan = PerencanaanHewan::find($request->sub_indikator);
        $perencanaanHewan->opdTerkaitHewan()->delete();
        if ($request->opd_terkait) {
            foreach ($request->opd_terkait as $item) {
                $data = [
                    'perencanaan_hewan_id' => $perencanaanHewan->id,
                    'opd_id' => $item,
                ];
                OPDTerkaitHewan::create($data);
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
            'perencanaan_hewan_id' => $perencanaanHewan->id,
            'status' => 0,
        ];

        $insertRealisasi = RealisasiHewan::create($dataRealisasi);

        if ($request->lokasi != null) {
            foreach ($request->lokasi as $lokasi) {
                $dataLokasi = [
                    'realisasi_hewan_id' => $insertRealisasi->id,
                    'lokasi_hewan_id' => $lokasi,
                ];
                $insertLokasi = LokasiRealisasiHewan::create($dataLokasi);
            }
        }

        $no_dokumen = 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $perencanaanHewan->opd->nama . '-' . $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();

                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/hewan',
                    $namaFile
                );

                $dataDokumen = [
                    'realisasi_hewan_id' => $insertRealisasi->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenRealisasiHewan::create($dataDokumen);
                $no_dokumen++;
            }
        }

        return response()->json('kirim');
    }

    public function edit(RealisasiHewan $realisasi_intervensi_hewan)
    {
        if (Auth::user()->role == 'Admin') {
            if (in_array($realisasi_intervensi_hewan->status, [0, 2])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else if (Auth::user()->role == 'OPD') {
            if (Auth::user()->opd_id != $realisasi_intervensi_hewan->perencanaanHewan->opd_id) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
            if (in_array($realisasi_intervensi_hewan->status, [1])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $listPerencanaan = PerencanaanHewan::with('opdTerkaitHewan')
            ->where(function ($q) use ($realisasi_intervensi_hewan) {
                $q->whereDoesntHave('realisasiHewan')->where('status', 1)->whereYear('created_at', Carbon::now()->year);
                if (Auth::user()->role == 'OPD') {
                    $q->where('opd_id', Auth::user()->opd_id);
                } else {
                    $q->where('opd_id', $realisasi_intervensi_hewan->perencanaanhewan->opd_id);
                }
            })
            ->orWhere(function ($q) use ($realisasi_intervensi_hewan) {
                $q->where('id', $realisasi_intervensi_hewan->perencanaanHewan->id);
            })
            ->get();

        $data = [
            'realisasiIntervensiHewan' => $realisasi_intervensi_hewan,
            'listPerencanaan' => $listPerencanaan,
            'opd' => OPD::orderBy('nama')->whereNot('id', $realisasi_intervensi_hewan->perencanaanHewan->opd_id)->get(),
            'desa' => Desa::all(),
            'lokasiRealisasiHewan' => json_encode($realisasi_intervensi_hewan->lokasiRealisasiHewan->where('realisasi_hewan_id', $realisasi_intervensi_hewan->id)->pluck('lokasi_hewan_id')->toArray()),
            'opdTerkaitHewan' => json_encode($realisasi_intervensi_hewan->perencanaanHewan->opdTerkaitHewan->pluck('opd_id')->toArray()),
        ];

        return view('dashboard.pages.intervensi.realisasi.hewan.subIndikator.edit', $data);
    }

    public function update(Request $request, RealisasiHewan $realisasi_intervensi_hewan)
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
        $perencanaanHewan = PerencanaanHewan::find($perencanaan_id);
        $perencanaanHewan->opdTerkaitHewan()->delete();
        if ($request->opd_terkait) {
            foreach ($request->opd_terkait as $item) {
                $data = [
                    'perencanaan_hewan_id' => $perencanaanHewan->id,
                    'opd_id' => $item,
                ];
                OPDTerkaitHewan::create($data);
            }
        }

        // update lokasi perencanaan
        if ($request->lokasi != null) {
            $realisasi_intervensi_hewan->lokasiRealisasiHewan()->delete();
            foreach ($request->lokasi as $lokasi) {
                $dataLokasi = [
                    'realisasi_hewan_id' => $realisasi_intervensi_hewan->id,
                    'lokasi_hewan_id' => $lokasi,
                ];
                if (Auth::user()->role == 'Admin') {
                    $dataLokasi['status'] = $realisasi_intervensi_hewan->status;
                }
                $insertLokasi = LokasiRealisasiHewan::create($dataLokasi);
            }
        }

        // Hapus dokumen lama
        if ($request->deleteDocumentOld != null) {
            $deleteDocumentOld = explode(',', $request->deleteDocumentOld);
            foreach ($deleteDocumentOld as $item) {
                $namaFile = DokumenRealisasiHewan::where('id', $item)->first()->file;
                if (Storage::exists('uploads/dokumen/realisasi/hewan/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/hewan/' . $namaFile);
                }
                DokumenRealisasiHewan::where('id', $item)->delete();
            }
        }

        // update deskripsi/title dokumen lama
        if ($request->nama_dokumen_old) {
            foreach ($request->nama_dokumen_old as $key => $value) {
                $idUpdateNama = $realisasi_intervensi_hewan->dokumenRealisasiHewan[$key]->id;
                $dataDokumen = DokumenRealisasiHewan::find($idUpdateNama);

                $dataDokumen->update([
                    'nama' => $request->nama_dokumen_old[$key],
                ]);
            }
        }

        //  update file dokumen lama
        if ($request->file_dokumen_old) {
            foreach ($request->file_dokumen_old as $key => $value) {
                $idUpdateDokumen = $realisasi_intervensi_hewan->dokumenRealisasiHewan[$key]->id;
                $dataDokumen = DokumenRealisasiHewan::find($idUpdateDokumen);
                if (Storage::exists('uploads/dokumen/realisasi/hewan/' . $dataDokumen->file)) {
                    Storage::delete('uploads/dokumen/realisasi/hewan/' . $dataDokumen->file);
                }

                $namaFile = mt_rand() . '-' . $request->nama_dokumen_old[$key] . '-' . $realisasi_intervensi_hewan->perencanaanHewan->opd->nama  . '-' .  $dataDokumen->no_urut . '.' . $value->getClientOriginalExtension();
                $value->storeAs('uploads/dokumen/realisasi/hewan/', $namaFile);

                $update = [
                    'nama' => $request->nama_dokumen_old[$key],
                    'file' => $namaFile,
                ];

                $dataDokumen->update($update);
            }
        }

        // update dokumen baru
        $no_dokumen = $realisasi_intervensi_hewan->dokumenRealisasiHewan->max('no_urut') + 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $realisasi_intervensi_hewan->perencanaanHewan->opd->nama . '-' .  $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();
                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/hewan/',
                    $namaFile
                );

                $dataDokumen = [
                    'realisasi_hewan_id' => $realisasi_intervensi_hewan->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenRealisasiHewan::create($dataDokumen);
                $no_dokumen++;
            }
        }

        $dataRealisasi = [];

        $dataRealisasi['perencanaan_hewan_id'] = $perencanaan_id;
        if (Auth::user()->role == 'OPD') {
            $dataRealisasi['status'] = 0;
            $dataRealisasi['alasan_ditolak'] = '-';
        }
        $realisasi_intervensi_hewan->update($dataRealisasi);

        return response()->json('perbarui');
    }

    public function map(RealisasiHewan $realisasi_intervensi_hewan)
    {
        $getLokasiHewan = $realisasi_intervensi_hewan->lokasiRealisasiHewan->pluck('lokasi_hewan_id')->toArray();
        $lokasiHewan = LokasiHewan::with(['desa', 'pemilikLokasiHewan', 'pemilikLokasiHewan.penduduk'])->whereIn('id', $getLokasiHewan)->get();
        return response()->json(['status' => 'success', 'data' => $lokasiHewan]);
    }

    public function konfirmasi(RealisasiHewan $realisasi_intervensi_hewan, Request $request)
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

        $realisasi_intervensi_hewan->update($data);

        // update lokasi perencanaan
        foreach ($realisasi_intervensi_hewan->lokasiRealisasiHewan as $item) {
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

    public function destroy(RealisasiHewan $realisasi_intervensi_hewan)
    {
        if ($realisasi_intervensi_hewan->dokumenRealisasiHewan) {
            foreach ($realisasi_intervensi_hewan->dokumenRealisasiHewan as $item) {
                $namaFile = $item->file;
                if (Storage::exists('uploads/dokumen/realisasi/hewan/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/hewan/' . $namaFile);
                }
            }
            $realisasi_intervensi_hewan->dokumenRealisasiHewan()->delete();
        }

        $realisasi_intervensi_hewan->lokasiRealisasiHewan()->delete();
        $realisasi_intervensi_hewan->delete();

        return response()->json(['success' => 'Berhasil menghapus laporan']);
    }

    public function hasilRealisasi(Request $request)
    {
        $habitatHewan = LokasiRealisasiHewan::where('status', 1)
            ->groupBy('lokasi_hewan_id')
            ->pluck('lokasi_hewan_id')
            ->toArray();

        $dataHabitatHewan = LokasiHewan::with('listIndikator', 'desa')->whereIn('id', $habitatHewan);

        if ($request->ajax()) {
            $data = $dataHabitatHewan
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->opd_filter && $request->opd_filter != 'semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('realisasiHewan', function ($query3) use ($request) {
                                $query3->whereHas('perencanaanHewan', function ($query4) use ($request) {
                                    $query4->where(function ($query5) use ($request) {
                                        $query5->where('opd_id', $request->opd_filter);
                                        $query5->orWhereHas('opdTerkaitHewan', function ($query6) use ($request) {
                                            $query6->where('opd_id', $request->opd_filter);
                                        });
                                    });
                                });
                                if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                                    $query3->whereYear('created_at', $request->tahun_filter);
                                }
                            });
                        });
                    }

                    if ($request->indikator_filter && $request->indikator_filter != 'semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('realisasiHewan', function ($query3) use ($request) {
                                $query3->whereHas('perencanaanHewan', function ($query4) use ($request) {
                                    $query4->where('id', $request->indikator_filter);
                                });
                                if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                                    $query3->whereYear('created_at', $request->tahun_filter);
                                }
                            });
                        });
                    }

                    if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('realisasiHewan', function ($query3) use ($request) {
                                $query3->whereYear('created_at', $request->tahun_filter);
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
                        if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                            if (Carbon::parse($row2->realisasiHewan->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li>' . $row2->realisasiHewan->perencanaanHewan->sub_indikator . '</li>';
                            }
                        } else {
                            $list .= '<li>' . $row2->realisasiHewan->perencanaanHewan->sub_indikator . '</li>';
                        }
                    }
                    $list .= '</ol>';
                    return $list;
                })

                ->addColumn('list_opd', function ($row) use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                            if (Carbon::parse($row2->realisasiHewan->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li class="font-weight-bold">' . $row2->realisasiHewan->perencanaanHewan->opd->nama . '</li>';
                                if ($row2->realisasiHewan->perencanaanHewan->opdTerkaitHewan) {
                                    foreach ($row2->realisasiHewan->perencanaanHewan->opdTerkaitHewan as $row3) {
                                        $list .= '<p class="p-0 m-0"> -' . $row3->opd->nama . '</p>';
                                    }
                                }
                            }
                        } else {
                            $list .= '<li class="font-weight-bold">' . $row2->realisasiHewan->perencanaanHewan->opd->nama . '</li>';
                            if ($row2->realisasiHewan->perencanaanHewan->opdTerkaitHewan) {
                                foreach ($row2->realisasiHewan->perencanaanHewan->opdTerkaitHewan as $row3) {
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
                        if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                            if (Carbon::parse($row2->realisasiHewan->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li>' . Carbon::parse($row2->realisasiHewan->created_at)->translatedFormat('d F Y') . '</li>';
                            }
                        } else {
                            $list .= '<li>' . Carbon::parse($row2->realisasiHewan->created_at)->translatedFormat('d F Y') . '</li>';
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

        foreach ($dataHabitatHewan->get() as $item) {
            foreach ($item->listIndikator as $row) {
                $dataSubIndikator = [
                    'id' => $row->realisasiHewan->perencanaanHewan->id,
                    'sub_indikator' => $row->realisasiHewan->perencanaanHewan->sub_indikator,
                    'tahun' => $row->realisasiHewan->perencanaanHewan->created_at->format('Y'),
                    'created_at' => $row->realisasiHewan->perencanaanHewan->created_at
                ];
                $dataOpd = [
                    'id' => $row->realisasiHewan->perencanaanHewan->opd->id,
                    'opd' => $row->realisasiHewan->perencanaanHewan->opd->nama
                ];
                array_push($filterSubIndikator, $dataSubIndikator);
                array_push($filterOpd, $dataOpd);
                if ($row->realisasiHewan->perencanaanHewan->opdTerkaitHewan) {
                    foreach ($row->realisasiHewan->perencanaanHewan->opdTerkaitHewan as $row2) {
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
        $filterTahun = $this->unique_multidim_array($filterSubIndikator, 'tahun');

        return view('dashboard.pages.hasilRealisasi.hewan.index', ['filterSubIndikator' => $filterSubIndikator, 'filterOpd' => $filterOpd, 'filterTahun' => $filterTahun]);
    }

    public function export()
    {
        $dataRealisasi = RealisasiHewan::with('lokasiRealisasiHewan', 'perencanaanHewan')
            ->whereHas('perencanaanHewan', function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkaitHewan', function ($q) {
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest()->get();
        // return view('dashboard.pages.intervensi.realisasi.hewan.subIndikator.export', ['dataRealisasi' => $dataRealisasi]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new RealisasiHewanExport($dataRealisasi), "Export Data Realisasi Lokasi Hewan Ternak" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportHasilRealisasi()
    {
        $habitatHewan = LokasiRealisasiHewan::where('status', 1)
            ->groupBy('lokasi_hewan_id')
            ->pluck('lokasi_hewan_id')
            ->toArray();

        $dataRealisasi = LokasiHewan::with('listIndikator', 'desa')->whereIn('id', $habitatHewan)->get();
        // return view('dashboard.pages.hasilRealisasi.hewan.export', ['dataRealisasi' => $dataRealisasi]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new HasilRealisasiHewanExport($dataRealisasi), "Export Data Hasil Realisasi Lokasi Hewan Ternak" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
