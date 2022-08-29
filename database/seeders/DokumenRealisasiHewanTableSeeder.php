<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokumenRealisasiHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokumen_realisasi_hewan')->delete();
        
        \DB::table('dokumen_realisasi_hewan')->insert(array (
            0 => 
            array (
                'created_at' => '2022-08-27 21:47:25',
                'file' => '1810620822-Dokumen Realisasi Hewan 1 p-Pemberian Obat-1.pdf',
                'id' => '2843ff0b-995f-4b2f-906b-c64d1b03e4dd',
                'nama' => 'Dokumen Realisasi Hewan 1 p',
                'no_urut' => 1,
                'realisasi_hewan_id' => '532a089d-2f10-44d6-a9e8-ef2036c69a3c',
                'updated_at' => '2022-08-27 21:47:25',
            ),
            1 => 
            array (
                'created_at' => '2022-08-27 21:52:23',
                'file' => '1036761681-Dokumen Realisasi 2 r-Penyuntikan Vaksin-2.pdf',
                'id' => '423cc05a-2f38-4cb1-b2f7-82c9182bb9fb',
                'nama' => 'Dokumen Realisasi 2 r',
                'no_urut' => 2,
                'realisasi_hewan_id' => '04402e24-eb12-473f-9dfa-fd7472f38e5a',
                'updated_at' => '2022-08-27 21:52:23',
            ),
            2 => 
            array (
                'created_at' => '2022-08-27 21:45:41',
                'file' => '877742861-Dokumen Realisasi Hewan 1 r-Pemberian Obat-1.pdf',
                'id' => '4d5c8586-c0fa-44ea-8c3e-45fd3a790803',
                'nama' => 'Dokumen Realisasi Hewan 1 r',
                'no_urut' => 1,
                'realisasi_hewan_id' => '5a81e758-96db-4419-899a-713a7e5d2a12',
                'updated_at' => '2022-08-27 21:45:41',
            ),
            3 => 
            array (
                'created_at' => '2022-08-27 21:48:26',
                'file' => '1025561681-Dokumen Realisasi Hewan 1 g-Pemberian Obat-1.pdf',
                'id' => '696c29b0-f709-4d56-b84f-848dfda7471a',
                'nama' => 'Dokumen Realisasi Hewan 1 g',
                'no_urut' => 1,
                'realisasi_hewan_id' => '55c87f2e-5bb9-4784-9f91-46e6c3d839e5',
                'updated_at' => '2022-08-27 21:48:26',
            ),
            4 => 
            array (
                'created_at' => '2022-08-27 21:53:29',
                'file' => '177237535-Dokumen Realisasi 1 r-Penyuntikan Vaksin-1.pdf',
                'id' => 'd50bc10a-ac1e-4716-839b-97a3cca8d05f',
                'nama' => 'Dokumen Realisasi 1 r',
                'no_urut' => 1,
                'realisasi_hewan_id' => '31d18aa3-236a-40c5-bf62-7b30146f74c7',
                'updated_at' => '2022-08-27 21:53:29',
            ),
            5 => 
            array (
                'created_at' => '2022-08-27 21:52:23',
                'file' => '419405709-Dokumen Realisasi 1 b-Penyuntikan Vaksin-1.pdf',
                'id' => 'e102c646-5eac-49f8-a345-8588457d855c',
                'nama' => 'Dokumen Realisasi 1 b',
                'no_urut' => 1,
                'realisasi_hewan_id' => '04402e24-eb12-473f-9dfa-fd7472f38e5a',
                'updated_at' => '2022-08-27 21:52:23',
            ),
            6 => 
            array (
                'created_at' => '2022-08-27 21:48:26',
                'file' => '1995816146-Dokumen Realisasi Hewan 1 r-Pemberian Obat-2.pdf',
                'id' => 'e4f6791f-3af2-4623-a707-7c1e4d50ce10',
                'nama' => 'Dokumen Realisasi Hewan 1 r',
                'no_urut' => 2,
                'realisasi_hewan_id' => '55c87f2e-5bb9-4784-9f91-46e6c3d839e5',
                'updated_at' => '2022-08-27 21:48:26',
            ),
            7 => 
            array (
                'created_at' => '2022-08-27 21:45:41',
                'file' => '675708300-Dokumen Realisasi Hewan 2 b-Pemberian Obat-2.pdf',
                'id' => 'fd57d726-3c57-42f4-8d2b-8b1c8ae74c6a',
                'nama' => 'Dokumen Realisasi Hewan 2 b',
                'no_urut' => 2,
                'realisasi_hewan_id' => '5a81e758-96db-4419-899a-713a7e5d2a12',
                'updated_at' => '2022-08-27 21:45:41',
            ),
        ));
        
        
    }
}