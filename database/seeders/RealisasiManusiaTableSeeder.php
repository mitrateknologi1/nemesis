<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RealisasiManusiaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('realisasi_manusia')->delete();
        
        \DB::table('realisasi_manusia')->insert(array (
            0 => 
            array (
                'alasan_ditolak' => 'Dokumen Ada Yang Kurang',
                'created_at' => '2022-04-15 17:29:41',
                'id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'perencanaan_manusia_id' => '00326039-0a88-495b-8670-2b9098ce4600',
                'status' => 2,
                'tanggal_konfirmasi' => '2022-04-15',
                'updated_at' => '2022-09-30 17:32:07',
            ),
            1 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-07-25 17:36:56',
                'id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'perencanaan_manusia_id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'status' => 1,
                'tanggal_konfirmasi' => '2022-07-25',
                'updated_at' => '2022-09-30 17:37:30',
            ),
            2 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2021-05-30 16:53:09',
                'id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'perencanaan_manusia_id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'status' => 1,
                'tanggal_konfirmasi' => '2021-05-30',
                'updated_at' => '2022-09-30 16:56:36',
            ),
            3 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-06-10 17:34:29',
                'id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'updated_at' => '2022-09-30 18:27:13',
            ),
        ));
        
        
    }
}