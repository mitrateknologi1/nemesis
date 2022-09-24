<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => '28f36223-ad80-495b-b461-deb4075fe511',
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '',
                'role' => 'Admin',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '28f36223-ad80-495b-b461-deb4075fe512',
                'nama' => 'Dinas Kesehatan',
                'username' => 'opd1',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'role' => 'OPD',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '28f36223-ad80-495b-b461-deb4075fe513',
                'nama' => 'Dinas Kebersihan',
                'username' => 'opd2',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'role' => 'OPD',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '28f36223-ad80-495b-b461-deb4075fe514',
                'nama' => 'Dinas Sosial',
                'username' => 'opd3',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c96',
                'role' => 'OPD',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => '28f36223-ad80-495b-b461-deb4075fe515',
                'nama' => 'Dinas Kebersihan',
                'username' => 'opd4',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c97',
                'role' => 'OPD',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => '28f36223-ad80-495b-b461-deb4075fe516',
                'nama' => 'Dinas Kesehatan',
                'username' => 'opd5',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c95',
                'role' => 'OPD',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => '28f36223-ad80-495b-b461-deb4075fe517',
                'nama' => 'Dinas Pendidikan',
                'username' => 'opd6',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'role' => 'OPD',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => '28f36223-ad80-495b-b461-deb4075fe518',
                'nama' => 'Dinas Perhubungan',
                'username' => 'opd7',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b3c10',
                'role' => 'OPD',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => '28f36223-ad80-495b-b461-deb4075fe530',
                'nama' => 'Pimpinan',
                'username' => 'pimpinan',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'opd_id' => '',
                'role' => 'Pimpinan',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => '362f6136-18be-44c8-82bf-97b4d8d4e484',
                'nama' => 'Kementerian Perikanan',
                'username' => 'kementerianperikanan',
                'password' => '$2y$10$IWW.d.3SZwt/M06eKH4N6OZ4YO70R5kji0/1Rbn8zQpXCxIuNt0Eq',
                'opd_id' => NULL,
                'role' => 'Pimpinan',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2022-09-11 03:09:59',
                'updated_at' => '2022-09-11 03:10:46',
            ),
            10 => 
            array (
                'id' => '6b7e7f25-d86b-4b7f-87eb-ac6ee9e68ec5',
                'nama' => 'Kementerian Pendidikan',
                'username' => 'kementerianpendidikan',
                'password' => '$2y$10$rpOYsVgS7XNUMjeMaE3RqO5ZzOT1rfGfL0b1P1RFqbRK.OLnFlxdG',
                'opd_id' => NULL,
                'role' => 'Pimpinan',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2022-09-11 03:11:23',
                'updated_at' => '2022-09-11 03:11:23',
            ),
            11 => 
            array (
                'id' => '76f62ed6-cbd4-4396-b53a-2d50a3c0ecb4',
                'nama' => 'Kementerian Pertanian',
                'username' => 'kementerianpertanian',
                'password' => '$2y$10$Tjo.A9iGIfwzceOEBu0KX.LUck3bDSCG0DpBrYO1Ij61mn8B3v21i',
                'opd_id' => NULL,
                'role' => 'Pimpinan',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2022-09-11 03:09:35',
                'updated_at' => '2022-09-11 03:09:35',
            ),
            12 => 
            array (
                'id' => '9fc76972-8ded-410e-a300-156ab3daa4eb',
                'nama' => 'Kementerian PUPR',
                'username' => 'kementerianpupr',
                'password' => '$2y$10$gPu51WeIlvs/gyU9NDdL3ufji/m0S7Jlh8VERW/Dr3qPYUK.i1A9C',
                'opd_id' => NULL,
                'role' => 'Pimpinan',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2022-09-11 03:10:27',
                'updated_at' => '2022-09-11 03:10:58',
            ),
            13 => 
            array (
                'id' => 'a06bf6de-bd38-47a2-b222-f9ae909f576d',
                'nama' => 'Kementerian Kesehatan',
                'username' => 'kementeriankesehatan',
                'password' => '$2y$10$e09duVu73PAup/tjlOhTbedLZKjyzsiH/fcw9YZ3lddAQnATa6soS',
                'opd_id' => NULL,
                'role' => 'Pimpinan',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2022-09-11 03:09:05',
                'updated_at' => '2022-09-11 03:09:05',
            ),
            14 => 
            array (
                'id' => 'ba323466-42e0-4b22-a6bf-94859c86b0c7',
                'nama' => 'Kementerian Bapennas',
                'username' => 'kementerianbappenas',
                'password' => '$2y$10$u5x8g0R7kgUDD3Hw5CqJ7OhzM6Ex2..GAWiPyhjHG7oP.xrDkdkgy',
                'opd_id' => NULL,
                'role' => 'Pimpinan',
                'status' => 1,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2022-09-11 03:11:59',
                'updated_at' => '2022-09-11 03:11:59',
            ),
        ));
        
        
    }
}