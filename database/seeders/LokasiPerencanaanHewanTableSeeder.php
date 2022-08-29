<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LokasiPerencanaanHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lokasi_perencanaan_hewan')->delete();
        
        \DB::table('lokasi_perencanaan_hewan')->insert(array (
            0 => 
            array (
                'created_at' => '2022-08-27 13:43:26',
                'id' => '0d828df2-26cf-4dd4-9cc4-4df548dec1df',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '04402e24-eb12-473f-9dfa-fd7472f38e5a',
                'status' => 1,
                'updated_at' => '2022-08-27 21:52:40',
            ),
            1 => 
            array (
                'created_at' => '2022-08-27 13:43:26',
                'id' => '0e08893f-800f-43ca-adf4-1e4160e380c7',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '31d18aa3-236a-40c5-bf62-7b30146f74c7',
                'status' => 2,
                'updated_at' => '2022-08-27 21:53:49',
            ),
            2 => 
            array (
                'created_at' => '2022-08-27 13:09:57',
                'id' => '0e32d954-d814-4099-be52-28b86ea9a254',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 13:09:57',
            ),
            3 => 
            array (
                'created_at' => '2022-08-27 13:09:57',
                'id' => '16385ae0-fb9e-460b-abed-786245e759b2',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 13:09:57',
            ),
            4 => 
            array (
                'created_at' => '2022-08-27 12:45:39',
                'id' => '1663731e-ca5d-447f-add9-686a61448b3f',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '5a81e758-96db-4419-899a-713a7e5d2a12',
                'status' => 1,
                'updated_at' => '2022-08-27 21:46:52',
            ),
            5 => 
            array (
                'created_at' => '2022-08-27 13:43:26',
                'id' => '1a4280e7-7cfc-4188-bc1b-6cf226600476',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 13:43:26',
            ),
            6 => 
            array (
                'created_at' => '2022-08-27 13:09:57',
                'id' => '20694d55-57c5-425f-99a0-587f68f37299',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 13:09:57',
            ),
            7 => 
            array (
                'created_at' => '2022-08-27 12:42:00',
                'id' => '2533b3e8-7375-4fdd-9bfe-cd4d1ed45a22',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'perencanaan_hewan_id' => '5aabc047-e5bb-4d9c-bf0a-12ee1e88eb68',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 12:42:00',
            ),
            8 => 
            array (
                'created_at' => '2022-08-27 12:45:39',
                'id' => '3d1e1330-ea9f-4321-b070-da42cbafd350',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '55c87f2e-5bb9-4784-9f91-46e6c3d839e5',
                'status' => 0,
                'updated_at' => '2022-08-27 21:48:26',
            ),
            9 => 
            array (
                'created_at' => '2022-08-27 13:43:26',
                'id' => '5d57802e-0491-4ab9-a890-fdca80e47d92',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 13:43:26',
            ),
            10 => 
            array (
                'created_at' => '2022-08-27 13:09:57',
                'id' => '6b383609-c89e-4a5a-aa07-e2e0bfa91694',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 13:09:57',
            ),
            11 => 
            array (
                'created_at' => '2022-08-27 12:45:39',
                'id' => '6b828270-d9f5-4404-9e14-0c1737be01db',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '532a089d-2f10-44d6-a9e8-ef2036c69a3c',
                'status' => 1,
                'updated_at' => '2022-08-27 21:47:35',
            ),
            12 => 
            array (
                'created_at' => '2022-08-27 13:09:57',
                'id' => '76f4d515-0a2b-4c69-99fd-168d2135cbe1',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 13:09:57',
            ),
            13 => 
            array (
                'created_at' => '2022-08-27 12:45:39',
                'id' => '827b5d8b-3a29-4fb8-8b55-869dac82a86f',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '5a81e758-96db-4419-899a-713a7e5d2a12',
                'status' => 1,
                'updated_at' => '2022-08-27 21:46:52',
            ),
            14 => 
            array (
                'created_at' => '2022-08-27 12:42:00',
                'id' => '91516d3a-bef4-4165-a05f-6f87f7f2f660',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'perencanaan_hewan_id' => '5aabc047-e5bb-4d9c-bf0a-12ee1e88eb68',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 12:42:00',
            ),
            15 => 
            array (
                'created_at' => '2022-08-27 12:45:39',
                'id' => 'c162c3a7-b283-4a26-87ba-bbe7aee758bb',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '532a089d-2f10-44d6-a9e8-ef2036c69a3c',
                'status' => 1,
                'updated_at' => '2022-08-27 21:47:35',
            ),
            16 => 
            array (
                'created_at' => '2022-08-27 12:45:39',
                'id' => 'c33709d7-ba84-4cc5-8b50-1091ad5b2014',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'realisasi_hewan_id' => '55c87f2e-5bb9-4784-9f91-46e6c3d839e5',
                'status' => 0,
                'updated_at' => '2022-08-27 21:48:26',
            ),
            17 => 
            array (
                'created_at' => '2022-08-27 13:43:26',
                'id' => 'c502669a-25c2-4a2e-9bd0-9b3b5832588f',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '31d18aa3-236a-40c5-bf62-7b30146f74c7',
                'status' => 2,
                'updated_at' => '2022-08-27 21:53:49',
            ),
            18 => 
            array (
                'created_at' => '2022-08-27 13:09:57',
                'id' => 'c99fefbf-d263-4ea2-85fd-7efb92b91ec6',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 13:09:57',
            ),
            19 => 
            array (
                'created_at' => '2022-08-27 13:43:26',
                'id' => 'd51d394a-72d3-4a8b-9e2d-03c4c9472aec',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '04402e24-eb12-473f-9dfa-fd7472f38e5a',
                'status' => 1,
                'updated_at' => '2022-08-27 21:52:40',
            ),
            20 => 
            array (
                'created_at' => '2022-08-27 13:43:26',
                'id' => 'dc6a3d88-c699-4e9d-a3d3-222f354b055d',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '04402e24-eb12-473f-9dfa-fd7472f38e5a',
                'status' => 1,
                'updated_at' => '2022-08-27 21:52:40',
            ),
            21 => 
            array (
                'created_at' => '2022-08-27 13:09:57',
                'id' => 'e62147fd-9231-4c42-af70-442fc9ab12f5',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'realisasi_hewan_id' => NULL,
                'status' => 0,
                'updated_at' => '2022-08-27 13:09:57',
            ),
            22 => 
            array (
                'created_at' => '2022-08-27 13:43:26',
                'id' => 'ee351745-fe78-460c-8823-e2bf5bd0f6de',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'realisasi_hewan_id' => '31d18aa3-236a-40c5-bf62-7b30146f74c7',
                'status' => 2,
                'updated_at' => '2022-08-27 21:53:49',
            ),
        ));
        
        
    }
}