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
                'created_at' => '2022-09-30 17:30:52',
                'id' => '22cbee4a-e1c1-46ae-83b9-1f2cef25792d',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'perencanaan_manusia_id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'updated_at' => '2022-09-30 17:30:52',
            ),
            2 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => '5212e512-41ab-4ecb-86ee-bd1d5a7e121e',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'perencanaan_manusia_id' => '00326039-0a88-495b-8670-2b9098ce4600',
                'updated_at' => '2022-09-30 17:31:20',
            ),
            3 => 
            array (
                'created_at' => '2022-08-24 23:35:20',
                'id' => '77343ab9-f3a7-480e-9f32-db8c2310fa7b',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'perencanaan_manusia_id' => '9c559147-af9e-4ce2-a414-17d2cfdd15f5',
                'updated_at' => '2022-08-24 23:35:20',
            ),
            4 => 
            array (
                'created_at' => '2022-09-30 17:30:52',
                'id' => '93374be1-b2cc-4787-ba11-ad6a14485d02',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_manusia_id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'updated_at' => '2022-09-30 17:30:52',
            ),
            5 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => '9f4b7c5a-3bb3-45d4-b2f7-7cf850425b84',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'perencanaan_manusia_id' => 'e24a52eb-b522-4a5c-a03f-3e9d89f2eab0',
                'updated_at' => '2022-09-30 18:27:13',
            ),
            6 => 
            array (
                'created_at' => '2022-08-24 23:26:52',
                'id' => 'acde66c2-1983-48a2-8964-039d35b31dfb',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c98',
                'perencanaan_manusia_id' => 'bac1eb88-fb66-4a73-b51d-2d6834470217',
                'updated_at' => '2022-08-24 23:26:52',
            ),
            7 => 
            array (
                'created_at' => '2022-08-24 23:26:52',
                'id' => 'cb55e8e6-8db9-4a7e-ad5a-d866d36a3979',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'perencanaan_manusia_id' => 'bac1eb88-fb66-4a73-b51d-2d6834470217',
                'updated_at' => '2022-08-24 23:26:52',
            ),
            8 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => 'cb9cded5-093d-4b86-8874-54145ecec120',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'perencanaan_manusia_id' => '00326039-0a88-495b-8670-2b9098ce4600',
                'updated_at' => '2022-09-30 17:31:20',
            ),
            9 => 
            array (
                'created_at' => '2022-09-30 17:30:52',
                'id' => 'd90ad8c9-f38e-479a-b5ce-a98338a21bbb',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'perencanaan_manusia_id' => 'aaa668fe-dfae-47df-9732-0d7dd22f9297',
                'updated_at' => '2022-09-30 17:30:52',
            ),
        ));
        
        
    }
}