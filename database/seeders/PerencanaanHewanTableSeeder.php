<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerencanaanHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('perencanaan_hewan')->delete();

        \DB::table('perencanaan_hewan')->insert(array(
            0 =>
            array(
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-27 12:45:27',
                'id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'nilai_pembiayaan' => 10000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'sub_indikator' => 'Pemberian Obat',
                'sumber_dana' => 'DAU',
                'tanggal_konfirmasi' => '2022-08-27',
                'updated_at' => '2022-08-27 13:08:12',
            ),
            1 =>
            array(
                'alasan_ditolak' => NULL,
                'created_at' => '2022-08-27 13:09:57',
                'id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'nilai_pembiayaan' => 8000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 0,
                'sub_indikator' => 'Sosialisasi Kepada Pemillik Ternak',
                'sumber_dana' => 'DAU',
                'tanggal_konfirmasi' => NULL,
                'updated_at' => '2022-08-27 13:09:57',
            ),
            2 =>
            array(
                'alasan_ditolak' => 'lokasi terlalu sedikit',
                'created_at' => '2022-08-27 12:39:44',
                'id' => '5aabc047-e5bb-4d9c-bf0a-12ee1e88eb68',
                'nilai_pembiayaan' => 10000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 2,
                'sub_indikator' => 'Pemeriksaan Ternak',
                'sumber_dana' => 'DAK',
                'tanggal_konfirmasi' => '2022-08-27',
                'updated_at' => '2022-08-27 13:06:16',
            ),
            3 =>
            array(
                'alasan_ditolak' => '-',
                'created_at' => '2022-08-27 13:11:57',
                'id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'nilai_pembiayaan' => 4000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 1,
                'sub_indikator' => 'Penyuntikan Vaksin',
                'sumber_dana' => 'DAK',
                'tanggal_konfirmasi' => '2022-08-27',
                'updated_at' => '2022-08-27 13:43:26',
            ),
        ));
    }
}
