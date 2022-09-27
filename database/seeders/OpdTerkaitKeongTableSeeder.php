<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OpdTerkaitKeongTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('opd_terkait_keong')->delete();
        
        \DB::table('opd_terkait_keong')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'id' => '065f3675-be1d-4143-b590-562bb0edbbac',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'updated_at' => '2022-09-27 01:48:57',
            ),
            1 => 
            array (
                'created_at' => '2022-09-27 01:48:57',
                'id' => '2c58da14-d3c9-4e4d-95ac-d0664f87424d',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265987',
                'updated_at' => '2022-09-27 01:48:57',
            ),
            2 => 
            array (
                'created_at' => '2022-08-26 21:58:18',
                'id' => '49540240-c255-447e-8d13-0918eba4cf8d',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'updated_at' => '2022-08-26 21:58:18',
            ),
            3 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'id' => '60503099-fdea-49b5-8576-d590fc6e54f8',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'updated_at' => '2022-09-27 02:03:44',
            ),
            4 => 
            array (
                'created_at' => '2022-09-06 11:21:05',
                'id' => '8da5f9fa-14ab-4ba4-9256-569fc47a1fa1',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'updated_at' => '2022-09-06 11:21:05',
            ),
            5 => 
            array (
                'created_at' => '2022-09-06 11:21:05',
                'id' => 'aed2799a-cce7-4ff9-bdc4-29bbdf1168af',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_keong_id' => '5fa15403-b90f-4c7f-8c77-5076bc262028',
                'updated_at' => '2022-09-06 11:21:05',
            ),
            6 => 
            array (
                'created_at' => '2022-09-27 02:03:44',
                'id' => 'c404c3e1-df0a-47b4-b248-e5336f45966f',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'perencanaan_keong_id' => '66417cb6-4595-439d-8e67-87f292255a3c',
                'updated_at' => '2022-09-27 02:03:44',
            ),
            7 => 
            array (
                'created_at' => '2022-09-27 01:58:11',
                'id' => 'e8adc6ce-96e7-4425-96c6-d7472ea18e87',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265984',
                'updated_at' => '2022-09-27 01:58:11',
            ),
        ));
        
        
    }
}