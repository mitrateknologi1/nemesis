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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DokumenRealisasiHewan;
use App\Models\LokasiPerencanaanHewan;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class RealisasiHewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PerencanaanHewan::with('opd', 'lokasiPerencanaanHewan', 'realisasiHewan')
                ->where('status', 1)
                ->where(function ($query) {
                    if (Auth::user()->role == 'OPD') {
                        $query->where('opd_id', Auth::user()->opd_id);
                        $query->orWhereHas('opdTerkaitHewan', function ($q) {
                            $q->where('status', 1);
                            $q->where('opd_id', Auth::user()->opd_id);
                        });
                    }
                })
                ->latest();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('status', function ($row) {
                })

                ->addColumn('progress', function ($row) {
                    if ($row->realisasiHewan->where('status', 1)->count() > 0) {
                        return $row->realisasiHewan->where('status', 1)->max('progress') . ' %';
                    } else {
                        return '0 %';
                    }
                })

                ->addColumn('status', function ($row) {
                    $status = '<div>';
                    if ($row->realisasiHewan->where('status', 1)->max('progress') == 100) {
                        $status .=  '<span class="badge badge-success">' . $row->realisasiHewan->where('status', 1)->count() . ' Laporan Selesai</span>';
                    } else {
                        if ($row->realisasiHewan->where('status', 0)->count() > 0) {
                            $status .= '<span class="badge badge-warning my-1 mx-1">Menunggu Konfirmasi : <span class="font-weight-bold">' . $row->realisasiHewan->where('status', 0)->count() . '</span></span>';
                        }
                        if ($row->realisasiHewan->where('status', 1)->count() > 0) {
                            $status .= '<span class="badge badge-success my-1 mx-1">Laporan Disetujui : <span class="font-weight-bold">' . $row->realisasiHewan->where('status', 1)->count() . '</span></span>';
                        }
                        if ($row->realisasiHewan->where('status', 2)->count() > 0) {
                            $status .= '<span class="badge badge-danger my-1 mx-1">Laporan Ditolak : <span class="font-weight-bold">' . $row->realisasiHewan->where('status', 2)->count() . '</span></span>';
                        }

                        if ($row->realisasiHewan->count() == 0) {
                            $status .= '<span class="badge badge-dark">Belum Ada Laporan</span>';
                        }
                    }
                    $status .= '</div>';
                    return $status;
                })

                ->addColumn('opd', function ($row) {
                    if (Auth::user()->role == 'OPD') {
                        if ($row->opd_id == Auth::user()->opd_id) {
                            return $row->opd->nama;
                        } else {
                            return '<span class="badge badge-primary">' . $row->opd->nama . '</span>';
                        }
                    } else if (Auth::user()->role == 'Admin') {
                        return $row->opd->nama;
                    }
                })

                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="text-center justify-content-center text-white my-1">';
                    $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'status',
                    'progress',
                    'opd',
                    'action',
                    'lokasi_hewan',
                ])
                ->make(true);
        }
        return view('dashboard.pages.intervensi.realisasi.hewan.subIndikator.index');
    }


    public function tabelLaporan(Request $request)
    {
        if ($request->ajax()) {
            $data = RealisasiHewan::with('perencanaanHewan')->where('perencanaan_hewan_id', $request->id_perencanaan)
                ->where(function ($query) {
                    if (Auth::user()->role == 'OPD') {
                        $query->whereHas('perencanaanHewan', function ($q) {
                            $q->where('opd_id', Auth::user()->opd_id);
                        });
                        $query->orWhere(function ($q) { // OPD Terkait hanya bisa melihat yang telah di setujui
                            $q->whereHas('perencanaanHewan', function ($q2) {
                                $q2->whereHas('opdTerkaitHewan', function ($q3) {
                                    $q3->where('opd_id', Auth::user()->opd_id);
                                });
                            });
                            $q->where('status', 1);
                        });
                    }
                })
                ->latest();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('jumlah_lokasi', function ($row) {
                    return $row->lokasiRealisasiHewan->count();
                })

                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        return '<span class="badge badge-pill badge-warning">Menunggu Konfirmasi</span>';
                    } else if ($row->status == 1) {
                        return '<span class="badge badge-pill badge-success">Disetujui</span>';
                    } else {
                        return '<span class="badge badge-pill badge-danger">Ditolak</span>';
                    }
                })

                ->addColumn('progress', function ($row) {
                    return $row->progress . ' %';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="text-center justify-content-center text-white my-1">';
                    if ($row->status == 0) {
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . url('realisasi-intervensi-hewan/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        } else { //admin
                            $actionBtn .= '<a href="' . url('realisasi-intervensi-hewan/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . url('realisasi-intervensi-hewan/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . url('realisasi-intervensi-hewan/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-hewan.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    }
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'status',
                    'action',
                ])
                ->make(true);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createPelaporan(PerencanaanHewan $realisasi_intervensi_hewan)
    {
        $rencana_intervensi_hewan = $realisasi_intervensi_hewan;
        if (Auth::user()->role == 'Admin' || Auth::user()->opd_id != $rencana_intervensi_hewan->opd_id) {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $countStatusSelainDisetujui = RealisasiHewan::where('perencanaan_hewan_id', $realisasi_intervensi_hewan->id)
            ->whereIn('status', [0, 2])
            ->count();

        if (Auth::user()->role == 'OPD') {
            if ($countStatusSelainDisetujui > 0) {
                abort('403', 'Maaf, anda tidak dapat menambahkan laporan apabila terdapat laporan yang berstatus "Menunggu Dikonfirmasi" / "Ditolak". Untuk Data "Ditolak", silahkan klik tombol "Ubah" pada laporan yang berstatus "Ditolak" dan Perbarui datanya. Kemudian untuk data "Menunggu Konfirmasi", silahkan hubungi Admin untuk diproses konfirmasi.');
            }
            if ($rencana_intervensi_hewan->created_at->year != Carbon::now()->year) {
                abort('403', 'Maaf, anda sudah tidak dapat membuat laporan pada sub indikator ini karena sudah berganti tahun.');
            }
        }

        if ($rencana_intervensi_hewan->realisasiHewan->where('progress', 100)->count() > 0) {
            abort('403', 'Maaf, anda sudah tidak dapat membuat laporan pada sub indikator ini karena sudah mencapai progress 100%.');
        }

        $getLokasiHewanBelumTerealisasi = $rencana_intervensi_hewan->lokasiPerencanaanHewan->whereNull('realisasi_hewan_id')->pluck('lokasi_hewan_id')->toArray();
        $lokasiHewan = LokasiHewan::with('desa')->whereIn('id', $getLokasiHewanBelumTerealisasi)->get();

        $data = [
            'rencanaIntervensiHewan' => $rencana_intervensi_hewan,
            'desa' => Desa::all(),
            'lokasiPerencanaanHewan' => json_encode($rencana_intervensi_hewan->lokasiPerencanaanHewan->pluck('lokasi_hewan_id')->toArray()),
            'lokasiPerencanaanHewanArr' => $rencana_intervensi_hewan->lokasiPerencanaanHewan->whereNull('realisasi_hewan_id')->pluck('lokasi_hewan_id')->toArray(),
            'opdTerkaitHewan' => json_encode($rencana_intervensi_hewan->opdTerkaitHewan->pluck('opd_id')->toArray()),
            'dataMap' => $lokasiHewan,
        ];

        return view('dashboard.pages.intervensi.realisasi.hewan.pelaporan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'lokasi' => 'required',
                'penggunaan_anggaran' => 'required',
            ],
            [
                'lokasi.required' => 'Lokasi harus dipilih',
                'penggunaan_anggaran.required' => 'Nilai Pembiayaan harus diisi',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
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

        $bulanSekarang = Carbon::now()->month;

        if (($bulanSekarang >= 1 && $bulanSekarang <= 3)) {
            $tw = 1;
        } else if (($bulanSekarang >= 4 && $bulanSekarang <= 6)) {
            $tw = 2;
        } else if (($bulanSekarang >= 7 && $bulanSekarang <= 9)) {
            $tw = 3;
        } else {
            $tw = 4;
        }

        $countTotalLokasiPerencanaan = LokasiPerencanaanHewan::where('perencanaan_hewan_id', $request->id_perencanaan)->count();
        $countLokasiTerealisasi = LokasiPerencanaanHewan::where('perencanaan_hewan_id', $request->id_perencanaan)->whereNotNull('realisasi_hewan_id')->count();
        $countLokasiDipilih = count($request->lokasi);
        $countPencapaian = ((100 / $countTotalLokasiPerencanaan) * ($countLokasiTerealisasi + $countLokasiDipilih));

        $dataRealisasi = [
            'perencanaan_hewan_id' => $request->id_perencanaan,
            'penggunaan_anggaran' => $request->penggunaan_anggaran,
            'tw' => $tw,
            'progress' => round($countPencapaian, 2),
            'status' => 0,
        ];

        $insertRealisasi = RealisasiHewan::create($dataRealisasi);

        $updateLokasiPerencanaan = LokasiPerencanaanHewan::whereIn('lokasi_hewan_id', $request->lokasi)->where('perencanaan_hewan_id', $request->id_perencanaan)->get();

        // update realisasi_hewan_id
        foreach ($updateLokasiPerencanaan as $item) {
            $item->realisasi_hewan_id = $insertRealisasi->id;
            $item->save();
        }

        $no_dokumen = 1;
        $perencanaanHewan = PerencanaanHewan::find($request->id_perencanaan);
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $perencanaanHewan->sub_indikator . '-' . $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealisasiHewan  $realisasiHewan
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanHewan $realisasi_intervensi_hewan)
    {
        $rencana_intervensi_hewan = $realisasi_intervensi_hewan;
        $data = [
            'rencana_intervensi_hewan' => $rencana_intervensi_hewan,
            'tw1' => $rencana_intervensi_hewan->realisasiHewan->where('tw', 1)->where('status', 1)->max('progress'),
            'tw2' => $rencana_intervensi_hewan->realisasiHewan->where('tw', 2)->where('status', 1)->max('progress'),
            'tw3' => $rencana_intervensi_hewan->realisasiHewan->where('tw', 3)->where('status', 1)->max('progress'),
            'tw4' => $rencana_intervensi_hewan->realisasiHewan->where('tw', 4)->where('status', 1)->max('progress'),
            'opdTerkait' => json_encode($rencana_intervensi_hewan->opdTerkaitHewan->pluck('opd_id')->toArray()),
            'opd' => OPD::orderBy('nama')->whereNot('id', $rencana_intervensi_hewan->opd_id)->get(),
        ];
        return view('dashboard.pages.intervensi.realisasi.hewan.subIndikator.show', $data);
    }

    public function showLaporan(RealisasiHewan $realisasi_intervensi_hewan)
    {
        $getLokasiHewanTerealisasi = $realisasi_intervensi_hewan->lokasiRealisasiHewan->pluck('lokasi_hewan_id')->toArray();
        $lokasiHewan = LokasiHewan::with('desa')->whereIn('id', $getLokasiHewanTerealisasi)->get();
        $data = [
            'rencana_intervensi_hewan' => $realisasi_intervensi_hewan->perencanaanHewan,
            'realisasi_intervensi_hewan' => $realisasi_intervensi_hewan,
            'dataMap' => $lokasiHewan,

        ];
        return view('dashboard.pages.intervensi.realisasi.hewan.pelaporan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RealisasiHewan  $realisasiHewan
     * @return \Illuminate\Http\Response
     */
    public function edit(RealisasiHewan $realisasi_intervensi_hewan)
    {
        if (Auth::user()->role == 'Admin') {
            if (in_array($realisasi_intervensi_hewan->status, [0, 2])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else if (Auth::user()->role == 'OPD') {
            if (in_array($realisasi_intervensi_hewan->status, [1])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $lokasiPerencanaanHewanArr = LokasiPerencanaanHewan::where('perencanaan_hewan_id', $realisasi_intervensi_hewan->perencanaan_hewan_id)
            ->where(function ($query) use ($realisasi_intervensi_hewan) {
                $query->where('realisasi_hewan_id', $realisasi_intervensi_hewan->id);
                $query->orWhereNull('realisasi_hewan_id');
            })->pluck('lokasi_hewan_id')->toArray();

        $getLokasiHewanBelumTerealisasi = $realisasi_intervensi_hewan->perencanaanHewan->lokasiPerencanaanHewan->whereNull('realisasi_hewan_id')->pluck('lokasi_hewan_id')->toArray();
        $lokasiHewan = LokasiHewan::with('desa')->whereIn('id', $getLokasiHewanBelumTerealisasi)->get();

        $data = [
            'realisasiIntervensiHewan' => $realisasi_intervensi_hewan,
            'rencanaIntervensiHewan' => $realisasi_intervensi_hewan->perencanaanHewan,
            'desa' => Desa::all(),
            'lokasiPerencanaanHewan' => json_encode($realisasi_intervensi_hewan->perencanaanHewan->lokasiPerencanaanHewan->where('realisasi_hewan_id', $realisasi_intervensi_hewan->id)->pluck('lokasi_hewan_id')->toArray()),
            'lokasiPerencanaanHewanArr' => $lokasiPerencanaanHewanArr,
            'opdTerkaitHewan' => json_encode($realisasi_intervensi_hewan->perencanaanHewan->opdTerkaitHewan->pluck('opd_id')->toArray()),
            'opd' => OPD::orderBy('nama')->whereNot('id', Auth::user()->opd_id)->get(),
            'dataMap' => $lokasiHewan,
        ];

        return view('dashboard.pages.intervensi.realisasi.hewan.pelaporan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RealisasiHewan  $realisasiHewan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealisasiHewan $realisasi_intervensi_hewan)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'lokasi' => $realisasi_intervensi_hewan->status != 1 ? 'required' : '',
                'penggunaan_anggaran' => 'required',
            ],
            [
                'lokasi.required' => 'Lokasi harus dipilih',
                'penggunaan_anggaran.required' => 'Nilai Pembiayaan harus diisi',
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

        // update lokasi perencanaan
        if ($realisasi_intervensi_hewan->status != 1) {
            foreach ($realisasi_intervensi_hewan->lokasiRealisasiHewan as $item) {
                $item->realisasi_hewan_id = NULL;
                $item->status = 0;
                $item->save();
            }

            $updateLokasiPerencanaan = LokasiPerencanaanHewan::whereIn('lokasi_hewan_id', $request->lokasi)->where('perencanaan_hewan_id', $request->id_perencanaan)->get();

            foreach ($updateLokasiPerencanaan as $item) {
                $item->realisasi_hewan_id = $realisasi_intervensi_hewan->id;
                $item->save();
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

                $namaFile = mt_rand() . '-' . $request->nama_dokumen_old[$key] . '-' . $realisasi_intervensi_hewan->perencanaanHewan->sub_indikator . '-' .  $dataDokumen->no_urut . '.' . $value->getClientOriginalExtension();
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
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $realisasi_intervensi_hewan->perencanaanHewan->sub_indikator . '-' .  $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();
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

        // update data laporan
        $countTotalLokasiPerencanaan = LokasiPerencanaanHewan::where('perencanaan_hewan_id', $request->id_perencanaan)->count();
        $countLokasiTerealisasi = LokasiPerencanaanHewan::where('perencanaan_hewan_id', $request->id_perencanaan)->whereNotNull('realisasi_hewan_id')->count();
        // $countLokasiDipilih = count($request->lokasi);
        $countPencapaian = ((100 / $countTotalLokasiPerencanaan) * $countLokasiTerealisasi);

        $dataRealisasi = [
            'penggunaan_anggaran' => $request->penggunaan_anggaran,
        ];

        if ($realisasi_intervensi_hewan->status != 1) {
            $dataRealisasi['progress'] = round($countPencapaian, 2);
        }

        if (Auth::user()->role == 'OPD') {
            $dataRealisasi['status'] = 0;
            $dataRealisasi['alasan_ditolak'] = '-';
        }
        $realisasi_intervensi_hewan->update($dataRealisasi);

        return response()->json('perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealisasiHewan  $realisasiHewan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealisasiHewan $realisasiHewan)
    {
        //
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

    public function updateOPD(PerencanaanHewan $realisasi_intervensi_hewan, Request $request)
    {
        $rencana_intervensi_hewan = $realisasi_intervensi_hewan;
        $rencana_intervensi_hewan->opdTerkaitHewan()->delete();

        foreach ($request->opd_terkait as $item) {
            $data = [
                'perencanaan_hewan_id' => $rencana_intervensi_hewan->id,
                'opd_id' => $item,
            ];
            OPDTerkaitHewan::create($data);
        }
        return $realisasi_intervensi_hewan;
    }

    public function deleteOPD(OPDTerkaitHewan $realisasi_intervensi_hewan)
    {
        $realisasi_intervensi_hewan->delete();
        return response()->json(['success' => 'Berhasil menghapus OPD terkait']);
    }

    public function deleteLaporan(RealisasiHewan $realisasi_intervensi_hewan)
    {
        if ($realisasi_intervensi_hewan->lokasiRealisasiHewan) {
            foreach ($realisasi_intervensi_hewan->lokasiRealisasiHewan as $item) {
                $data = [
                    'status' => 0,
                    'realisasi_hewan_id' => NULL,
                ];
                $item->update($data);
            }
        }

        if ($realisasi_intervensi_hewan->dokumenRealisasiHewan) {
            foreach ($realisasi_intervensi_hewan->dokumenRealisasiHewan as $item) {
                $namaFile = $item->file;
                if (Storage::exists('uploads/dokumen/realisasi/hewan/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/realisasi/hewan/' . $namaFile);
                }
            }
            $realisasi_intervensi_hewan->dokumenRealisasiHewan()->delete();
        }

        $realisasi_intervensi_hewan->delete();
        return response()->json(['success' => 'Berhasil menghapus laporan']);
    }

    public function deleteSemuaLaporan(PerencanaanHewan $realisasi_intervensi_hewan)
    {
        $rencana_intervensi_hewan = $realisasi_intervensi_hewan;

        if ($rencana_intervensi_hewan->realisasiHewan) {
            foreach ($rencana_intervensi_hewan->realisasiHewan as $item) {
                foreach ($item->lokasiRealisasiHewan as $item2) {
                    $data = [
                        'status' => 0,
                        'realisasi_hewan_id' => NULL,
                    ];
                    $item2->update($data);
                }
                foreach ($item->dokumenRealisasiHewan as $item3) {
                    $namaFile = $item3->file;
                    if (Storage::exists('uploads/dokumen/realisasi/hewan/' . $namaFile)) {
                        Storage::delete('uploads/dokumen/realisasi/hewan/' . $namaFile);
                    }
                }
                $item->dokumenRealisasiHewan()->delete();
            }

            $rencana_intervensi_hewan->realisasiHewan()->delete();
        }
        return response()->json(['success' => 'Berhasil menghapus laporan']);
    }
}
