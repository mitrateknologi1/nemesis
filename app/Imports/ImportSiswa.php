<?php

namespace App\Imports;

use App\Models\Penduduk;
use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ImportSiswa implements ToCollection, WithHeadingRow

{
    public function __construct($sekolah)
    {
        $this->sekolah = $sekolah;
    }
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $sekolah = $this->sekolah;
        foreach ($rows as $row) {
            $penduduk = Penduduk::where('nik', $row['NIK'])->first();
            if ($penduduk) {
                $siswa = Siswa::where('penduduk_id', $penduduk->id)->first();
                if (!$siswa) {
                    $siswa = new Siswa();
                    $siswa->sekolah_id = $sekolah;
                    $siswa->penduduk_id = $penduduk->id;
                    $siswa->save();
                }
            }
        }
    }
}
