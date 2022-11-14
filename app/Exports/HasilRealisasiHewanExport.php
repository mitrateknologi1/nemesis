<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class HasilRealisasiHewanExport implements FromView
{
    protected $dataRealisasi;
    protected $tahun_filter;
    /**
     * @return \Illuminate\Support\Collection
     */
    function __construct($dataRealisasi, $tahun_filter)
    {
        $this->dataRealisasi = $dataRealisasi;
        $this->tahun_filter = $tahun_filter;
    }

    public function view(): View
    {
        return view('dashboard.pages.hasilRealisasi.hewan.export', ['dataRealisasi' => $this->dataRealisasi, 'tahun_filter' => $this->tahun_filter]);
    }
}
