<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokumenRealisasiKeongTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokumen_realisasi_keong')->delete();
        
        \DB::table('dokumen_realisasi_keong')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'file' => '1714057617-Dokumen Realisasi 2-Dinas Lingkungan Hidup-2.pdf',
                'id' => '2608f810-0825-4ff6-af56-bc259deea8d2',
                'nama' => 'Dokumen Realisasi 2',
                'no_urut' => 2,
                'realisasi_keong_id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'updated_at' => '2022-09-27 02:03:44',
            ),
            1 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'file' => '1452805208-Dokumen Realisasi 1-Dinas Lingkungan Hidup-1.pdf',
                'id' => '291028b4-3bbf-4340-8181-8e2e044c2cf8',
                'nama' => 'Dokumen Realisasi 1',
                'no_urut' => 1,
                'realisasi_keong_id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'updated_at' => '2022-09-27 02:03:44',
            ),
            2 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'file' => '996858664-Dokumen Realisasi 1-Dinas Lingkungan Hidup-1.pdf',
                'id' => '2cdbf61f-6daa-4a1c-ae31-97d3b47f192e',
                'nama' => 'Dokumen Realisasi 1',
                'no_urut' => 1,
                'realisasi_keong_id' => '239e5680-1ff0-44e3-85b1-8859a014b9c8',
                'updated_at' => '2022-09-27 01:48:57',
            ),
            3 => 
            array (
                'created_at' => '2022-09-27 01:58:11',
                'file' => '235993905-Dokumen Realisasi 2-Dinas Kesehatan-2.pdf',
                'id' => '9142ef17-05bb-43e5-8e29-57e667ae972f',
                'nama' => 'Dokumen Realisasi 2',
                'no_urut' => 2,
                'realisasi_keong_id' => '7da6a090-4f93-4d28-b034-e3b36ed13068',
                'updated_at' => '2022-09-27 01:58:11',
            ),
            4 => 
            array (
                'created_at' => '2022-09-27 01:58:11',
                'file' => '1962533518-Dokumen Realisasi 1-Dinas Kesehatan-1.pdf',
                'id' => 'b67e5bd0-cd57-4188-b1d8-70d2787ecdd1',
                'nama' => 'Dokumen Realisasi 1',
                'no_urut' => 1,
                'realisasi_keong_id' => '7da6a090-4f93-4d28-b034-e3b36ed13068',
                'updated_at' => '2022-09-27 01:58:11',
            ),
            5 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'file' => '103155847-Dokumen Realisasi 2-Dinas Lingkungan Hidup-2.pdf',
                'id' => 'ea31daa6-c451-4dea-9e5e-1748bcf8ea91',
                'nama' => 'Dokumen Realisasi 2',
                'no_urut' => 2,
                'realisasi_keong_id' => '239e5680-1ff0-44e3-85b1-8859a014b9c8',
                'updated_at' => '2022-09-27 01:48:57',
            ),
        ));
        
        
    }
}