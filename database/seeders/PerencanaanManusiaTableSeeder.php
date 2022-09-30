<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerencanaanManusiaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perencanaan_manusia')->delete();
        
        \DB::table('perencanaan_manusia')->insert(array (
            0 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-02-10 23:45:49',
                'id' => '00326039-0a88-495b-8670-2b9098ce4600',
                'nilai_pembiayaan' => 4000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c96',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Melakukan survey pada warga yang telah sembuh dari gejala yang disebabkan Schistosomiasis',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x90',
                'tanggal_konfirmasi' => '2022-02-10',
                'updated_at' => '2022-02-10 13:29:42',
            ),
            1 => 
            array (
                'alasan_ditolak' => NULL,
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-15 23:35:20',
                'id' => '9c559147-af9e-4ce2-a414-17d2cfdd15f5',
                'nilai_pembiayaan' => 30000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 0,
                'status_baca' => NULL,
                'sub_indikator' => 'Pengobatan pada warga yang terdampak Schistosomiasis',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => NULL,
                'updated_at' => '2022-01-15 23:35:20',
            ),
            2 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2021-01-01 12:25:24',
                'id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'nilai_pembiayaan' => 18000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Memberikan edukasi terkait keong schistosomiasis pada siswa siswi di sekolah',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2021-01-02',
                'updated_at' => '2021-01-02 12:26:20',
            ),
            3 => 
            array (
                'alasan_ditolak' => 'Penduduk terlalu sedikit',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-02-08 23:26:52',
                'id' => 'bac1eb88-fb66-4a73-b51d-2d6834470217',
                'nilai_pembiayaan' => 10000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 2,
                'status_baca' => NULL,
                'sub_indikator' => 'Pengambilan Tinja Di Desa Anca',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-02-08',
                'updated_at' => '2022-02-10 23:36:05',
            ),
            4 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2021-01-07 12:14:46',
                'id' => 'bd5fd8db-f1c6-4622-b94a-0baeb92547f2',
                'nilai_pembiayaan' => 30000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Pengambilan tinja siswa siswi di sekolah',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2021-01-07',
                'updated_at' => '2021-01-07 12:35:08',
            ),
            5 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-02-01 23:32:10',
                'id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'nilai_pembiayaan' => 20000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Pemeriksaan Kesehatan',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-02-01',
                'updated_at' => '2022-02-01 23:36:51',
            ),
            6 => 
            array (
                'alasan_ditolak' => '-',
                'alasan_tidak_terselesaikan' => NULL,
                'created_at' => '2022-01-13 23:42:01',
                'id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'nilai_pembiayaan' => 9000000,
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'status' => 1,
                'status_baca' => NULL,
                'sub_indikator' => 'Memberikan sosialisasi kepada warga yang teridentifikasi gejala Schistosomiasis',
                'sumber_dana_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3x91',
                'tanggal_konfirmasi' => '2022-01-13',
                'updated_at' => '2022-01-14 23:42:15',
            ),
        ));
        
        
    }
}