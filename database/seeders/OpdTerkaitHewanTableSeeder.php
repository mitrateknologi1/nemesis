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
                'created_at' => '2022-09-28 16:50:44',
                'id' => '22902cae-67e2-48c3-a9d6-c493284d82c5',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'updated_at' => '2022-09-28 16:50:44',
            ),
            1 => 
            array (
                'created_at' => '2022-09-28 16:50:44',
                'id' => '27f2495f-fda5-4ba0-88fe-aef378d38d6d',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_hewan_id' => '3e6d54e2-995c-44ab-9530-47ab2b628773',
                'updated_at' => '2022-09-28 16:50:44',
            ),
            2 => 
            array (
                'created_at' => '2022-09-06 13:29:41',
                'id' => '4638d501-11c3-4ebb-a6da-c1a0c4b8211e',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'perencanaan_hewan_id' => 'c913a980-7786-4008-ae5b-62f581a35945',
                'updated_at' => '2022-09-06 13:29:41',
            ),
            3 => 
            array (
                'created_at' => '2022-09-28 17:00:13',
                'id' => '70156622-4fcc-4ebc-aafa-86b3a62bf37e',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'updated_at' => '2022-09-28 17:00:13',
            ),
            4 => 
            array (
                'created_at' => '2022-08-27 12:42:00',
                'id' => '8507a835-eead-42aa-9045-a39c05a59580',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_hewan_id' => '5aabc047-e5bb-4d9c-bf0a-12ee1e88eb68',
                'updated_at' => '2022-08-27 12:42:00',
            ),
            5 => 
            array (
                'created_at' => '2022-09-28 17:01:33',
                'id' => '9ec8292a-31f9-453b-9645-2fa11bb8e9fe',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'perencanaan_hewan_id' => 'cc85aa2c-d07b-45e9-9629-f2590f12ee63',
                'updated_at' => '2022-09-28 17:01:33',
            ),
            6 => 
            array (
                'created_at' => '2022-09-28 17:00:13',
                'id' => 'b7eb77cd-b118-4faf-86a5-f5043d90a914',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c96',
                'perencanaan_hewan_id' => '6aa72a31-194d-4363-a282-084f5e6362d3',
                'updated_at' => '2022-09-28 17:00:13',
            ),
            7 => 
            array (
                'created_at' => '2022-08-27 13:09:57',
                'id' => 'dc37137c-9759-4cb9-85c1-b68f163578bf',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_hewan_id' => '47c49fdb-370e-426c-99e9-ebe0bfe14787',
                'updated_at' => '2022-08-27 13:09:57',
            ),
        ));
        
        
    }
}