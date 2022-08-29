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
                'created_at' => '2022-08-26 21:58:18',
                'id' => '49540240-c255-447e-8d13-0918eba4cf8d',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'perencanaan_keong_id' => '76628878-af22-4ae8-be21-eaa420265986',
                'updated_at' => '2022-08-26 21:58:18',
            ),
        ));
        
        
    }
}