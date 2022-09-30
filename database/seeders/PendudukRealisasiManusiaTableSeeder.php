<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PendudukRealisasiManusiaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('penduduk_realisasi_manusia')->delete();
        
        \DB::table('penduduk_realisasi_manusia')->insert(array (
            0 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => '0b296e79-e776-4c7f-ae8a-68d184510b61',
                'penduduk_id' => '3eb9e4ce-7073-43f4-b97f-9d0e3be9a009',
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'status' => 0,
                'updated_at' => '2022-09-30 18:27:13',
            ),
            1 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => '0d47cc2e-e46f-4133-819f-35d555351d2a',
                'penduduk_id' => '4724d68e-0dc8-494c-a44e-47d566dc8a50',
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'status' => 2,
                'updated_at' => '2022-09-30 17:32:07',
            ),
            2 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => '185a2faf-20ee-48a9-a4b0-3d20bd8c1025',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d09',
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'status' => 2,
                'updated_at' => '2022-09-30 17:32:07',
            ),
            3 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => '1d49678a-b33f-4364-a045-e5cb7a13ae3b',
                'penduduk_id' => 'd4bf9113-2458-4b69-89e3-10fc2ec278cd',
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'status' => 0,
                'updated_at' => '2022-09-30 18:27:13',
            ),
            4 => 
            array (
                'created_at' => '2022-09-30 17:37:55',
                'id' => '20db704d-b0f8-4843-af78-6b61f8a91032',
                'penduduk_id' => 'c526b024-f5f6-41ab-9685-9a46638522e8',
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'status' => 1,
                'updated_at' => '2022-09-30 17:37:55',
            ),
            5 => 
            array (
                'created_at' => '2022-09-30 17:37:54',
                'id' => '27ac6843-586f-4ccf-97f7-d95e64b45b3c',
                'penduduk_id' => '6b34f2a2-26db-4ba5-a8a2-4a6972acfc6c',
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'status' => 1,
                'updated_at' => '2022-09-30 17:37:54',
            ),
            6 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => '28eaa304-9a26-4772-a5c8-0c77469e1037',
                'penduduk_id' => '49a55e3b-ec87-4628-ad94-d2798b3e59c5',
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'status' => 2,
                'updated_at' => '2022-09-30 17:32:07',
            ),
            7 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => '31037a45-05d1-4471-ae8a-2fdbf8465c06',
                'penduduk_id' => '54b98ef9-b272-4b32-8d96-ed111d64f612',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            8 => 
            array (
                'created_at' => '2022-09-30 17:37:54',
                'id' => '3428b9f8-0be5-4775-bbc2-e8123dfbf10f',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d09',
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'status' => 1,
                'updated_at' => '2022-09-30 17:37:54',
            ),
            9 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => '3b9b75a2-3095-4882-9e1e-d3cc7e26b795',
                'penduduk_id' => '3c866d7b-6669-41f9-b14c-91c18ae4d1e1',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            10 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => '3c4b39ad-de96-4572-8023-a66787e6cbe5',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d08',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            11 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => '3dafe822-88ec-4ecd-828e-9ab3d4925359',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d08',
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'status' => 0,
                'updated_at' => '2022-09-30 18:27:13',
            ),
            12 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => '44fcda8a-df31-4a41-8fcb-20f426a6c770',
                'penduduk_id' => 'd0acfbdc-3917-4938-bf4e-d29ac5b29f2d',
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'status' => 2,
                'updated_at' => '2022-09-30 17:32:07',
            ),
            13 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => '45559fb0-010f-48a0-b7cd-3292f0f9c270',
                'penduduk_id' => '10dca7a8-f238-47f3-863a-b39c5a5a110c',
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'status' => 2,
                'updated_at' => '2022-09-30 17:32:07',
            ),
            14 => 
            array (
                'created_at' => '2022-09-30 17:37:54',
                'id' => '47895e5e-1cb5-44ba-a527-8077dbadaeb9',
                'penduduk_id' => '54b98ef9-b272-4b32-8d96-ed111d64f612',
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'status' => 1,
                'updated_at' => '2022-09-30 17:37:54',
            ),
            15 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => '5034cf40-c7f9-42bf-8a0d-4f20e283da64',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d09',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            16 => 
            array (
                'created_at' => '2022-09-30 17:37:55',
                'id' => '53bde4e7-5884-4848-99e3-3837d9c2eae5',
                'penduduk_id' => '06fe877b-6e71-4406-a84b-0989134fe538',
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'status' => 1,
                'updated_at' => '2022-09-30 17:37:55',
            ),
            17 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => '64adccef-1308-4fb7-83b4-3dbd268301f6',
                'penduduk_id' => '06fe877b-6e71-4406-a84b-0989134fe538',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            18 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => '66f8d6f8-5b73-4a23-a5fd-2111712ff15c',
                'penduduk_id' => 'f95f0c59-0fb9-4b7d-8786-51e1d7a4ae92',
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'status' => 0,
                'updated_at' => '2022-09-30 18:27:13',
            ),
            19 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => '68ca9053-9355-49bd-8bdb-fccd050051a1',
                'penduduk_id' => '54b98ef9-b272-4b32-8d96-ed111d64f612',
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'status' => 0,
                'updated_at' => '2022-09-30 18:27:13',
            ),
            20 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => '6e6f9097-e0ba-46e6-885d-51f25cb9393b',
                'penduduk_id' => 'c526b024-f5f6-41ab-9685-9a46638522e8',
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'status' => 0,
                'updated_at' => '2022-09-30 18:27:13',
            ),
            21 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => '6fba84d2-054a-4ce4-8073-a29399059091',
                'penduduk_id' => '54b98ef9-b272-4b32-8d96-ed111d64f612',
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'status' => 2,
                'updated_at' => '2022-09-30 17:32:07',
            ),
            22 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => '71ba6047-1021-422e-947c-86af7ff2df04',
                'penduduk_id' => '4724d68e-0dc8-494c-a44e-47d566dc8a50',
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'status' => 0,
                'updated_at' => '2022-09-30 18:27:13',
            ),
            23 => 
            array (
                'created_at' => '2022-09-30 17:37:54',
                'id' => '776a301c-aab9-4fba-a4f0-8ac9451deee6',
                'penduduk_id' => '78f7042a-b367-4fe7-9637-2e7f29e0ba65',
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'status' => 1,
                'updated_at' => '2022-09-30 17:37:54',
            ),
            24 => 
            array (
                'created_at' => '2022-09-30 17:37:54',
                'id' => '77f8a275-1790-4a17-a43c-d65df476be80',
                'penduduk_id' => 'd0acfbdc-3917-4938-bf4e-d29ac5b29f2d',
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'status' => 1,
                'updated_at' => '2022-09-30 17:37:54',
            ),
            25 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => '79a49551-47bc-4b67-afd3-fe97c77fc3e7',
                'penduduk_id' => '6b34f2a2-26db-4ba5-a8a2-4a6972acfc6c',
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'status' => 2,
                'updated_at' => '2022-09-30 17:32:07',
            ),
            26 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => '7a75dd57-0afe-46a8-9d29-f5fbfc32508e',
                'penduduk_id' => '8e691ecd-1d24-4eb1-bf52-4e74d115830b',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            27 => 
            array (
                'created_at' => '2022-09-30 17:37:54',
                'id' => '7bc6b1f2-eaf3-4193-8a0a-cb38637e9fde',
                'penduduk_id' => 'd4bf9113-2458-4b69-89e3-10fc2ec278cd',
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'status' => 1,
                'updated_at' => '2022-09-30 17:37:54',
            ),
            28 => 
            array (
                'created_at' => '2022-09-30 17:37:54',
                'id' => '7df88b42-0632-4250-8285-2e491929efe7',
                'penduduk_id' => '10dca7a8-f238-47f3-863a-b39c5a5a110c',
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'status' => 1,
                'updated_at' => '2022-09-30 17:37:54',
            ),
            29 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => '8ab4f307-040e-4615-9334-dfe8bc216905',
                'penduduk_id' => '3eb9e4ce-7073-43f4-b97f-9d0e3be9a009',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            30 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => '8cff1c0c-4f88-4b51-bbcc-7436b9eab459',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d08',
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'status' => 2,
                'updated_at' => '2022-09-30 17:32:07',
            ),
            31 => 
            array (
                'created_at' => '2022-09-30 17:37:54',
                'id' => '939770ef-505b-4ca0-a1c8-f80f9244206b',
                'penduduk_id' => '3eb9e4ce-7073-43f4-b97f-9d0e3be9a009',
                'realisasi_manusia_id' => '3a763c42-9803-42c8-9b20-ecde975d72cf',
                'status' => 1,
                'updated_at' => '2022-09-30 17:37:54',
            ),
            32 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => '9e8860fd-04e1-4f33-8403-f97075659bc7',
                'penduduk_id' => '49a55e3b-ec87-4628-ad94-d2798b3e59c5',
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'status' => 0,
                'updated_at' => '2022-09-30 18:27:13',
            ),
            33 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => 'ad181f89-f926-454f-bc1b-9288a368cff6',
                'penduduk_id' => '6b34f2a2-26db-4ba5-a8a2-4a6972acfc6c',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            34 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => 'b0f78221-f49b-46e2-a8bb-09cfbab3411c',
                'penduduk_id' => '78f7042a-b367-4fe7-9637-2e7f29e0ba65',
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'status' => 2,
                'updated_at' => '2022-09-30 17:32:07',
            ),
            35 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => 'c4815ade-fdac-4391-8124-45a82aae22bf',
                'penduduk_id' => '4101f988-0d42-4db4-bfcd-33c6627e30de',
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'status' => 0,
                'updated_at' => '2022-09-30 18:27:13',
            ),
            36 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => 'd2f99f51-6bb1-4ef7-8c87-a85fcc06a097',
                'penduduk_id' => '4101f988-0d42-4db4-bfcd-33c6627e30de',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            37 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => 'd5276977-fadd-4a8c-b797-ad3d0e60ff5f',
                'penduduk_id' => '56b22993-63d6-4252-876f-5afcfc5207ae',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            38 => 
            array (
                'created_at' => '2022-09-30 18:27:13',
                'id' => 'e92b4cbd-b649-419a-ac75-5e702b35a893',
                'penduduk_id' => '0065b51c-49c0-4e81-a3b3-a6b4e21b4d09',
                'realisasi_manusia_id' => 'ffd8282d-3b7a-4fbf-b26e-0da71f5aa0fe',
                'status' => 0,
                'updated_at' => '2022-09-30 18:27:13',
            ),
            39 => 
            array (
                'created_at' => '2022-09-30 17:00:35',
                'id' => 'f92fbb74-81d7-48e8-8788-e0ef5f5dd615',
                'penduduk_id' => '49a55e3b-ec87-4628-ad94-d2798b3e59c5',
                'realisasi_manusia_id' => 'db868f1f-557d-4910-9648-db75a3bdab10',
                'status' => 1,
                'updated_at' => '2022-09-30 17:00:35',
            ),
            40 => 
            array (
                'created_at' => '2022-09-30 17:31:20',
                'id' => 'fed7b948-0eff-470e-a4cb-517aa698c030',
                'penduduk_id' => 'd4bf9113-2458-4b69-89e3-10fc2ec278cd',
                'realisasi_manusia_id' => '151a369c-2447-4d39-90e9-34b0808e60ab',
                'status' => 2,
                'updated_at' => '2022-09-30 17:32:07',
            ),
        ));
        
        
    }
}