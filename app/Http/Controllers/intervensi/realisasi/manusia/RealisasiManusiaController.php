<?php

namespace App\Http\Controllers\intervensi\realisasi\manusia;

use App\Models\OPD;
use App\Models\Desa;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RealisasiManusia;
use App\Models\OPDTerkaitManusia;
use App\Models\PerencanaanManusia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RealisasiManusiaExport;
use App\Models\DokumenRealisasiManusia;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\PendudukRealisasiManusia;
use App\Exports\HasilRealisasiManusiaExport;
use App\Http\Requests\StoreRealisasiManusiaRequest;

class RealisasiManusiaController extends Controller
{
    public function dataRealisasi()
    {
        $query = RealisasiManusia::with('perencanaanManusia', 'pendudukRealisasiManusia')
            ->whereHas('perencanaanManusia', function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkaitManusia', function ($q) {
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest();
        return $query;
    }

    public function index(Request $request)
    {
        $realisasiManusia = $this->dataRealisasi();

        if ($request->ajax()) {
            $data = $realisasiManusia
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                        $query->whereYear('created_at', $request->tahun_filter);
                    }

                    if ($request->opd_filter && $request->opd_filter != 'semua') {
                        $query->whereHas('perencanaanManusia', function ($q) use ($request) {
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
                                    $query->doesntHave('realisasiManusia');
                                } else if ($filter == 11) {
                                    $query->where('status', 1);
                                    $query->whereHas('realisasiManusia', function ($q) {
                                        $q->where('status', 1);
                                    });
                                } else {
                                    $query->where('status', $filter);
                                }
                            }
                        }
                    }

                    if ($request->search_filter) {
                        $query->where(function ($query2) use ($request) {
                            $query2->where('sub_indikator', 'like', '%' . $request->search_filter . '%');
                        });
                    }
                });

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('sub_indikator', function ($row) {
                    return $row->perencanaanManusia->sub_indikator;
                })

                ->addColumn('opd', function ($row) {
                    if (Auth::user()->role == 'OPD') {
                        if ($row->perencanaanManusia->opd_id == Auth::user()->opd_id) {
                            return $row->perencanaanManusia->opd->nama;
                        } else {
                            return '<span class="badge badge-primary">' . $row->perencanaanManusia->opd->nama . '</span>';
                        }
                    } else {
                        return $row->perencanaanManusia->opd->nama;
                    }
                })

                ->addColumn('penggunaan_anggaran', function ($row) {
                    return $row->perencanaanManusia->nilai_pembiayaan;
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
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            if (Auth::user()->opd_id == $row->perencanaanManusia->opd_id) {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                                $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                            }
                        } else { //admin & pimpinan
                            if (Auth::user()->role == 'Admin') {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                            } else {
                                $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            }
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if ((Auth::user()->role == 'OPD') && (Auth::user()->opd_id == $row->perencanaanManusia->opd_id)) {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
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
            $totalMenungguKonfirmasiRealisasiManusia = RealisasiManusia::with('perencanaanManusia')->whereHas('perencanaanManusia', function ($q) {
                $q->where('opd_id', Auth::user()->opd_id);
            })->where('status', 2)->count();
        } else {
            $totalMenungguKonfirmasiRealisasiManusia = RealisasiManusia::where('status', 0)->count();
        }

        $tahun = $this->dataRealisasi()->select(DB::raw('YEAR(created_at) year'))
            ->groupBy('year')
            ->pluck('year');

        $opdFilter = [];
        $iter = 1;
        foreach ($this->dataRealisasi()->get() as $item) {
            $data = [
                'id' => $item->perencanaanManusia->opd_id,
                'nama' => $item->perencanaanManusia->opd->nama
            ];
            if ($iter == 1) {
                array_push($opdFilter, $data);
            } else {
                $found_key = array_search($item->perencanaanManusia->opd_id, array_column($opdFilter, 'id'));
                if (!$found_key) {
                    array_push($opdFilter, $data);
                }
            }
            $iter++;
        }

        return view('dashboard.pages.intervensi.realisasi.manusia.subIndikator.index', ['opdFilter' => $opdFilter, 'totalMenungguKonfirmasiRealisasi' => $totalMenungguKonfirmasiRealisasiManusia, 'tahun' => $tahun]);
    }

    public function create()
    {
        if (in_array(Auth::user()->role, ['Admin', 'Pimpinan'])) {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $listPerencanaan = PerencanaanManusia::with('opdTerkaitManusia')->whereDoesntHave('realisasiManusia')->where('opd_id', Auth::user()->opd_id)->where('status', 1)->whereYear('created_at', Carbon::now()->year)->get();

        $data = [
            'desa' => Desa::all(),
            'opd' => OPD::orderBy('nama')->whereNot('id', Auth::user()->opd_id)->get(),
            'listPerencanaan' => $listPerencanaan
        ];

        return view('dashboard.pages.intervensi.realisasi.manusia.subIndikator.create', $data);
    }

    public function show(RealisasiManusia $realisasi_intervensi_manusia)
    {
        $data = [
            'realisasi_intervensi_manusia' => $realisasi_intervensi_manusia,
            'dataPendudukRealisasi' => $realisasi_intervensi_manusia->pendudukRealisasiManusia,
            'opdTerkait' => json_encode($realisasi_intervensi_manusia->perencanaanManusia->opdTerkaitManusia->pluck('opd_id')->toArray()),
            'opd' => OPD::orderBy('nama')->whereNot('id', $realisasi_intervensi_manusia->opd_id)->get(),
        ];
        return view('dashboard.pages.intervensi.realisasi.manusia.subIndikator.show', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
                'penduduk' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus dipilih',
                'penduduk.required' => 'Penduduk harus dipilih',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $perencanaanManusia = PerencanaanManusia::find($request->sub_indikator);
        $perencanaanManusia->opdTerkaitManusia()->delete();
        if ($request->opd_terkait) {
            foreach ($request->opd_terkait as $item) {
                $data = [
                    'perencanaan_manusia_id' => $perencanaanManusia->id,
                    'opd_id' => $item,
                ];
                OPDTerkaitManusia::create($data);
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
            'perencanaan_manusia_id' => $perencanaanManusia->id,
            'status' => 0,
        ];

        $insertRealisasi = RealisasiManusia::create($dataRealisasi);

        if ($request->penduduk != null) {
            foreach ($request->penduduk as $penduduk) {
                $dataPenduduk = [
                    'realisasi_manusia_id' => $insertRealisasi->id,
                    'penduduk_id' => $penduduk,
                ];
                $insertPenduduk = PendudukRealisasiManusia::create($dataPenduduk);
            }
        }

        $no_dokumen = 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $perencanaanManusia->opd->nama . '-' . $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();

                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/manusia',
                    $namaFile
                );

                $dataDokumen = [
                    'realisasi_manusia_id' => $insertRealisasi->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenRealisasiManusia::create($dataDokumen);
                $no_dokumen++;
            }
        }

        return response()->json('kirim');
    }

    public function edit(RealisasiManusia $realisasi_intervensi_manusia)
    {
        if (Auth::user()->role == 'Admin') {
            if (in_array($realisasi_intervensi_manusia->status, [0, 2])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else if (Auth::user()->role == 'OPD') {
            if (Auth::user()->opd_id != $realisasi_intervensi_manusia->perencanaanManusia->opd_id) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
            if (in_array($realisasi_intervensi_manusia->status, [1])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $listPerencanaan = PerencanaanManusia::with('opdTerkaitManusia')
            ->where(function ($q) use ($realisasi_intervensi_manusia) {
                $q->whereDoesntHave('realisasiManusia')->where('status', 1)->whereYear('created_at', Carbon::now()->year);
                if (Auth::user()->role == 'OPD') {
                    $q->where('opd_id', Auth::user()->opd_id);
                } else {
                    $q->where('opd_id', $realisasi_intervensi_manusia->perencanaanManusia->opd_id);
                }
            })
            ->orWhere(function ($q) use ($realisasi_intervensi_manusia) {
                $q->where('id', $realisasi_intervensi_manusia->perencanaanManusia->id);
            })
            ->get();

        $data = [
            'realisasiIntervensiManusia' => $realisasi_intervensi_manusia,
            'listPerencanaan' => $listPerencanaan,
            'opd' => OPD::orderBy('nama')->whereNot('id', $realisasi_intervensi_manusia->perencanaanManusia->opd_id)->get(),
            'desa' => Desa::all(),
            'pendudukRealisasiManusia' => json_encode($realisasi_intervensi_manusia->pendudukRealisasiManusia->where('realisasi_manusia_id', $realisasi_intervensi_manusia->id)->pluck('penduduk_id')->toArray()),
            'opdTerkaitManusia' => json_encode($realisasi_intervensi_manusia->perencanaanManusia->opdTerkaitManusia->pluck('opd_id')->toArray()),

        ];

        return view('dashboard.pages.intervensi.realisasi.manusia.subIndikator.edit', $data);
    }

    public function update(Request $request, RealisasiManusia $realisasi_intervensi_manusia)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
                'penduduk' => 'required'
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus dipilih',
                'penduduk.required' => 'Penduduk harus dipilih',
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
        $perencanaanManusia = PerencanaanManusia::find($perencanaan_id);
        $perencanaanManusia->opdTerkaitManusia()->delete();
        if ($request->opd_terkait) {
            foreach ($request->opd_terkait as $item) {
                $data = [
                    'perencanaan_manusia_id' => $perencanaanManusia->id,
                    'opd_id' => $item,
                ];
                OPDTerkaitManusia::create($data);
            }
        }

        // update penduduk realisasi
        if ($request->penduduk != null) {
            $realisasi_intervensi_manusia->pendudukRealisasiManusia()->delete();
            foreach ($request->penduduk as $penduduk) {
                $dataPenduduk = [
                    'realisasi_manusia_id' => $realisasi_intervensi_manusia->id,
                    'penduduk_id' => $penduduk,
                ];
                if (Auth::user()->role == 'Admin') {
                    $dataPenduduk['status'] = $realisasi_intervensi_manusia->status;
                }
                $insertPenduduk = PendudukRealisasiManusia::create($dataPenduduk);
            }
        }

        // Hapus dokumen lama
        if ($request->deleteDocumentOld != null) {
            $deleteDocumentOld = explode(',', $request->deleteDocumentOld);
            foreach ($deleteDocumentOld as $item) {
                $namaFile = DokumenRealisasiManusia::where('id', $item)->first()->file;
                if (Storage::exists('uploads/dokumen/realisasi/manusia/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/manusia/' . $namaFile);
                }
                DokumenRealisasiManusia::where('id', $item)->delete();
            }
        }

        // update deskripsi/title dokumen lama
        if ($request->nama_dokumen_old) {
            foreach ($request->nama_dokumen_old as $key => $value) {
                $idUpdateNama = $realisasi_intervensi_manusia->dokumenRealisasiManusia[$key]->id;
                $dataDokumen = DokumenRealisasiManusia::find($idUpdateNama);

                $dataDokumen->update([
                    'nama' => $request->nama_dokumen_old[$key],
                ]);
            }
        }

        //  update file dokumen lama
        if ($request->file_dokumen_old) {
            foreach ($request->file_dokumen_old as $key => $value) {
                $idUpdateDokumen = $realisasi_intervensi_manusia->dokumenRealisasiManusia[$key]->id;
                $dataDokumen = DokumenRealisasiManusia::find($idUpdateDokumen);
                if (Storage::exists('uploads/dokumen/realisasi/manusia/' . $dataDokumen->file)) {
                    Storage::delete('uploads/dokumen/realisasi/manusia/' . $dataDokumen->file);
                }

                $namaFile = mt_rand() . '-' . $request->nama_dokumen_old[$key] . '-' . $realisasi_intervensi_manusia->perencanaanManusia->opd->nama . '-' .  $dataDokumen->no_urut . '.' . $value->getClientOriginalExtension();
                $value->storeAs('uploads/dokumen/realisasi/manusia/', $namaFile);

                $update = [
                    'nama' => $request->nama_dokumen_old[$key],
                    'file' => $namaFile,
                ];

                $dataDokumen->update($update);
            }
        }

        // update dokumen baru
        $no_dokumen = $realisasi_intervensi_manusia->dokumenRealisasiManusia->max('no_urut') + 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $realisasi_intervensi_manusia->perencanaanManusia->opd->nama . '-' .  $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();
                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/realisasi/manusia/',
                    $namaFile
                );

                $dataDokumen = [
                    'realisasi_manusia_id' => $realisasi_intervensi_manusia->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenRealisasiManusia::create($dataDokumen);
                $no_dokumen++;
            }
        }

        $dataRealisasi = [];

        $dataRealisasi['perencanaan_manusia_id'] = $perencanaan_id;
        if (Auth::user()->role == 'OPD') {
            $dataRealisasi['status'] = 0;
            $dataRealisasi['alasan_ditolak'] = '-';
        }
        $realisasi_intervensi_manusia->update($dataRealisasi);

        return response()->json('perbarui');
    }

    public function konfirmasi(RealisasiManusia $realisasi_intervensi_manusia, Request $request)
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

        $realisasi_intervensi_manusia->update($data);

        // update penduduk perencanaan
        foreach ($realisasi_intervensi_manusia->pendudukRealisasiManusia as $item) {
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

    public function destroy(RealisasiManusia $realisasi_intervensi_manusia)
    {
        if ($realisasi_intervensi_manusia->dokumenRealisasiManusia) {
            foreach ($realisasi_intervensi_manusia->dokumenRealisasiManusia as $doc) {
                if (Storage::exists('uploads/dokumen/realisasi/manusia/' . $doc->file)) {
                    Storage::delete('uploads/dokumen/realisasi/manusia/' . $doc->file);
                }
                DokumenRealisasiManusia::where('id', $realisasi_intervensi_manusia->id)->delete();
            }
            $realisasi_intervensi_manusia->dokumenRealisasiManusia()->delete();
        }

        $realisasi_intervensi_manusia->pendudukRealisasiManusia()->delete();
        $realisasi_intervensi_manusia->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function hasilRealisasi(Request $request)
    {
        $habitatManusia = PendudukRealisasiManusia::where('status', 1)
            ->groupBy('penduduk_id')
            ->pluck('penduduk_id')
            ->toArray();

        $dataPenduduk = Penduduk::with('listIndikator', 'desa')->whereIn('id', $habitatManusia);

        if ($request->ajax()) {
            $data = $dataPenduduk
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->opd_filter && $request->opd_filter != 'semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('perencanaanManusia', function ($query3) use ($request) {
                                $query3->where(function ($query4) use ($request) {
                                    $query4->where('opd_id', $request->opd_filter);
                                    $query4->orWhereHas('opdTerkaitManusia', function ($query5) use ($request) {
                                        $query5->where('opd_id', $request->opd_filter);
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
                            $query2->whereHas('perencanaanManusia', function ($query3) use ($request) {
                                $query3->where('id', $request->indikator_filter);
                                if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                                    $query3->whereYear('created_at', $request->tahun_filter);
                                }
                            });
                        });
                    }

                    if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                        $query->whereHas('listIndikator', function ($query2) use ($request) {
                            $query2->whereHas('perencanaanManusia', function ($query3) use ($request) {
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

                ->addColumn('list_indikator', function ($row)  use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                            if (Carbon::parse($row2->perencanaanManusia->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li>' . $row2->perencanaanManusia->sub_indikator . '</li>';
                            }
                        } else {
                            $list .= '<li>' . $row2->perencanaanManusia->sub_indikator . '</li>';
                        }
                    }
                    $list .= '</ol>';
                    return $list;
                })

                ->addColumn('list_opd', function ($row) use ($request) {
                    $list = '<ol class="mb-0">';
                    foreach ($row->listIndikator as $row2) {
                        if ($request->tahun_filter && $request->tahun_filter != 'semua') {
                            if (Carbon::parse($row2->perencanaanManusia->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li class="font-weight-bold">' . $row2->perencanaanManusia->opd->nama . '</li>';
                                if ($row2->perencanaanManusia->opdTerkaitManusia) {
                                    foreach ($row2->perencanaanManusia->opdTerkaitManusia as $row3) {
                                        $list .= '<p class="p-0 m-0"> -' . $row3->opd->nama . '</p>';
                                    }
                                }
                            }
                        } else {
                            $list .= '<li class="font-weight-bold">' . $row2->perencanaanManusia->opd->nama . '</li>';
                            if ($row2->perencanaanManusia->opdTerkaitManusia) {
                                foreach ($row2->perencanaanManusia->opdTerkaitManusia as $row3) {
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
                            if (Carbon::parse($row2->realisasiManusia->created_at)->format('Y') == $request->tahun_filter) {
                                $list .= '<li>' . Carbon::parse($row2->realisasiManusia->created_at)->translatedFormat('d F Y') . '</li>';
                            }
                        } else {
                            $list .= '<li>' . Carbon::parse($row2->realisasiManusia->created_at)->translatedFormat('d F Y') . '</li>';
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

        foreach ($dataPenduduk->get() as $item) {
            foreach ($item->listIndikator as $row) {
                $dataSubIndikator = [
                    'id' => $row->perencanaanManusia->id,
                    'sub_indikator' => $row->perencanaanManusia->sub_indikator,
                    'tahun' => $row->perencanaanManusia->created_at->format('Y'),
                    'created_at' => $row->perencanaanManusia->created_at
                ];
                $dataOpd = [
                    'id' => $row->perencanaanManusia->opd->id,
                    'opd' => $row->perencanaanManusia->opd->nama
                ];
                array_push($filterSubIndikator, $dataSubIndikator);
                array_push($filterOpd, $dataOpd);
                if ($row->perencanaanManusia->opdTerkaitManusia) {
                    foreach ($row->perencanaanManusia->opdTerkaitManusia as $row2) {
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

        return view('dashboard.pages.hasilRealisasi.manusia.index', ['filterSubIndikator' => $filterSubIndikator, 'filterOpd' => $filterOpd, 'filterTahun' => $filterTahun]);
    }

    public function export()
    {
        $dataRealisasi = RealisasiManusia::with('pendudukRealisasiManusia', 'perencanaanManusia')
            ->whereHas('perencanaanManusia', function ($query) {
                if (Auth::user()->role == 'OPD') {
                    $query->where('opd_id', Auth::user()->opd_id);
                    $query->orWhereHas('opdTerkaitManusia', function ($q) {
                        $q->where('opd_id', Auth::user()->opd_id);
                    });
                }
            })
            ->latest()->get();
        // return view('dashboard.pages.intervensi.realisasi.manusia.subIndikator.export', ['dataRealisasi' => $dataRealisasi]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new RealisasiManusiaExport($dataRealisasi), "Export Data Realisasi Manusia" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }

    public function exportHasilRealisasi()
    {
        $penduduk = PendudukRealisasiManusia::where('status', 1)
            ->groupBy('penduduk_id')
            ->pluck('penduduk_id')
            ->toArray();

        $dataRealisasi = Penduduk::with('listIndikator', 'desa')->whereIn('id', $penduduk)
            ->get();
        // return view('dashboard.pages.hasilRealisasi.manusia.export', ['dataRealisasi' => $dataRealisasi]);

        $tanggal = Carbon::parse(Carbon::now())->translatedFormat('d F Y');

        return Excel::download(new HasilRealisasiManusiaExport($dataRealisasi), "Export Data Hasil Realisasi Manusia" . "-" . $tanggal . "-" . rand(1, 9999) . '.xlsx');
    }
}
