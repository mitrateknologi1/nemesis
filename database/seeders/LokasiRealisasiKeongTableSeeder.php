<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LokasiRealisasiKeongTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lokasi_realisasi_keong')->delete();
        
        \DB::table('lokasi_realisasi_keong')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'id' => '111898f0-d4b8-45d7-a320-e65c88fa4665',
                'lokasi_keong_id' => '6c8bc624-6552-4112-aa54-b85293575969',
                'realisasi_keong_id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'status' => 1,
                'updated_at' => '2022-09-27 02:05:54',
            ),
            1 => 
            array (
                'created_at' => '2022-09-27 01:58:11',
                'id' => '12bde467-4847-4d21-a08c-1e6198499e9c',
                'lokasi_keong_id' => '6c8bc624-6552-4112-aa54-b85293575969',
                'realisasi_keong_id' => '7da6a090-4f93-4d28-b034-e3b36ed13068',
                'status' => 0,
                'updated_at' => '2022-09-27 01:58:11',
            ),
            2 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'id' => '13aff264-dbb3-4c63-af02-8fc3e1105982',
                'lokasi_keong_id' => '65454a3b-8bc6-4ec9-9c5c-c23aa2553e3e',
                'realisasi_keong_id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'status' => 1,
                'updated_at' => '2022-09-27 02:05:54',
            ),
            3 => 
            array (
                'created_at' => '2022-09-27 01:58:11',
                'id' => '153da86d-f5c2-40ac-95ba-33751d37274d',
                'lokasi_keong_id' => 'd79a69d1-817e-4854-8b84-3277edcc6824',
                'realisasi_keong_id' => '7da6a090-4f93-4d28-b034-e3b36ed13068',
                'status' => 0,
                'updated_at' => '2022-09-27 01:58:11',
            ),
            4 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'id' => '16b3226c-0637-4241-b3a6-1151ae6c2040',
                'lokasi_keong_id' => '30c5a0f7-3063-40df-ab06-2854b758c9c4',
                'realisasi_keong_id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'status' => 1,
                'updated_at' => '2022-09-27 02:05:54',
            ),
            5 => 
            array (
                'created_at' => '2022-09-27 01:58:11',
                'id' => '17deb6f2-b84e-44e5-85ad-4a8102490600',
                'lokasi_keong_id' => 'd788232e-d308-4949-8da6-2e3242040334',
                'realisasi_keong_id' => '7da6a090-4f93-4d28-b034-e3b36ed13068',
                'status' => 0,
                'updated_at' => '2022-09-27 01:58:11',
            ),
            6 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'id' => '1f3d1202-b83a-4bf2-beba-4ee216c43032',
                'lokasi_keong_id' => '6c8bc624-6552-4112-aa54-b85293575969',
                'realisasi_keong_id' => '239e5680-1ff0-44e3-85b1-8859a014b9c8',
                'status' => 2,
                'updated_at' => '2022-09-27 02:09:58',
            ),
            7 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'id' => '399bb9bc-0830-4105-b769-408669132c0f',
                'lokasi_keong_id' => 'd79a69d1-817e-4854-8b84-3277edcc6824',
                'realisasi_keong_id' => '239e5680-1ff0-44e3-85b1-8859a014b9c8',
                'status' => 2,
                'updated_at' => '2022-09-27 02:09:59',
            ),
            8 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'id' => '52117f5f-05f8-4179-aa02-700aa3578c7d',
                'lokasi_keong_id' => 'ff928f88-e7bf-4849-ac41-a090e340d28b',
                'realisasi_keong_id' => '239e5680-1ff0-44e3-85b1-8859a014b9c8',
                'status' => 2,
                'updated_at' => '2022-09-27 02:09:59',
            ),
            9 => 
            array (
                'created_at' => '2022-09-27 01:58:11',
                'id' => '5618136f-b930-4f63-be35-311d56bfe1c3',
                'lokasi_keong_id' => 'e6457d30-71c3-4cd7-84ba-957c6f9694d0',
                'realisasi_keong_id' => '7da6a090-4f93-4d28-b034-e3b36ed13068',
                'status' => 0,
                'updated_at' => '2022-09-27 01:58:11',
            ),
            10 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'id' => '62b8ed7d-f725-47ce-a37f-f1c04d6f3621',
                'lokasi_keong_id' => '40b9add6-a118-49d4-9e63-82c9539cb7bf',
                'realisasi_keong_id' => '239e5680-1ff0-44e3-85b1-8859a014b9c8',
                'status' => 2,
                'updated_at' => '2022-09-27 02:09:59',
            ),
            11 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'id' => '775c7fe6-e98f-4695-80f5-f576d0a8828e',
                'lokasi_keong_id' => '40b9add6-a118-49d4-9e63-82c9539cb7bf',
                'realisasi_keong_id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'status' => 1,
                'updated_at' => '2022-09-27 02:05:54',
            ),
            12 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'id' => '7c315eac-56a1-45f0-96af-89d5e8e1b8c9',
                'lokasi_keong_id' => '251a674d-3ff8-4dfa-94ca-baad11480f75',
                'realisasi_keong_id' => '239e5680-1ff0-44e3-85b1-8859a014b9c8',
                'status' => 2,
                'updated_at' => '2022-09-27 02:09:59',
            ),
            13 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'id' => '8a06ca60-8437-4ef2-952f-7339b781a7a7',
                'lokasi_keong_id' => '9ce72d2c-2a53-4368-ae9f-7abbf77230e3',
                'realisasi_keong_id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'status' => 1,
                'updated_at' => '2022-09-27 02:05:54',
            ),
            14 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'id' => 'af7cb744-d739-40f4-a804-5cf83b65de19',
                'lokasi_keong_id' => 'd066eb89-04de-4028-a9c2-a1377daf1440',
                'realisasi_keong_id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'status' => 1,
                'updated_at' => '2022-09-27 02:05:54',
            ),
            15 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'id' => 'bff4c2ea-44f6-4c94-b1a9-e4f794845fae',
                'lokasi_keong_id' => '30c5a0f7-3063-40df-ab06-2854b758c9c4',
                'realisasi_keong_id' => '239e5680-1ff0-44e3-85b1-8859a014b9c8',
                'status' => 2,
                'updated_at' => '2022-09-27 02:09:59',
            ),
            16 => 
            array (
                'created_at' => '2022-09-27 01:58:11',
                'id' => 'c9b766d3-0324-4fd9-bb42-3ea3df85ed97',
                'lokasi_keong_id' => '251a674d-3ff8-4dfa-94ca-baad11480f75',
                'realisasi_keong_id' => '7da6a090-4f93-4d28-b034-e3b36ed13068',
                'status' => 0,
                'updated_at' => '2022-09-27 01:58:11',
            ),
            17 => 
            array (
                'created_at' => '2022-09-27 01:58:11',
                'id' => 'ec438a8d-ba12-41ef-aa65-8b87285913c1',
                'lokasi_keong_id' => '65454a3b-8bc6-4ec9-9c5c-c23aa2553e3e',
                'realisasi_keong_id' => '7da6a090-4f93-4d28-b034-e3b36ed13068',
                'status' => 0,
                'updated_at' => '2022-09-27 01:58:11',
            ),
            18 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'id' => 'f20abf82-351d-4ce4-b912-b84366d7b8a4',
                'lokasi_keong_id' => 'd788232e-d308-4949-8da6-2e3242040334',
                'realisasi_keong_id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'status' => 1,
                'updated_at' => '2022-09-27 02:05:54',
            ),
            19 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'id' => 'f6065fee-76d4-43aa-9285-51c0d3108c9e',
                'lokasi_keong_id' => 'ff928f88-e7bf-4849-ac41-a090e340d28b',
                'realisasi_keong_id' => '335aa116-73a3-4de4-a2f9-f23d27d3016d',
                'status' => 1,
                'updated_at' => '2022-09-27 02:05:54',
            ),
            20 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'id' => 'f8afd5ac-f740-406a-9b09-250f1991955c',
                'lokasi_keong_id' => 'e6457d30-71c3-4cd7-84ba-957c6f9694d0',
                'realisasi_keong_id' => '239e5680-1ff0-44e3-85b1-8859a014b9c8',
                'status' => 2,
                'updated_at' => '2022-09-27 02:09:59',
            ),
            21 => 
            array (
                'created_at' => '2022-09-27 01:58:11',
                'id' => 'fd154d37-f2be-4666-92e0-9e6ea3b42b75',
                'lokasi_keong_id' => '30c5a0f7-3063-40df-ab06-2854b758c9c4',
                'realisasi_keong_id' => '7da6a090-4f93-4d28-b034-e3b36ed13068',
                'status' => 0,
                'updated_at' => '2022-09-27 01:58:11',
            ),
        ));
        
        
    }
}