<?php

namespace App\Http\Controllers\intervensi\realisasi\keong;


use Illuminate\Http\Request;
use App\Models\PerencanaanKeong;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RealisasiKeongController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PerencanaanKeong::with('opd', 'lokasiPerencanaanKeong')
                ->where('status', 1)
                ->where(function ($query) {
                    if (Auth::user()->role == 'OPD') {
                        $query->where('opd_id', Auth::user()->opd_id);
                        $query->orWhereHas('opdTerkaitKeong', function ($q) {
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

                // ->addColumn('lokasi_keong', function ($row) {
                //     $lokasi_keong = '<ul>';
                //     foreach ($row->lokasiPerencanaanKeong as $l) {
                //         $lokasi_keong .= '<li>' . $l->lokasi_keong->nama . ' (<span class="font-weight-bold">' . $l->lokasi_keong->desa->nama . '</span>) </li>';
                //     }
                //     $lokasi_keong .= '</ul>';
                //     return $lokasi_keong;
                // })

                ->addColumn('persentase_tw', function ($row) {
                    $persentase_tw = 0;
                    // $twLatest =  $row->realisasiKeong->latest()->first();

                    return $persentase_tw;
                })

                ->addColumn('jumlah_lokasi', function ($row) {
                    return $row->lokasiPerencanaanKeong->count();
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
                            $actionBtn .= '<a href="' . route('rencana-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                            $actionBtn .= '<a href="' . route('rencana-intervensi-keong.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                        } else { //admin
                            $actionBtn .= '<a href="' . route('rencana-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                        }
                    } else if ($row->status == 1) {
                        $actionBtn .= '<a href="' . route('rencana-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . route('rencana-intervensi-keong.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                            $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                        }
                    } else { // > 2
                        $actionBtn .= '<a href="' . route('rencana-intervensi-keong.show', $row->id) . '" id="btn-show" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a> ';
                        if (Auth::user()->role == 'OPD') {
                            $actionBtn .= '<a href="' . route('rencana-intervensi-keong.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                        }
                        $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                    }
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'status',
                    'persentase_tw',
                    'opd',
                    'action',
                    'lokasi_keong',
                ])
                ->make(true);
        }
        return view('dashboard.pages.intervensi.realisasi.keong.subIndikator.index');
    }

    public function show()
    {
        return view('dashboard.pages.intervensi.realisasi.keong.tw.index');
    }
}
