<?php

namespace App\Http\Controllers\intervensi\realisasi\manusia;

use App\Models\OPD;
use Illuminate\Http\Request;
use App\Models\RealisasiManusia;
use App\Models\PerencanaanManusia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreRealisasiManusiaRequest;
use App\Http\Requests\UpdateRealisasiManusiaRequest;

class RealisasiManusiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PerencanaanManusia::with('opd', 'pendudukPerencanaanManusia', 'realisasiManusia')
                ->where('status', 1)
                ->where(function ($query) {
                    if (Auth::user()->role == 'OPD') {
                        $query->where('opd_id', Auth::user()->opd_id);
                        $query->orWhereHas('opdTerkaitManusia', function ($q) {
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
                    if ($row->realisasiManusia->where('status', 1)->count() > 0) {
                        return $row->realisasiManusia->where('status', 1)->max('progress') . ' %';
                    } else {
                        return '0 %';
                    }
                })

                ->addColumn('status', function ($row) {
                    $status = '<div>';
                    if ($row->realisasiManusia->where('status', 1)->max('progress') == 100) {
                        $status .=  '<span class="badge badge-success">' . $row->realisasiManusia->where('status', 1)->count() . ' Laporan Selesai</span>';
                    } else {
                        if ($row->realisasiManusia->where('status', 0)->count() > 0) {
                            $status .= '<span class="badge badge-warning my-1 mx-1">Menunggu Konfirmasi : <span class="font-weight-bold">' . $row->realisasiManusia->where('status', 0)->count() . '</span></span>';
                        }
                        if ($row->realisasiManusia->where('status', 1)->count() > 0) {
                            $status .= '<span class="badge badge-success my-1 mx-1">Laporan Disetujui : <span class="font-weight-bold">' . $row->realisasiManusia->where('status', 1)->count() . '</span></span>';
                        }
                        if ($row->realisasiManusia->where('status', 2)->count() > 0) {
                            $status .= '<span class="badge badge-danger my-1 mx-1">Laporan Ditolak : <span class="font-weight-bold">' . $row->realisasiManusia->where('status', 2)->count() . '</span></span>';
                        }

                        if ($row->realisasiManusia->count() == 0) {
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
                    $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'status',
                    'progress',
                    'opd',
                    'action',
                ])
                ->make(true);
        }
        return view('dashboard.pages.intervensi.realisasi.manusia.subIndikator.index');
    }

    public function tabelLaporan(Request $request)
    {
        if ($request->ajax()) {
            $data = RealisasiManusia::with('perencanaanManusia')->where('perencanaan_manusia_id', $request->id_perencanaan)
                ->where(function ($query) {
                    if (Auth::user()->role == 'OPD') {
                        $query->whereHas('perencanaanManusia', function ($q) {
                            $q->where('opd_id', Auth::user()->opd_id);
                        });
                        $query->orWhere(function ($q) { // OPD Terkait hanya bisa melihat yang telah di setujui
                            $q->whereHas('perencanaanManusia', function ($q2) {
                                $q2->whereHas('opdTerkaitManusia', function ($q3) {
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
                    return $row->pendudukRealisasiManusia->count();
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
                            $actionBtn .= '<a href="' . url('realisasi-intervensi-manusia/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        } else { //admin
                            $actionBtn .= '<a href="' . url('realisasi-intervensi-manusia/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . url('realisasi-intervensi-manusia/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . url('realisasi-intervensi-manusia/show-laporan', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . route('realisasi-intervensi-manusia.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRealisasiManusiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealisasiManusiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealisasiManusia  $realisasiManusia
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanManusia $realisasi_intervensi_manusia)
    {
        $rencana_intervensi_manusia = $realisasi_intervensi_manusia;
        $data = [
            'rencana_intervensi_manusia' => $rencana_intervensi_manusia,
            'tw1' => $rencana_intervensi_manusia->realisasiManusia->where('tw', 1)->where('status', 1)->max('progress'),
            'tw2' => $rencana_intervensi_manusia->realisasiManusia->where('tw', 2)->where('status', 1)->max('progress'),
            'tw3' => $rencana_intervensi_manusia->realisasiManusia->where('tw', 3)->where('status', 1)->max('progress'),
            'tw4' => $rencana_intervensi_manusia->realisasiManusia->where('tw', 4)->where('status', 1)->max('progress'),
            'opdTerkait' => json_encode($rencana_intervensi_manusia->opdTerkaitManusia->pluck('opd_id')->toArray()),
            'opd' => OPD::orderBy('nama')->whereNot('id', $rencana_intervensi_manusia->opd_id)->get(),
        ];
        return view('dashboard.pages.intervensi.realisasi.manusia.subIndikator.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RealisasiManusia  $realisasiManusia
     * @return \Illuminate\Http\Response
     */
    public function edit(RealisasiManusia $realisasiManusia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRealisasiManusiaRequest  $request
     * @param  \App\Models\RealisasiManusia  $realisasiManusia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRealisasiManusiaRequest $request, RealisasiManusia $realisasiManusia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealisasiManusia  $realisasiManusia
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealisasiManusia $realisasiManusia)
    {
        //
    }
}
