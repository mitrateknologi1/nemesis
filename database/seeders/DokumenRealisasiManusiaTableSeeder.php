<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokumenRealisasiManusiaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokumen_realisasi_manusia')->delete();
        
        \DB::table('dokumen_realisasi_manusia')->insert(array (
            0 => 
            array (
                'created_at' => '2022-04-30 16:53:09',
                'file' => '1491385931-Dokumen Realisasi  r-Dinas Pendidikan-1.pdf',
                'id' => '2af85ef9-9348-42bc-b276-7c369a638c96',
                'nama' => 'Dokumen Realisasi  r',
                'no_urut' => 1,
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'updated_at' => '2022-09-30 16:53:09',
            ),
            1 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'file' => '1025394785-Dokumen Realisasi b-Dinas Kesehatan-1.pdf',
                'id' => '440c7ab7-27f3-416d-b8a7-da05cc272a8e',
                'nama' => 'Dokumen Realisasi b',
                'no_urut' => 1,
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'updated_at' => '2022-09-30 18:27:13',
            ),
            2 => 
            array (
                'created_at' => '2022-09-30 17:29:41',
                'file' => '2004365665-Dokumen Realisasi g-Dinas Sosial-1.pdf',
                'id' => '78adc253-7fdf-4102-a5c4-6d73bffb8709',
                'nama' => 'Dokumen Realisasi g',
                'no_urut' => 1,
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'updated_at' => '2022-09-30 17:29:41',
            ),
            3 => 
            array (
                'created_at' => '2022-09-30 17:29:41',
                'file' => '1792314013-Dokumen Realisasi r-Dinas Sosial-2.pdf',
                'id' => '8a71b6a4-6870-4a0b-8a0b-057019164ab4',
                'nama' => 'Dokumen Realisasi r',
                'no_urut' => 2,
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'updated_at' => '2022-09-30 17:29:41',
            ),
            4 => 
            array (
                'created_at' => '2022-09-30 17:36:56',
                'file' => '1557568506-Dokumen Realisasi r-Dinas Kebersihan-1.pdf',
                'id' => 'a957dc6d-2265-4757-9a24-37ae345b3b7a',
                'nama' => 'Dokumen Realisasi r',
                'no_urut' => 1,
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'updated_at' => '2022-09-30 17:36:56',
            ),
        ));
        
        
    }
}