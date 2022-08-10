<?php

namespace Database\Seeders;

use App\Models\LokasiKeong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiKeongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            // Anca
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'Persawahan 1 Anca',
                'latitude' => '-1.275998',
                'longitude' => '120.062874',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:29:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'Persawahan 2 Anca',
                'latitude' => '-1.274303',
                'longitude' => '120.062699',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:30:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff123',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'Persawahan 3 Anca',
                'latitude' => '-1.276312',
                'longitude' => '120.047382',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:31:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff124',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'Danau 1 Anca',
                'latitude' => '-1.285152',
                'longitude' => '120.049139',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:32:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff125',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'Danau 2 Anca',
                'latitude' => '-1.285099',
                'longitude' => '120.049091',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:33:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff126',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c20',
                'nama' => 'Danau 3 Anca',
                'latitude' => '-1.285099',
                'longitude' => '120.049091',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:34:31',
            ],

            // Langko
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'nama' => 'Persawahan 1 Langko',
                'latitude' => '-1.340337',
                'longitude' => '120.022173',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:35:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'nama' => 'Persawahan 2 Langko',
                'latitude' => '-1.348963',
                'longitude' => '120.033731',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:36:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff129',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'nama' => 'Persawahan 3 Langko',
                'latitude' => '-1.350689',
                'longitude' => '120.052946',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:37:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff130',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'nama' => 'Danau 1 Langko',
                'latitude' => '-1.360244',
                'longitude' => '120.074404',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:38:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff131',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'nama' => 'Danau 2 Langko',
                'latitude' => '-1.373981',
                'longitude' => '120.108590',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:39:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff132',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c21',
                'nama' => 'Danau 3 Langko',
                'latitude' => '-1.413079',
                'longitude' => '120.083872',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:40:31',
            ],

            // Puro`o
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'Persawahan 1 Puro`o',
                'latitude' => '-1.363248',
                'longitude' => '120.022139',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:41:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'Persawahan 2 Puro`o',
                'latitude' => '-1.361946',
                'longitude' => '120.038805',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:42:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff135',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'Persawahan 3 Puro`o',
                'latitude' => '-1.368273',
                'longitude' => '120.057052',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:43:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff136',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'Danau 1 Puro`o',
                'latitude' => '-1.381542',
                'longitude' => '120.066535',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:44:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff137',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'Danau 2 Puro`o',
                'latitude' => '-1.400258',
                'longitude' => '120.054214',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:45:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff138',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c23',
                'nama' => 'Danau 3 Puro`o',
                'latitude' => '-1.403094',
                'longitude' => '120.034271',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:46:31',
            ],

            // Tomado
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'Persawahan 1 Tomado',
                'latitude' => '-1.321349',
                'longitude' => '120.119618',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:47:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'Persawahan 2 Tomado',
                'latitude' => '-1.297746',
                'longitude' => '120.158081',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:48:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff141',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'Persawahan 3 Tomado',
                'latitude' => '-1.310255',
                'longitude' => '120.212109',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:49:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff142',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'Danau 1 Tomado',
                'latitude' => '-1.337055',
                'longitude' => '120.176884',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:50:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff143',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'Danau 2 Tomado',
                'latitude' => '-1.365056',
                'longitude' => '120.210101',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:51:31',
            ],
            [
                'id' => '01b2f7f7-8743-4b93-b5af-08c79faff144',
                'desa_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c24',
                'nama' => 'Danau 3 Tomado',
                'latitude' => '-1.398095',
                'longitude' => '120.219833',
                'deskripsi' => '-',
                'status' => 1,
                'created_at' => '2020-08-10 10:52:31',
            ],
        ];

        LokasiKeong::insert($insert);
    }
}
