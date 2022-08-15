<?php

namespace Database\Seeders;

use App\Models\PerencanaanKeong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerencanaanKeongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265982',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pengambilan tinja siswa siswi di sekolah',
                'nilai_pembiayaan' => 10000000,
                'sumber_dana' => 'DAK',
                'status' => 2, // ditolak
                'tanggal_konfirmasi' => '2020-09-30',
                'alasan_ditolak' => 'Dokumen Kurang Lengkap',
                'created_at' => '2020-08-08 01:15:57',
            ],
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265983',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Penaburan Obat',
                'nilai_pembiayaan' => 15000000,
                'sumber_dana' => 'DAU',
                'status' => 0, // menunggu konfirmasi
                'tanggal_konfirmasi' => null,
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:16:57',
            ],
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265984',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Pembersihan Habitat Keong',
                'nilai_pembiayaan' => 12000000,
                'sumber_dana' => 'DAK',
                'status' => 1, // disetujui
                'tanggal_konfirmasi' => '2020-09-30',
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:17:57',
            ],
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265985',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c96',
                'sub_indikator' => 'Penyuluhan Masyarakat',
                'nilai_pembiayaan' => 8000000,
                'sumber_dana' => 'DAK',
                'status' => 1, // disetujui
                'tanggal_konfirmasi' => '2020-09-30',
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:18:57',
            ],
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265986',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'sub_indikator' => 'Mengindentifikasi Kolam terdeteksi schistosomiasis',
                'nilai_pembiayaan' => 8500000,
                'sumber_dana' => 'DAU',
                'status' => 1, // disetujui
                'tanggal_konfirmasi' => '2020-09-30',
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:19:57',
            ],
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265987',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'sub_indikator' => 'Pemusnahan Keong',
                'nilai_pembiayaan' => 1250000,
                'sumber_dana' => 'DAK',
                'status' => 1, // disetujui
                'tanggal_konfirmasi' => '2020-09-30',
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:20:57',
            ],
        ];

        PerencanaanKeong::insert($insert);
    }
}
