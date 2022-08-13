<?php

namespace App\Http\Controllers\intervensi\perencanaan\keong;

use App\Models\OPD;
use App\Models\Desa;
use App\Models\LokasiKeong;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PerencanaanKeong;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePerencanaanKeongRequest;
use App\Http\Requests\UpdatePerencanaanKeongRequest;

class PerencanaanKeongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PerencanaanKeong::with('opd', 'lokasi_perencanaan_keong')->latest();
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

                // ->addColumn('lokasi_keong', function ($row) {
                //     $lokasi_keong = '<ul>';
                //     foreach ($row->lokasi_perencanaan_keong as $l) {
                //         $lokasi_keong .= '<li>' . $l->lokasi_keong->nama . ' (<span class="font-weight-bold">' . $l->lokasi_keong->desa->nama . '</span>) </li>';
                //     }
                //     $lokasi_keong .= '</ul>';
                //     return $lokasi_keong;
                // })

                ->addColumn('jumlah_lokasi', function ($row) {
                    return $row->lokasi_perencanaan_keong->count();
                })

                ->addColumn('opd', function ($row) {
                    return $row->opd->nama;
                })

                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="text-center justify-content-center text-white my-1">';
                    if ($row->status == 0) {
                        $actionBtn .= '<a href="' . route('rencana-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                    } else {
                        $actionBtn .= '<a href="' . route('rencana-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a>';
                        $actionBtn .= '<a href="' . route('rencana-intervensi-keong.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                        $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                    }
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'status',
                    'action',
                    'lokasi_keong',
                ])
                ->make(true);
        }
        return view('dashboard.pages.intervensi.perencanaan.keong.subIndikator.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'desa' => Desa::all(),
            'opd' => OPD::orderBy('nama')->get()
        ];
        return view('dashboard.pages.intervensi.perencanaan.keong.subIndikator.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePerencanaanKeongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $validator = Validator::make(
            $request->all(),
            [
                'sub_indikator' => 'required',
                'lokasi' => 'required',
            ],
            [
                'sub_indikator.required' => 'Sub Indikator harus diisi',
                'lokasi.required' => 'Lokasi harus diisi',
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

        $insert = [
            'sub_indikator' => $request->sub_indikator,
            'lokasi' => $request->lokasi,
        ];

        if ($request->opd_terkait != '') {
            $insert['opd_terkati'] = $request->opd_terkait;
        }



        return $insert;




        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerencanaanKeong  $realisasi_intervensi_keong
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanKeong $rencana_intervensi_keong)
    {
        return view('dashboard.pages.intervensi.perencanaan.keong.subIndikator.show', compact('rencana_intervensi_keong'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerencanaanKeong  $realisasi_intervensi_keong
     * @return \Illuminate\Http\Response
     */
    public function edit(PerencanaanKeong $rencana_intervensi_keong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerencanaanKeongRequest  $request
     * @param  \App\Models\PerencanaanKeong  $realisasi_intervensi_keong
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerencanaanKeongRequest $request, PerencanaanKeong $rencana_intervensi_keong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerencanaanKeong  $realisasi_intervensi_keong
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerencanaanKeong $rencana_intervensi_keong)
    {
        //
    }

    public function konfirmasi(PerencanaanKeong $rencana_intervensi_keong, Request $request)
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

        $rencana_intervensi_keong->update($request->all());
        return response()->json(['success' => 'Berhasil mengkonfirmasi']);
    }

    public function map(PerencanaanKeong $rencana_intervensi_keong)
    {
        $getLokasiKeong = $rencana_intervensi_keong->lokasi_perencanaan_keong->pluck('lokasi_keong_id')->toArray();
        $lokasiKeong = LokasiKeong::with('desa')->whereIn('id', $getLokasiKeong)->get();
        return response()->json(['status' => 'success', 'data' => $lokasiKeong]);
    }
}
