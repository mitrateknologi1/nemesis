<?php

namespace App\Http\Controllers\intervensi\realisasi\keong;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RealisasiKeongController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.intervensi.realisasi.keong.subIndikator.index');
    }

    public function show()
    {
        return view('dashboard.pages.intervensi.realisasi.keong.tw.index');
    }
}
