<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class IntervensiExport implements FromView
{
    protected $tipe;
    protected $tabelKeong;
    protected $tabelManusia;
    protected $tabelHewan;

    function __construct($tipe, $tabelKeong, $tabelManusia, $tabelHewan)
    {
        $this->tipe = $tipe;
        $this->tabelKeong = $tabelKeong;
        $this->tabelManusia = $tabelManusia;
        $this->tabelHewan = $tabelHewan;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $tipe = $this->tipe;
        $tabelKeong = $this->tabelKeong;
        $tabelManusia = $this->tabelManusia;
        $tabelHewan = $this->tabelHewan;
        $view = '';

        if ($tipe == 'semua') {
            $view = 'dashboard.pages.exportDashboard.intervensi.semua';
        } else if ($tipe == 'keong') {
            $view = 'dashboard.pages.exportDashboard.intervensi.keong';
        } else if ($tipe == 'manusia') {
            $view = 'dashboard.pages.exportDashboard.intervensi.manusia';
        } else {
            $view = 'dashboard.pages.exportDashboard.intervensi.hewan';
        }

        return view($view, compact([
            'tabelKeong',
            'tabelManusia',
            'tabelHewan',
        ]));
    }
}
