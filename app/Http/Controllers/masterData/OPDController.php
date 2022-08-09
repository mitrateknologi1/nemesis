<?php

namespace App\Http\Controllers\masterData;

use App\Models\OPD;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOPDRequest;
use App\Http\Requests\UpdateOPDRequest;

class OPDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreOPDRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOPDRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OPD  $oPD
     * @return \Illuminate\Http\Response
     */
    public function show(OPD $oPD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OPD  $oPD
     * @return \Illuminate\Http\Response
     */
    public function edit(OPD $oPD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOPDRequest  $request
     * @param  \App\Models\OPD  $oPD
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOPDRequest $request, OPD $oPD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OPD  $oPD
     * @return \Illuminate\Http\Response
     */
    public function destroy(OPD $oPD)
    {
        //
    }
}
