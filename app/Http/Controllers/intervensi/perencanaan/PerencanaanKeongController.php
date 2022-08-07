<?php

namespace App\Http\Controllers\intervensi\perencanaan;

use App\Models\Keong;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKeongRequest;
use App\Http\Requests\UpdateKeongRequest;

class PerencanaanKeongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.intervensi.perencanaan.keong.index');
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
     * @param  \App\Http\Requests\StoreKeongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeongRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keong  $keong
     * @return \Illuminate\Http\Response
     */
    public function show(Keong $keong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keong  $keong
     * @return \Illuminate\Http\Response
     */
    public function edit(Keong $keong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeongRequest  $request
     * @param  \App\Models\Keong  $keong
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeongRequest $request, Keong $keong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keong  $keong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keong $keong)
    {
        //
    }
}
