<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerencanaanKeongTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perencanaan_keong')->delete();
        
        \DB::table('perencanaan_keong')->insert(array (
            0 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2021-01-06 11:21:05',
                'id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'nilai_pembiayaan' => 20000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Mengecek sampel keong pada setiap kolam',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2021-01-06',
                'updated_at' => '2021-01-06 11:33:32',
            ),
            1 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2021-02-06 11:32:51',
                'id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'nilai_pembiayaan' => 20000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Memberi tanda pada kolam yang bebas maupun yang terdeteksi keong schistosomiasis',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => '2021-02-06',
                'updated_at' => '2021-02-06 11:33:16',
            ),
            2 => 
            array (
                'alasan_ditolak' => 'Dokumen Kurang Lengkap',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-08 01:15:57',
                'id' => '76628878-af22-4ae8-be21-eaa420265982',
                'nilai_pembiayaan' => 10000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 2,
                'status_baca' => NULL,
                'sub_indikator' => 'Pengambilan tinja siswa siswi di sekolah',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-09-30',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-06 01:16:57',
                'id' => '76628878-af22-4ae8-be21-eaa420265983',
                'nilai_pembiayaan' => 15000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 0,
                'status_baca' => NULL,
                'sub_indikator' => 'Penaburan Obat',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-02 01:17:57',
                'id' => '76628878-af22-4ae8-be21-eaa420265984',
                'nilai_pembiayaan' => 12000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Pembersihan Habitat Keong',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-01-03',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-11 01:18:57',
                'id' => '76628878-af22-4ae8-be21-eaa420265985',
                'nilai_pembiayaan' => 8000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c96',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Penyuluhan Masyarakat',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-01-12',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-15 01:19:57',
                'id' => '76628878-af22-4ae8-be21-eaa420265986',
                'nilai_pembiayaan' => 8500000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Mengindentifikasi Kolam terdeteksi schistosomiasis',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => '2022-01-15',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-02-01 01:20:57',
                'id' => '76628878-af22-4ae8-be21-eaa420265987',
                'nilai_pembiayaan' => 1250000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Pemusnahan Keong',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-02-01',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}