<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RealisasiKeongTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('realisasi_keong')->delete();
        
        \DB::table('realisasi_keong')->insert(array (
            0 => 
            array (
                'alasan_ditolak' => 'Dokumen Kurang',
                'created_at' => '2022-03-01 01:48:57',
                'id' => '239e5680-1ff0-44e3-85b1-8859a014b9c8',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'status' => 2,
                'tanggal_konfirmasi' => '2022-03-01',
                'updated_at' => '2022-09-27 02:09:58',
            ),
            1 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2021-04-27 02:03:44',
                'id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-04-27',
                'updated_at' => '2022-09-27 02:05:54',
            ),
            2 => 
            array (
                'alasan_ditolak' => NULL,
                'created_at' => '2022-04-10 01:58:11',
                'id' => '7da6a090-4f93-4d28-b034-e3b36ed13068',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'updated_at' => '2022-09-27 01:58:11',
            ),
        ));
        
        
    }
}