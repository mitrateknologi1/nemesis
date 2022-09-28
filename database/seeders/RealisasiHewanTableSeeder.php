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
                'alasan_ditolak' => 'Dokumen Kurang',
                'created_at' => '2022-02-02 16:50:44',
                'id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'status' => 2,
                'tanggal_konfirmasi' => '2022-02-02',
                'updated_at' => '2022-09-28 16:53:16',
            ),
            1 => 
            array (
                'alasan_ditolak' => NULL,
                'created_at' => '2022-01-20 17:00:13',
                'id' => '9cf0b85c-9378-4492-973c-8db2d4ef27cd',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'updated_at' => '2022-09-28 17:00:13',
            ),
            2 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2021-01-12 16:45:36',
                'id' => 'b6aafe00-d0ec-4348-ae3b-92aeaeb5a57c',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-01-12',
                'updated_at' => '2022-09-28 16:45:46',
            ),
        ));
        
        
    }
}