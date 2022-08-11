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
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'sub_indikator' => 'Pengambilan tinja siswa siswi di sekolah',
                'status' => 2, // ditolak
                'alasan_ditolak' => 'Dokumen Kurang Lengkap',
                'created_at' => '2020-08-08 01:15:57',
            ],
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265983',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'sub_indikator' => 'Penaburan Obat',
                'status' => 0, // menunggu konfirmasi
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:16:57',
            ],
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265984',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'sub_indikator' => 'Pembersihan Habitat Keong',
                'status' => 1, // disetujui
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:17:57',
            ],
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265985',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c96',
                'sub_indikator' => 'Penyuluhan Masyarakat',
                'status' => 1, // disetujui
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:18:57',
            ],
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265986',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c99',
                'sub_indikator' => 'Mengindentifikasi Kolam terdeteksi schistosomiasis',
                'status' => 1, // disetujui
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:19:57',
            ],
            [
                'id' => '76628878-af22-4ae8-be21-eaa420265987',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c99',
                'sub_indikator' => 'Pemusnahan Keong',
                'status' => 1, // disetujui
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:20:57',
            ],
        ];

        PerencanaanKeong::insert($insert);
    }
}
