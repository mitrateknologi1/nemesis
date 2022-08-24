<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OpdTerkaitManusiaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('opd_terkait_manusia')->delete();
        
        \DB::table('opd_terkait_manusia')->insert(array (
            0 => 
            array (
                'created_at' => '2022-08-24 23:35:20',
                'id' => '04da3e6e-ba49-43d7-99dc-80deb9b09b2a',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c99',
                'perencanaan_manusia_id' => '9c559147-af9e-4ce2-a414-17d2cfdd15f5',
                'updated_at' => '2022-08-24 23:35:20',
            ),
            1 => 
            array (
                'created_at' => '2022-08-24 23:35:20',
                'id' => '77343ab9-f3a7-480e-9f32-db8c2310fa7b',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'perencanaan_manusia_id' => '9c559147-af9e-4ce2-a414-17d2cfdd15f5',
                'updated_at' => '2022-08-24 23:35:20',
            ),
            2 => 
            array (
                'created_at' => '2022-08-24 23:26:52',
                'id' => 'acde66c2-1983-48a2-8964-039d35b31dfb',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'perencanaan_manusia_id' => 'bac1eb88-fb66-4a73-b51d-2d6834470217',
                'updated_at' => '2022-08-24 23:26:52',
            ),
            3 => 
            array (
                'created_at' => '2022-08-24 23:32:10',
                'id' => 'b82d16df-f406-41ec-ba08-f6f2d0b9590b',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'updated_at' => '2022-08-24 23:32:10',
            ),
            4 => 
            array (
                'created_at' => '2022-08-24 23:26:52',
                'id' => 'cb55e8e6-8db9-4a7e-ad5a-d866d36a3979',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_manusia_id' => 'bac1eb88-fb66-4a73-b51d-2d6834470217',
                'updated_at' => '2022-08-24 23:26:52',
            ),
            5 => 
            array (
                'created_at' => '2022-08-24 23:42:02',
                'id' => 'd4ebe05a-f695-445b-ac0e-74ef711e5286',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'perencanaan_manusia_id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'updated_at' => '2022-08-24 23:42:02',
            ),
            6 => 
            array (
                'created_at' => '2022-08-24 23:32:10',
                'id' => 'e0d25bc6-953a-4340-b4ec-94f695a10e77',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'updated_at' => '2022-08-24 23:32:10',
            ),
            7 => 
            array (
                'created_at' => '2022-08-24 23:42:02',
                'id' => 'e3730f39-b71e-48a2-9a7d-a217f9bf783c',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'perencanaan_manusia_id' => 'fc3995c2-d9bc-4a98-800b-1298f5ae1165',
                'updated_at' => '2022-08-24 23:42:02',
            ),
        ));
        
        
    }
}