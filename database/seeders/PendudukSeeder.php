<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d01',
                'nama' => 'Soony Moore',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d02',
                'nama' => 'Diplo',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d03',
                'nama' => 'Martin',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d04',
                'nama' => 'Garrix',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d05',
                'nama' => 'Snake',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d06',
                'nama' => 'Casillas',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d07',
                'nama' => 'Marcelo',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c22',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d08',
                'nama' => 'Anton',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c22',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d09',
                'nama' => 'Abdul',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c22',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d10',
                'nama' => 'Reyna',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d11',
                'nama' => 'Sova',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d12',
                'nama' => 'Neon',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d13',
                'nama' => 'Jordison',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d14',
                'nama' => 'Isco',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => Carbon::now()
            ],
            [
                'id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d15',
                'nama' => 'Zelda',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('penduduk')->insert($data);
    }
}
