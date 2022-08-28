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
                'alasan_ditolak' => '-',
                'created_at' => '2022-02-26 11:47:17',
                'id' => '22cda26a-21f6-497b-9013-258f84593136',
                'penggunaan_anggaran' => 1000000,
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'progress' => 33.33,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-02-26',
                'tw' => 1,
                'updated_at' => '2022-08-26 11:48:19',
            ),
            1 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-06-26 11:57:17',
                'id' => '829a007f-91be-4f2b-a71a-26b53b0b1280',
                'penggunaan_anggaran' => 2500000,
                'perencanaan_manusia_id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'progress' => 57.14,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-06-26',
                'tw' => 3,
                'updated_at' => '2022-08-26 11:57:33',
            ),
            2 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-28 13:43:03',
                'id' => '9423f60a-e8ab-4ed0-a0d0-fa0c915d0e74',
                'penggunaan_anggaran' => 2000000,
                'perencanaan_manusia_id' => '00326039-0a88-495b-8670-2b9098ce4600',
                'progress' => 100.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-08-28',
                'tw' => 3,
                'updated_at' => '2022-08-28 13:43:22',
            ),
            3 => 
            array (
                'alasan_ditolak' => NULL,
                'created_at' => '2022-08-26 11:50:14',
                'id' => 'b3848658-4a55-4ce5-95ff-54cf9371ce20',
                'penggunaan_anggaran' => 7000000,
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'progress' => 100.0,
                'status' => 0,
                'tanggal_konfirmasi' => NULL,
                'tw' => 3,
                'updated_at' => '2022-08-26 11:50:14',
            ),
            4 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-28 13:36:44',
                'id' => 'd9e809ae-3e83-4fbd-8832-b1077cf93edf',
                'penggunaan_anggaran' => 1000000,
                'perencanaan_manusia_id' => '00326039-0a88-495b-8670-2b9098ce4600',
                'progress' => 50.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-08-28',
                'tw' => 3,
                'updated_at' => '2022-08-28 13:36:59',
            ),
            5 => 
            array (
                'alasan_ditolak' => '-',
                'created_at' => '2022-05-26 11:49:16',
                'id' => 'f653bfc9-9bf5-4717-a8fb-1cbe06c240a9',
                'penggunaan_anggaran' => 2000000,
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'progress' => 50.0,
                'status' => 1,
                'tanggal_konfirmasi' => '2022-05-26',
                'tw' => 2,
                'updated_at' => '2022-08-26 11:49:25',
            ),
            6 => 
            array (
                'alasan_ditolak' => 'Penduduk Kurang 1',
                'created_at' => '2022-08-26 11:58:26',
                'id' => 'fb143b8d-8621-4c70-b00e-e3d61268896e',
                'penggunaan_anggaran' => 3000000,
                'perencanaan_manusia_id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'progress' => 85.71,
                'status' => 2,
                'tanggal_konfirmasi' => '2022-08-26',
                'tw' => 3,
                'updated_at' => '2022-08-26 11:58:41',
            ),
        ));
        
        
    }
}