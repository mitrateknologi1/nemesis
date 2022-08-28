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
                'created_at' => '2022-08-26 11:50:15',
                'file' => '147628485-Dokumen Realisasi p-Pemeriksaan Kesehatan-1.pdf',
                'id' => '048a55e5-98f9-4d99-aada-f31c3b14540c',
                'nama' => 'Dokumen Realisasi p',
                'no_urut' => 1,
                'realisasi_manusia_id' => 'b3848658-4a55-4ce5-95ff-54cf9371ce20',
                'updated_at' => '2022-08-26 11:50:15',
            ),
            1 => 
            array (
                'created_at' => '2022-08-26 11:57:17',
                'file' => '1932756795-Dokumen Realisasi 1 p-Memberikan sosialisasi kepada warga yang teridentifikasi gejala Schistosomiasis-1.pdf',
                'id' => '1f686166-2b7c-4de8-8f0f-28bd03bd5342',
                'nama' => 'Dokumen Realisasi 1 p',
                'no_urut' => 1,
                'realisasi_manusia_id' => '829a007f-91be-4f2b-a71a-26b53b0b1280',
                'updated_at' => '2022-08-26 11:57:17',
            ),
            2 => 
            array (
                'created_at' => '2022-08-26 11:49:16',
                'file' => '235792570-Dokumen Realisasi b-Pemeriksaan Kesehatan-1.pdf',
                'id' => '33639955-6c7f-41a5-9c05-92f8ccdd2f17',
                'nama' => 'Dokumen Realisasi b',
                'no_urut' => 1,
                'realisasi_manusia_id' => 'f653bfc9-9bf5-4717-a8fb-1cbe06c240a9',
                'updated_at' => '2022-08-26 11:49:16',
            ),
            3 => 
            array (
                'created_at' => '2022-08-26 11:57:17',
                'file' => '1469199385-Dokumen Realisasi 2 b-Memberikan sosialisasi kepada warga yang teridentifikasi gejala Schistosomiasis-2.pdf',
                'id' => '49ea032c-9195-48a4-a968-cd10c5a4acd2',
                'nama' => 'Dokumen Realisasi 2 b',
                'no_urut' => 2,
                'realisasi_manusia_id' => '829a007f-91be-4f2b-a71a-26b53b0b1280',
                'updated_at' => '2022-08-26 11:57:17',
            ),
            4 => 
            array (
                'created_at' => '2022-08-26 11:58:26',
                'file' => '1106374454-Dokumen Realisasi g-Memberikan sosialisasi kepada warga yang teridentifikasi gejala Schistosomiasis-1.pdf',
                'id' => '568e2bc7-8be0-4f3d-befe-7e04367e398f',
                'nama' => 'Dokumen Realisasi g',
                'no_urut' => 1,
                'realisasi_manusia_id' => 'fb143b8d-8621-4c70-b00e-e3d61268896e',
                'updated_at' => '2022-08-26 11:58:26',
            ),
            5 => 
            array (
                'created_at' => '2022-08-28 13:43:03',
                'file' => '1495352766-Dokumen Realisasi Manusia g-Melakukan survey pada warga yang telah sembuh dari gejala yang disebabkan Schistosomiasis-1.pdf',
                'id' => '92fb492d-0e11-4b87-8738-9a7db78171b7',
                'nama' => 'Dokumen Realisasi Manusia g',
                'no_urut' => 1,
                'realisasi_manusia_id' => '9423f60a-e8ab-4ed0-a0d0-fa0c915d0e74',
                'updated_at' => '2022-08-28 13:43:03',
            ),
            6 => 
            array (
                'created_at' => '2022-08-26 11:47:17',
                'file' => '1392021851-Dokumen Realisasi 2 p-Pemeriksaan Kesehatan-2.pdf',
                'id' => '97aa9fae-4518-4112-bba0-8b6148253680',
                'nama' => 'Dokumen Realisasi 2 p',
                'no_urut' => 2,
                'realisasi_manusia_id' => '22cda26a-21f6-497b-9013-258f84593136',
                'updated_at' => '2022-08-26 11:47:17',
            ),
            7 => 
            array (
                'created_at' => '2022-08-26 11:47:17',
                'file' => '18142040-Dokumen Realisasi 1 r-Pemeriksaan Kesehatan-1.pdf',
                'id' => '9a913b67-b88c-4f3c-a6c1-972d0ed81036',
                'nama' => 'Dokumen Realisasi 1 r',
                'no_urut' => 1,
                'realisasi_manusia_id' => '22cda26a-21f6-497b-9013-258f84593136',
                'updated_at' => '2022-08-26 11:47:17',
            ),
            8 => 
            array (
                'created_at' => '2022-08-28 13:36:44',
                'file' => '581987799-Dokumen Realisasi Manusia r-Melakukan survey pada warga yang telah sembuh dari gejala yang disebabkan Schistosomiasis-1.pdf',
                'id' => 'eeec215e-678f-451c-89ac-a3ff098817ca',
                'nama' => 'Dokumen Realisasi Manusia r',
                'no_urut' => 1,
                'realisasi_manusia_id' => 'd9e809ae-3e83-4fbd-8832-b1077cf93edf',
                'updated_at' => '2022-08-28 13:36:44',
            ),
        ));
        
        
    }
}