<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OpdTerkaitHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('opd_terkait_hewan')->delete();
        
        \DB::table('opd_terkait_hewan')->insert(array (
            0 => 
            array (
                'created_at' => '2022-08-27 12:45:39',
                'id' => '001d653b-ca5d-4563-a8db-d3e4875ea4f3',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'updated_at' => '2022-08-27 12:45:39',
            ),
            1 => 
            array (
                'created_at' => '2022-08-27 12:42:00',
                'id' => '8507a835-eead-42aa-9045-a39c05a59580',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_hewan_id' => '5aabc047-e5bb-4d9c-bf0a-12ee1e88eb68',
                'updated_at' => '2022-08-27 12:42:00',
            ),
            2 => 
            array (
                'created_at' => '2022-08-27 13:09:57',
                'id' => 'dc37137c-9759-4cb9-85c1-b68f163578bf',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'updated_at' => '2022-08-27 13:09:57',
            ),
            3 => 
            array (
                'created_at' => '2022-08-27 13:43:26',
                'id' => 'e4c16759-4408-4dd3-8958-44ebebe91ee9',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'updated_at' => '2022-08-27 13:43:26',
            ),
        ));
        
        
    }
}