<?php

namespace App\Http\Controllers\intervensi\perencanaan\keong;

use Illuminate\Http\Request;
use App\Models\PerencanaanKeong;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
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
            $data = PerencanaanKeong::with('opd')->latest();
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

                ->addColumn('titik_lokasi', function ($row) {
                    return '<ul>
                        <li>Anca (3)</li>
                        <li>Langko (4)</li>
                    </ul>';
                })

                ->addColumn('opd', function ($row) {
                    return $row->opd->nama;
                })

                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="text-center justify-content-center text-white my-1">';
                    if ($row->status == 0) {
                        $actionBtn .= '<a href="' . route('rencana-intervensi-keong.show', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-secondary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-lg fa-clipboard-check"></i></a> ';
                    } else {
                        $actionBtn .= '<a href="' . route('rencana-intervensi-keong.show', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-primary btn-sm text-white shadow btn-lihat my-1" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fas fa-eye"></i></a>';
                        $actionBtn .= '<a href="' . route('rencana-intervensi-keong.edit', $row->id) . '" id="btn-edit" class="btn btn-rounded btn-warning btn-sm my-1 text-white shadow" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a> ';
                        $actionBtn .= '<button id="btn-delete" class="btn btn-rounded btn-danger btn-sm my-1 text-white shadow btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" value="' . $row->id . '"><i class="fas fa-trash"></i></button>';
                    }
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns([
                    'status',
                    'action',
                    'titik_lokasi',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePerencanaanKeongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerencanaanKeongRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerencanaanKeong  $PerencanaanKeong
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanKeong $PerencanaanKeong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerencanaanKeong  $PerencanaanKeong
     * @return \Illuminate\Http\Response
     */
    public function edit(PerencanaanKeong $PerencanaanKeong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerencanaanKeongRequest  $request
     * @param  \App\Models\PerencanaanKeong  $PerencanaanKeong
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerencanaanKeongRequest $request, PerencanaanKeong $PerencanaanKeong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerencanaanKeong  $PerencanaanKeong
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerencanaanKeong $PerencanaanKeong)
    {
        //
    }
}
