<?php

namespace Database\Seeders;

use App\Models\RealisasiKeong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RealisasiKeongSeeder extends Seeder
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
                'id' => '8ad0c873-fc0a-4bb6-a870-08afbb807b88',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'status' => 1, // disetujui
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:17:57',
            ],
            [
                'id' => '8ad0c873-fc0a-4bb6-a870-08afbb807b89',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265985',
                'status' => 1, // disetujui
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:18:57',
            ],
            [
                'id' => '8ad0c873-fc0a-4bb6-a870-08afbb807b90',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'status' => 1, // disetujui
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:19:57',
            ],
            [
                'id' => '8ad0c873-fc0a-4bb6-a870-08afbb807b91',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'status' => 1, // disetujui
                'alasan_ditolak' => '-',
                'created_at' => '2020-08-08 01:20:57',
            ],
        ];

        RealisasiKeong::insert($insert);
    }
}
