<?php

namespace App\Http\Controllers\intervensi\perencanaan\manusia;

use App\Models\OPD;
use App\Models\Desa;
use Illuminate\Http\Request;
use App\Models\OPDTerkaitKeong;
use App\Models\OPDTerkaitManusia;
use App\Models\PerencanaanManusia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\DokumenPerencanaanManusia;
use Illuminate\Support\Facades\Validator;
use App\Models\PendudukPerencanaanManusia;
use App\Http\Requests\StorePerencanaanManusiaRequest;
use App\Http\Requests\UpdatePerencanaanManusiaRequest;

class PerencanaanManusiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PerencanaanManusia::with('opd', 'pendudukPerencanaanManusia')
                ->where(function ($query) {
                    if (Auth::user()->role == 'OPD') {
                        $query->where('opd_id', Auth::user()->opd_id);
                        $query->orWhereHas('opdTerkaitManusia', function ($q) { // OPD Terkait hanya bisa melihat yang telah di setujui
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

                ->addColumn('jumlah_penduduk', function ($row) {
                    return $row->pendudukPerencanaanManusia->count();
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
                            $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        } else { //admin
                            $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . route('rencana-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
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
        return view('dashboard.pages.intervensi.perencanaan.manusia.subIndikator.index');
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
        return view('dashboard.pages.intervensi.perencanaan.manusia.subIndikator.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePerencanaanManusiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
                'penduduk' => 'required',
                'nilai_pembiayaan' => 'required',
                'sumber_dana' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus diisi',
                'penduduk.required' => 'Penduduk harus dipilih',
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

        $insertPerencanaan = PerencanaanManusia::create($dataPerencanaan);

        if ($request->penduduk != null) {
            foreach ($request->penduduk as $penduduk) {
                $dataLokasi = [
                    'perencanaan_manusia_id' => $insertPerencanaan->id,
                    'penduduk_id' => $penduduk,
                ];
                $insertLokasi = PendudukPerencanaanManusia::create($dataLokasi);
            }
        }

        if ($request->opd_terkait != null) {
            foreach ($request->opd_terkait as $opd) {
                $dataOPDTerkait = [
                    'perencanaan_manusia_id' => $insertPerencanaan->id,
                    'opd_id' => $opd,
                ];
                $insertOPDTerkait = OPDTerkaitManusia::create($dataOPDTerkait);
            }
        }

        $no_dokumen = 1;
        if ($request->nama_dokumen != null) {
            for ($i = 0; $i < $countFileDokumen; $i++) {
                $namaFile = mt_rand() . '-' . $request->nama_dokumen[$i] . '-' . $request->sub_indikator . '-' . $no_dokumen . '.' . $request->file_dokumen[$i]->getClientOriginalExtension();

                $request->file_dokumen[$i]->storeAs(
                    'uploads/dokumen/perencanaan/manusia',
                    $namaFile
                );

                $dataDokumen = [
                    'perencanaan_manusia_id' => $insertPerencanaan->id,
                    'nama' => $request->nama_dokumen[$i],
                    'file' => $namaFile,
                    'no_urut' => $no_dokumen,
                ];

                DokumenPerencanaanManusia::create($dataDokumen);
                $no_dokumen++;
            }
        }

        return response()->json('kirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerencanaanManusia  $perencanaanManusia
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanManusia $perencanaanManusia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerencanaanManusia  $perencanaanManusia
     * @return \Illuminate\Http\Response
     */
    public function edit(PerencanaanManusia $rencana_intervensi_manusia)
    {
        if (Auth::user()->role == 'Admin') {
            if (in_array($rencana_intervensi_manusia->status, [0, 2])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else if (Auth::user()->role == 'OPD') {
            if (in_array($rencana_intervensi_manusia->status, [1])) {
                abort('403', 'Oops! anda tidak memiliki akses ke sini.');
            }
        } else {
            abort('403', 'Oops! anda tidak memiliki akses ke sini.');
        }

        $data = [
            'rencanaIntervensiManusia' => $rencana_intervensi_manusia,
            'desa' => Desa::all(),
            'pendudukPerencanaanManusia' => json_encode($rencana_intervensi_manusia->pendudukPerencanaanManusia->pluck('penduduk_id')->toArray()),
            'opdTerkaitManusia' => json_encode($rencana_intervensi_manusia->opdTerkaitManusia->pluck('opd_id')->toArray()),
            'opd' => OPD::whereNot('id', $rencana_intervensi_manusia->opd_id)->orderBy('nama')->get(),

        ];
        return view('dashboard.pages.intervensi.perencanaan.manusia.subIndikator.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerencanaanManusiaRequest  $request
     * @param  \App\Models\PerencanaanManusia  $perencanaanManusia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerencanaanManusiaRequest $request, PerencanaanManusia $perencanaanManusia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerencanaanManusia  $perencanaanManusia
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerencanaanManusia $perencanaanManusia)
    {
        //
    }
}
