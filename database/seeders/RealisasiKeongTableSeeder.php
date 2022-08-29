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
                'alasan_ditolak' => '-',
                'created_at' => '2022-04-23 20:44:20',
                'id' => '3a729127-7f21-4cf8-88ba-10de0d67cdb6',
                'penggunaan_anggaran' => 2000000,
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'progress' => 42.86,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-04-23',
                'tw' => 2,
                'updated_at' => '2022-04-23 20:44:40',
            ),
            1 => 
            array (
                'alasan_ditolak' => NULL,
                'created_at' => '2022-11-28 20:51:01',
                'id' => '442fd3ce-eef0-442b-b173-008237449104',
                'penggunaan_anggaran' => 2500000,
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'progress' => 85.71,
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'tw' => 4,
                'updated_at' => '2022-11-28 20:51:01',
            ),
            2 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-01-10 20:41:40',
                'id' => '547c6f6f-827a-4c9f-a720-cb119da8e0e2',
                'penggunaan_anggaran' => 1000000,
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'progress' => 28.57,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-01-10',
                'tw' => 1,
                'updated_at' => '2022-01-10 20:41:53',
            ),
            3 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-06-03 20:46:16',
                'id' => '66283c96-ead5-40fd-a506-1d746c08d6b9',
                'penggunaan_anggaran' => 3000000,
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'progress' => 57.14,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-06-03',
                'tw' => 2,
                'updated_at' => '2022-06-03 20:46:45',
            ),
            4 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-17 20:49:04',
                'id' => '68d5db04-70e8-4e19-ae4e-a8f3e1e452a0',
                'penggunaan_anggaran' => 4000000,
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'progress' => 71.43,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-08-17',
                'tw' => 3,
                'updated_at' => '2022-08-17 20:49:19',
            ),
            5 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-04-21 13:11:56',
                'id' => '9392b3cc-537c-49b3-bc91-d320a17d703f',
                'penggunaan_anggaran' => 1000000,
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'progress' => 40.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-04-21',
                'tw' => 2,
                'updated_at' => '2022-08-28 13:12:50',
            ),
            6 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-28 13:13:51',
                'id' => 'f6b09084-f1bf-453d-bc36-ece196f46782',
                'penggunaan_anggaran' => 2000000,
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'progress' => 100.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-08-28',
                'tw' => 3,
                'updated_at' => '2022-08-28 13:14:04',
            ),
        ));
        
        
    }
}