<?php

namespace App\Http\Controllers\intervensi\perencanaan\manusia;

use App\Models\OPD;
use App\Models\Desa;
use App\Models\PerencanaanManusia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePerencanaanManusiaRequest;
use App\Http\Requests\UpdatePerencanaanManusiaRequest;

class PerencanaanManusiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(StorePerencanaanManusiaRequest $request)
    {
        //
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
    public function edit(PerencanaanManusia $perencanaanManusia)
    {
        //
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
