<?php

namespace App\Http\Controllers\masterData\lokasi;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\LokasiKeong;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LokasiKeongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = LokasiKeong::orderBy('nama', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('desa', function ($row) {
                    return $row->desa->nama;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge bg-success text-light border-none">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger text-light border-none">Tidak Aktif</span>';
                    }
                })
                ->addColumn('koordinat', function ($row) {
                    return $row->latitude . ' / ' . $row->longitude;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url('master-data/lokasi/keong' . '/' . $row->id . '/edit') . '" class="btn btn-warning btn-round btn-sm mr-1" value="' . $row->id . '"><i class="fa fa-edit"></i></a><button id="btn-delete" class="btn btn-danger btn-round btn-sm mr-1" value="' . $row->id . '" ><i class="fa fa-trash"></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'status', 'warnaPolygon', 'luas', 'koordinat'])
                ->make(true);
        }

        return view('dashboard.pages.masterData.lokasi.keong.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.lokasi.keong.create', compact(['daftarDesa']));
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
                'nama' => 'required',
                'deskripsi' => 'required',
                'desa_id' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'status' => 'required',
            ],
            [
                'nama.required' => 'Nama Lokasi tidak boleh kosong',
                'deskripsi.required' => 'Deskripsi lokasi tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
                'latitude.required' => 'Latitude tidak boleh kosong',
                'longitude.required' => 'Longitude tidak boleh kosong',
                'status.required' => 'Status tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $lokasiKeong = new LokasiKeong();
        $lokasiKeong->nama = $request->nama;
        $lokasiKeong->deskripsi = $request->deskripsi;
        $lokasiKeong->desa_id = $request->desa_id;
        $lokasiKeong->latitude = $request->latitude;
        $lokasiKeong->longitude = $request->longitude;
        $lokasiKeong->status = $request->status;
        $lokasiKeong->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LokasiKeong  $lokasiKeong
     * @return \Illuminate\Http\Response
     */
    public function show(LokasiKeong $lokasiKeong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LokasiKeong  $lokasiKeong
     * @return \Illuminate\Http\Response
     */
    public function edit(LokasiKeong $lokasiKeong)
    {
        $daftarDesa = Desa::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.lokasi.keong.edit', compact(['daftarDesa', 'lokasiKeong']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LokasiKeong  $lokasiKeong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LokasiKeong $lokasiKeong)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'deskripsi' => 'required',
                'desa_id' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'status' => 'required',
            ],
            [
                'nama.required' => 'Nama Lokasi tidak boleh kosong',
                'deskripsi.required' => 'Deskripsi lokasi tidak boleh kosong',
                'desa_id.required' => 'Desa tidak boleh kosong',
                'latitude.required' => 'Latitude tidak boleh kosong',
                'longitude.required' => 'Longitude tidak boleh kosong',
                'status.required' => 'Status tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $lokasiKeong->nama = $request->nama;
        $lokasiKeong->deskripsi = $request->deskripsi;
        $lokasiKeong->desa_id = $request->desa_id;
        $lokasiKeong->latitude = $request->latitude;
        $lokasiKeong->longitude = $request->longitude;
        $lokasiKeong->status = $request->status;
        $lokasiKeong->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LokasiKeong  $lokasiKeong
     * @return \Illuminate\Http\Response
     */
    public function destroy(LokasiKeong $lokasiKeong)
    {
        $lokasiKeong->delete();

        return response()->json(['status' => 'success']);
    }

    public function getMapData(Request $request)
    {
        if ($request->id) {
            $keong = LokasiKeong::with(['desa'])->find($request->id);
        } else {
            $keong = LokasiKeong::with(['desa'])->orderBy('id', 'desc')->get();
        }

        if ($keong) {
            return response()->json(['status' => 'success', 'data' => $keong]);
        } else {
            return response()->json(['status' => 'error']);
        }
    }
}
