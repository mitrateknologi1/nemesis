<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RealisasiHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('realisasi_hewan')->delete();
        
        \DB::table('realisasi_hewan')->insert(array (
            0 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-02-20 21:52:23',
                'id' => '04402e24-eb12-473f-9dfa-fd7472f38e5a',
                'penggunaan_anggaran' => 1500000,
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'progress' => 37.5,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-02-20',
                'tw' => 1,
                'updated_at' => '2022-08-27 21:52:40',
            ),
            1 => 
            array (
                'alasan_ditolak' => 'Dokumen kurang lengkap',
                'created_at' => '2022-05-20 21:53:29',
                'id' => '31d18aa3-236a-40c5-bf62-7b30146f74c7',
                'penggunaan_anggaran' => 2000000,
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'progress' => 75.0,
                'status' => 2,
                'tanggal_konfirmasi' => '2022-05-27',
                'tw' => 2,
                'updated_at' => '2022-08-27 21:53:49',
            ),
            2 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-04-27 21:47:25',
                'id' => '532a089d-2f10-44d6-a9e8-ef2036c69a3c',
                'penggunaan_anggaran' => 2500000,
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'progress' => 66.67,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-04-27',
                'tw' => 2,
                'updated_at' => '2022-08-27 21:47:35',
            ),
            3 => 
            array (
                'alasan_ditolak' => NULL,
                'created_at' => '2022-08-27 21:48:26',
                'id' => '55c87f2e-5bb9-4784-9f91-46e6c3d839e5',
                'penggunaan_anggaran' => 3000000,
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'progress' => 100.0,
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'tw' => 3,
                'updated_at' => '2022-08-27 21:48:26',
            ),
            4 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-01-27 21:45:41',
                'id' => '5a81e758-96db-4419-899a-713a7e5d2a12',
                'penggunaan_anggaran' => 2000000,
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'progress' => 33.33,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-27',
                'tw' => 1,
                'updated_at' => '2022-08-27 21:46:52',
            ),
        ));
        
        
    }
}