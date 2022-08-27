<?php

namespace App\Http\Controllers\intervensi\perencanaan\hewan;


use App\Models\OPD;
use App\Models\Desa;
use App\Models\LokasiHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\OPDTerkaitHewan;
use App\Models\PerencanaanHewan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DokumenRealisasiHewan;
use App\Models\LokasiPerencanaanHewan;
use App\Models\DokumenPerencanaanHewan;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePerencanaanHewanRequest;
use App\Http\Requests\UpdatePerencanaanHewanRequest;

class PerencanaanHewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PerencanaanHewan::with('opd', 'lokasiPerencanaanHewan')
                ->where(function ($query) {
                    if (Auth::user()->role == 'OPD') {
                        $query->where('opd_id', Auth::user()->opd_id);
                        $query->orWhereHas('opdTerkaitHewan', function ($q) { // OPD Terkait hanya bisa melihat yang telah di setujui
                            $q->where('status', 1);
                            $q->where('opd_id', Auth::user()->opd_id);
                        });
                    }
                })
                ->latest();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        return '<span class="badge fw-bold badge-warning">Menunggu Konfirmasi</span>';
                    } else if ($row->status == 1) {
                        return '<span class="badge fw-bold badge-success">Disetujui</span>';
                    } else if ($row->status == 2) {
                        return '<span class="badge fw-bold badge-danger">Ditolak</span>';
                    }
                })

                ->addColumn('jumlah_lokasi', function ($row) {
                    return $row->lokasiPerencanaanHewan->count();
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
                    if ($row->status == 0) {
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . route('rencana-intervensi-hewan.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            $actionBtn .= '<a href="' . route('rencana-intervensi-hewan.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        } else { //admin
                            $actionBtn .= '<a href="' . route('rencana-intervensi-hewan.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . route('rencana-intervensi-hewan.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('rencana-intervensi-hewan.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . route('rencana-intervensi-hewan.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . route('rencana-intervensi-hewan.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
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
                    'lokasi_hewan',
                ])
                ->make(true);
        }
        return view('dashboard.pages.intervensi.perencanaan.hewan.subIndikator.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'Admin') {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }
        $data = [
            'desa' => Desa::all(),
            'opd' => OPD::orderBy('nama')->whereNot('id', Auth::user()->opd_id)->get(),
        ];
        return view('dashboard.pages.intervensi.perencanaan.hewan.subIndikator.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePerencanaanHewanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
                'lokasi' => 'required',
                'nilai_pembiayaan' => 'required',
                'sumber_dana' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus diisi',
                'lokasi.required' => 'Lokasi harus dipilih',
                'nilai_pembiayaan.required' => 'Nilai Pembiayaan harus diisi',
                'sumber_dana.required' => 'Sumber Dana harus dipilih',
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

        $dataPerencanaan = [
            'opd_id' => Auth::user()->opd_id,
            'sub_indikator' => $request->sub_indikator,
            'nilai_pembiayaan' => $request->nilai_pembiayaan,
            'sumber_dana' => $request->sumber_dana,
        ];

        $insertPerencanaan = PerencanaanHewan::create($dataPerencanaan);

        if ($request->lokasi != null) {
            foreach ($request->lokasi as $lokasi) {
                $dataLokasi = [
                    'perencanaan_hewan_id' => $insertPerencanaan->id,
                    'lokasi_hewan_id' => $lokasi,
                ];
                $insertLokasi = LokasiPerencanaanHewan::create($dataLokasi);
            }
        }

        if ($request->opd_terkait != null) {
            foreach ($request->opd_terkait as $opd) {
                $dataOPDTerkait = [
                    'perencanaan_hewan_id' => $insertPerencanaan->id,
                    'opd_id' => $opd,
                ];
                $insertOPDTerkait = OPDTerkaitHewan::create($dataOPDTerkait);
            }
        }

        $no_dokumen = 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $request->sub_indikator . '-' . $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();

                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/perencanaan/hewan',
                    $namaFile
                );

                $dataDokumen = [
                    'perencanaan_hewan_id' => $insertPerencanaan->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenPerencanaanHewan::create($dataDokumen);
                $no_dokumen++;
            }
        }

        return response()->json('kirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerencanaanHewan  $perencanaanHewan
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanHewan $rencana_intervensi_hewan)
    {
        return view('dashboard.pages.intervensi.perencanaan.hewan.subIndikator.show', compact('rencana_intervensi_hewan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerencanaanHewan  $perencanaanHewan
     * @return \Illuminate\Http\Response
     */
    public function edit(PerencanaanHewan $rencana_intervensi_hewan)
    {
        if (Auth::user()->role == 'Admin') {
            if (in_array($rencana_intervensi_hewan->status, [0, 2])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else if (Auth::user()->role == 'OPD') {
            if (in_array($rencana_intervensi_hewan->status, [1])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $data = [
            'rencanaIntervensiHewan' => $rencana_intervensi_hewan,
            'desa' => Desa::all(),
            'lokasiPerencanaanHewan' => json_encode($rencana_intervensi_hewan->lokasiPerencanaanHewan->pluck('lokasi_hewan_id')->toArray()),
            'opdTerkaitHewan' => json_encode($rencana_intervensi_hewan->opdTerkaitHewan->pluck('opd_id')->toArray()),
            'opd' => OPD::whereNot('id', $rencana_intervensi_hewan->opd_id)->orderBy('nama')->get(),

        ];
        return view('dashboard.pages.intervensi.perencanaan.hewan.subIndikator.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerencanaanHewanRequest  $request
     * @param  \App\Models\PerencanaanHewan  $perencanaanHewan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerencanaanHewan $rencana_intervensi_hewan)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
                'lokasi' => $rencana_intervensi_hewan->realisasiHewan->count() == 0 ? 'required' : '',
                'nilai_pembiayaan' => 'required',
                'sumber_dana' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus diisi',
                'lokasi.required' => 'Lokasi harus dipilih',
                'nilai_pembiayaan.required' => 'Nilai Pembiayaan harus diisi',
                'sumber_dana.required' => 'Sumber Dana harus dipilih',
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
        if ($rencana_intervensi_hewan->realisasiHewan->count() == 0) {
            $rencana_intervensi_hewan->lokasiPerencanaanHewan()->delete();
            if ($request->lokasi != null) {
                foreach ($request->lokasi as $lokasi) {
                    $dataLokasi = [
                        'perencanaan_hewan_id' => $rencana_intervensi_hewan->id,
                        'lokasi_hewan_id' => $lokasi,
                    ];
                    $insertLokasi = LokasiPerencanaanHewan::create($dataLokasi);
                }
            }
        }

        // update opd terkait
        $rencana_intervensi_hewan->opdTerkaitHewan()->delete();
        if ($request->opd_terkait != null) {
            foreach ($request->opd_terkait as $opd) {
                $dataOPDTerkait = [
                    'perencanaan_hewan_id' => $rencana_intervensi_hewan->id,
                    'opd_id' => $opd,
                ];
                $insertOPDTerkait = OPDTerkaitHewan::create($dataOPDTerkait);
            }
        }

        // Hapus dokumen lama
        if ($request->deleteDocumentOld != null) {
            $deleteDocumentOld = explode(',', $request->deleteDocumentOld);
            foreach ($deleteDocumentOld as $item) {
                $namaFile = DokumenPerencanaanHewan::where('id', $item)->first()->file;
                if (Storage::exists('uploads/dokumen/perencanaan/hewan/' . $namaFile)) {
                    Storage::delete('uploads/dokumen/perencanaan/hewan/' . $namaFile);
                }
                DokumenPerencanaanHewan::where('id', $item)->delete();
            }
        }

        // update deskripsi/title dokumen lama
        if ($request->nama_dokumen_old) {
            foreach ($request->nama_dokumen_old as $key => $value) {
                $idUpdateNama = $rencana_intervensi_hewan->dokumenPerencanaanHewan[$key]->id;
                $dataDokumen = DokumenPerencanaanHewan::find($idUpdateNama);

                $dataDokumen->update([
                    'nama' => $request->nama_dokumen_old[$key],
                ]);
            }
        }

        //  update file dokumen lama
        if ($request->file_dokumen_old) {
            foreach ($request->file_dokumen_old as $key => $value) {
                $idUpdateDokumen = $rencana_intervensi_hewan->dokumenPerencanaanHewan[$key]->id;
                $dataDokumen = DokumenPerencanaanHewan::find($idUpdateDokumen);
                if (Storage::exists('uploads/dokumen/perencanaan/hewan/' . $dataDokumen->file)) {
                    Storage::delete('uploads/dokumen/perencanaan/hewan/' . $dataDokumen->file);
                }

                $namaFile = mt_rand() . '-' . $request->nama_dokumen_old[$key] . '-' . $request->sub_indikator . '-' .  $dataDokumen->no_urut . '.' . $value->getClientOriginalExtension();
                $value->storeAs('uploads/dokumen/perencanaan/hewan/', $namaFile);

                $update = [
                    'nama' => $request->nama_dokumen_old[$key],
                    'file' => $namaFile,
                ];

                $dataDokumen->update($update);
            }
        }

        // update data perencanaan
        $dataPerencanaan = [
            'sub_indikator' => $request->sub_indikator,
            'nilai_pembiayaan' => $request->nilai_pembiayaan,
            'sumber_dana' => $request->sumber_dana,
        ];

        if (Auth::user()->role == 'OPD') {
            $dataPerencanaan['status'] = 0;
            $dataPerencanaan['alasan_ditolak'] = '-';
        }
        $rencana_intervensi_hewan->update($dataPerencanaan);

        // update dokumen baru
        $no_dokumen = $rencana_intervensi_hewan->dokumenPerencanaanHewan->max('no_urut') + 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $request->sub_indikator . '-' .  $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();
                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/perencanaan/hewan/',
                    $namaFile
                );

                $dataDokumen = [
                    'perencanaan_hewan_id' => $rencana_intervensi_hewan->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenPerencanaanHewan::create($dataDokumen);
                $no_dokumen++;
            }
        }

        return response()->json('perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerencanaanHewan  $perencanaanHewan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerencanaanHewan $rencana_intervensi_hewan)
    {
        $rencana_intervensi_hewan->opdTerkaitHewan()->delete();
        $rencana_intervensi_hewan->lokasiPerencanaanHewan()->delete();

        if ($rencana_intervensi_hewan->dokumenPerencanaanHewan) {
            foreach ($rencana_intervensi_hewan->dokumenPerencanaanHewan as $item) {
                if (Storage::exists('uploads/dokumen/perencanaan/hewan/' . $item->file)) {
                    Storage::delete('uploads/dokumen/perencanaan/hewan/' . $item->file);
                }
            }
        }
        $rencana_intervensi_hewan->dokumenPerencanaanHewan()->delete();

        if ($rencana_intervensi_hewan->realisasiHewan) {
            foreach ($rencana_intervensi_hewan->realisasiHewan as $item) {
                foreach ($item->dokumenRealisasiHewan as $doc) {
                    if (Storage::exists('uploads/dokumen/realisasi/hewan/' . $doc->file)) {
                        Storage::delete('uploads/dokumen/realisasi/hewan/' . $doc->file);
                    }
                    DokumenRealisasiHewan::where('id', $item->id)->delete();
                }
                $item->dokumenRealisasiHewan()->delete();
            }
        }

        $rencana_intervensi_hewan->realisasiHewan()->delete();
        $rencana_intervensi_hewan->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function konfirmasi(PerencanaanHewan $rencana_intervensi_hewan, Request $request)
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

        $rencana_intervensi_hewan->update($data);

        return response()->json(['success' => 'Berhasil mengkonfirmasi']);
    }


    public function map(PerencanaanHewan $rencana_intervensi_hewan)
    {
        $getLokasiHewan = $rencana_intervensi_hewan->lokasiPerencanaanHewan->pluck('lokasi_hewan_id')->toArray();
        $lokasiHewan = LokasiHewan::with('desa')->whereIn('id', $getLokasiHewan)->get();
        return response()->json(['status' => 'success', 'data' => $lokasiHewan]);
    }
}
