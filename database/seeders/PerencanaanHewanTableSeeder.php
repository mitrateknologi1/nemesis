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
        
        \DB::table('perencanaan_hewan')->insert(array (
            0 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-09 12:45:27',
                'id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'nilai_pembiayaan' => 10000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Pemberian Obat/Vitamin untuk hewan ternak',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => '2022-01-09',
                'updated_at' => '2022-01-09 13:30:23',
            ),
            1 => 
            array (
                'alasan_ditolak' => NULL,
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-02-02 13:09:57',
                'id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'nilai_pembiayaan' => 8000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 0,
                'status_baca' => NULL,
                'sub_indikator' => 'Sosialisasi Kepada Pemillik Ternak',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => NULL,
                'updated_at' => '2022-08-27 13:09:57',
            ),
            2 => 
            array (
                'alasan_ditolak' => 'lokasi terlalu sedikit',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-03 12:39:44',
                'id' => '5aabc047-e5bb-4d9c-bf0a-12ee1e88eb68',
                'nilai_pembiayaan' => 10000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 2,
                'status_baca' => NULL,
                'sub_indikator' => 'Pemeriksaan Ternak',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-01-03',
                'updated_at' => '2022-01-03 13:06:16',
            ),
            3 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-08-27 13:11:57',
                'id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'nilai_pembiayaan' => 4000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Penyuntikan Vaksin pada hewan ternak',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-08-27',
                'updated_at' => '2022-09-06 13:30:35',
            ),
            4 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2021-01-10 13:29:41',
                'id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'nilai_pembiayaan' => 15000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Pemeriksaan Tinja Ternak',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2021-01-10',
                'updated_at' => '2021-01-10 14:02:45',
            ),
            5 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2021-01-08 14:02:33',
                'id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'nilai_pembiayaan' => 20000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Mendata Jumlah Hewan Ternak',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2021-01-08',
                'updated_at' => '2021-01-08 14:02:52',
            ),
        ));
        
        
    }
}