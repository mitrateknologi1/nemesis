<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LokasiRealisasiHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lokasi_realisasi_hewan')->delete();
        
        \DB::table('lokasi_realisasi_hewan')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-28 17:01:33',
                'id' => '19633dc6-0be5-4c32-9f16-e014bf730beb',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'realisasi_hewan_id' => 'b6aafe00-d0ec-4348-ae3b-92aeaeb5a57c',
                'status' => 1,
                'updated_at' => '2022-09-28 17:01:33',
            ),
            1 => 
            array (
                'created_at' => '2022-09-28 17:01:33',
                'id' => '25847415-4bb4-4d63-88b8-56f4565c62fa',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'realisasi_hewan_id' => 'b6aafe00-d0ec-4348-ae3b-92aeaeb5a57c',
                'status' => 1,
                'updated_at' => '2022-09-28 17:01:33',
            ),
            2 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'id' => '27072a4f-ef35-4522-99ed-cbe6a371ee2a',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'realisasi_hewan_id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'status' => 2,
                'updated_at' => '2022-09-28 16:53:16',
            ),
            3 => 
            array (
                'created_at' => '2022-09-28 17:00:13',
                'id' => '2dfd7339-c008-45a0-9819-dbe8b5cb37b9',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'realisasi_hewan_id' => '9cf0b85c-9378-4492-973c-8db2d4ef27cd',
                'status' => 0,
                'updated_at' => '2022-09-28 17:00:13',
            ),
            4 => 
            array (
                'created_at' => '2022-09-28 17:00:13',
                'id' => '4229d6a1-3ffd-402c-8bc8-84e75e4a4528',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'realisasi_hewan_id' => '9cf0b85c-9378-4492-973c-8db2d4ef27cd',
                'status' => 0,
                'updated_at' => '2022-09-28 17:00:13',
            ),
            5 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'id' => '422aa437-f109-4c7f-abca-7df24f4e535a',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff128',
                'realisasi_hewan_id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'status' => 2,
                'updated_at' => '2022-09-28 16:53:16',
            ),
            6 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'id' => '45921017-a92a-4cb0-97e3-fb3be7dc5978',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'realisasi_hewan_id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'status' => 2,
                'updated_at' => '2022-09-28 16:53:16',
            ),
            7 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'id' => '58257ab3-9721-49b8-8fbb-d911babfb738',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'realisasi_hewan_id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'status' => 2,
                'updated_at' => '2022-09-28 16:53:16',
            ),
            8 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'id' => '60e26fe5-4cb3-4bc6-9981-1d03cde7a92e',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'realisasi_hewan_id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'status' => 2,
                'updated_at' => '2022-09-28 16:53:16',
            ),
            9 => 
            array (
                'created_at' => '2022-09-28 17:00:13',
                'id' => '6cb726e7-beef-4516-a1ae-3fb76f237ccd',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'realisasi_hewan_id' => '9cf0b85c-9378-4492-973c-8db2d4ef27cd',
                'status' => 0,
                'updated_at' => '2022-09-28 17:00:13',
            ),
            10 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'id' => '73e05268-bbd5-440d-92b7-04a4dbbbea89',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff121',
                'realisasi_hewan_id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'status' => 2,
                'updated_at' => '2022-09-28 16:53:16',
            ),
            11 => 
            array (
                'created_at' => '2022-09-28 17:01:33',
                'id' => '7e4f50b3-f5c4-4422-9744-e75510de41ed',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff140',
                'realisasi_hewan_id' => 'b6aafe00-d0ec-4348-ae3b-92aeaeb5a57c',
                'status' => 1,
                'updated_at' => '2022-09-28 17:01:33',
            ),
            12 => 
            array (
                'created_at' => '2022-09-28 17:01:33',
                'id' => '8081897a-02e7-4036-b980-db98aede34c2',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff122',
                'realisasi_hewan_id' => 'b6aafe00-d0ec-4348-ae3b-92aeaeb5a57c',
                'status' => 1,
                'updated_at' => '2022-09-28 17:01:33',
            ),
            13 => 
            array (
                'created_at' => '2022-09-28 17:00:13',
                'id' => '8946364a-1d78-4908-b31c-e9bae7f14783',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'realisasi_hewan_id' => '9cf0b85c-9378-4492-973c-8db2d4ef27cd',
                'status' => 0,
                'updated_at' => '2022-09-28 17:00:13',
            ),
            14 => 
            array (
                'created_at' => '2022-09-28 17:01:33',
                'id' => '92c50d07-86c9-4202-8698-f7850b4a9a05',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'realisasi_hewan_id' => 'b6aafe00-d0ec-4348-ae3b-92aeaeb5a57c',
                'status' => 1,
                'updated_at' => '2022-09-28 17:01:33',
            ),
            15 => 
            array (
                'created_at' => '2022-09-28 17:00:13',
                'id' => 'b0f5fb6c-7d4a-4c45-a2bf-1d316a34063c',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'realisasi_hewan_id' => '9cf0b85c-9378-4492-973c-8db2d4ef27cd',
                'status' => 0,
                'updated_at' => '2022-09-28 17:00:13',
            ),
            16 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'id' => 'bd97e0fc-c8d0-4bcd-8870-27bea5590848',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'realisasi_hewan_id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'status' => 2,
                'updated_at' => '2022-09-28 16:53:16',
            ),
            17 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'id' => 'cb1a9363-cc75-4f1b-bd6a-cb3483518937',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff133',
                'realisasi_hewan_id' => '2eab6661-0943-4541-8505-71795e4e323b',
                'status' => 2,
                'updated_at' => '2022-09-28 16:53:16',
            ),
            18 => 
            array (
                'created_at' => '2022-09-28 17:00:13',
                'id' => 'da130abe-4ce4-4b5b-8a6f-4851ed392013',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff139',
                'realisasi_hewan_id' => '9cf0b85c-9378-4492-973c-8db2d4ef27cd',
                'status' => 0,
                'updated_at' => '2022-09-28 17:00:13',
            ),
            19 => 
            array (
                'created_at' => '2022-09-28 17:01:33',
                'id' => 'f92fa104-eb6f-4aba-a2c3-5c957283c161',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff134',
                'realisasi_hewan_id' => 'b6aafe00-d0ec-4348-ae3b-92aeaeb5a57c',
                'status' => 1,
                'updated_at' => '2022-09-28 17:01:33',
            ),
            20 => 
            array (
                'created_at' => '2022-09-28 17:01:33',
                'id' => 'fd0751b5-23b1-4c5c-b00d-a858eafe778a',
                'lokasi_hewan_id' => '01b2f7f7-8743-4b93-b5af-08c79faff127',
                'realisasi_hewan_id' => 'b6aafe00-d0ec-4348-ae3b-92aeaeb5a57c',
                'status' => 1,
                'updated_at' => '2022-09-28 17:01:33',
            ),
        ));
        
        
    }
}