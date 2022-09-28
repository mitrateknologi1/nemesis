<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokumenRealisasiHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokumen_realisasi_hewan')->delete();
        
        \DB::table('dokumen_realisasi_hewan')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'file' => '509250140-Dokumen Realisasi 1-Dinas Kesehatan-1.pdf',
                'id' => '422af4c4-a3a6-4069-a0da-ddb91799f5c2',
                'nama' => 'Dokumen Realisasi 1',
                'no_urut' => 1,
                'realisasi_hewan_id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'updated_at' => '2022-09-28 16:50:44',
            ),
            1 => 
            array (
                'created_at' => '2022-09-28 17:00:13',
                'file' => '2129979172-Dokumen Realisasi 2-Dinas Kebersihan-2.pdf',
                'id' => '688a0db0-845a-405a-80d2-708433445d96',
                'nama' => 'Dokumen Realisasi 2',
                'no_urut' => 2,
                'realisasi_hewan_id' => '9cf0b85c-9378-4492-973c-8db2d4ef27cd',
                'updated_at' => '2022-09-28 17:00:13',
            ),
            2 => 
            array (
                'created_at' => '2022-09-28 16:45:36',
                'file' => '725033847-Dokumen Realisasi 2-Dinas Lingkungan Hidup-2.pdf',
                'id' => '855c2894-52c6-4214-86b8-163d3258b45c',
                'nama' => 'Dokumen Realisasi 2',
                'no_urut' => 2,
                'realisasi_hewan_id' => 'b6aafe00-d0ec-4348-ae3b-92aeaeb5a57c',
                'updated_at' => '2022-09-28 16:45:36',
            ),
            3 => 
            array (
                'created_at' => '2022-09-28 16:45:36',
                'file' => '2017231377-Dokumen Realisasi 1-Dinas Lingkungan Hidup-1.pdf',
                'id' => '8bd67508-1204-427c-a107-2ad61f499a64',
                'nama' => 'Dokumen Realisasi 1',
                'no_urut' => 1,
                'realisasi_hewan_id' => 'b6aafe00-d0ec-4348-ae3b-92aeaeb5a57c',
                'updated_at' => '2022-09-28 16:45:36',
            ),
            4 => 
            array (
                'created_at' => '2022-09-28 17:00:13',
                'file' => '840262793-Dokumen Realisasi 1-Dinas Kebersihan-1.pdf',
                'id' => 'de64d8da-3876-477d-acf7-073719e0fb0e',
                'nama' => 'Dokumen Realisasi 1',
                'no_urut' => 1,
                'realisasi_hewan_id' => '9cf0b85c-9378-4492-973c-8db2d4ef27cd',
                'updated_at' => '2022-09-28 17:00:13',
            ),
            5 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'file' => '482686053-Dokumen Realisasi 2-Dinas Kesehatan-2.pdf',
                'id' => 'df33e9e0-fcab-4f81-9054-14031c2a9bc6',
                'nama' => 'Dokumen Realisasi 2',
                'no_urut' => 2,
                'realisasi_hewan_id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'updated_at' => '2022-09-28 16:50:44',
            ),
        ));
        
        
    }
}