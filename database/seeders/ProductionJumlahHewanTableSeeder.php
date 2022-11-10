<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductionJumlahHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jumlah_hewan')->delete();
        
        \DB::table('jumlah_hewan')->insert(array (
            0 => 
            array (
                'id' => '06851f5d-6946-418d-8530-e4d63da9505b',
                'lokasi_hewan_id' => '2869c712-b08d-4267-be1f-fcced029152c',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:16:09',
                'updated_at' => '2022-10-21 20:16:09',
            ),
            1 => 
            array (
                'id' => '0894a718-6d54-4ebe-89e5-517a532fdf51',
                'lokasi_hewan_id' => '4b61c091-654f-4247-a86c-a4d76301ed04',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:46:47',
                'updated_at' => '2022-10-21 20:46:47',
            ),
            2 => 
            array (
                'id' => '1a47c9b3-d60b-4fa9-b498-5d3e62e40128',
                'lokasi_hewan_id' => '16c73fb6-f254-4c24-86ca-84389f405a2d',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '5',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:56:12',
                'updated_at' => '2022-10-21 19:56:12',
            ),
            3 => 
            array (
                'id' => '271ff291-ab3c-4193-b2e6-e8adde4e0086',
                'lokasi_hewan_id' => '162f0076-aa6c-49d3-910f-506928439fc4',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:35:55',
                'updated_at' => '2022-10-21 20:35:55',
            ),
            4 => 
            array (
                'id' => '336e19a0-64c5-4633-9e49-f1da09c2ec6f',
                'lokasi_hewan_id' => '891c0b08-d002-4abc-8ab9-b7a371a4b8dd',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:55:13',
                'updated_at' => '2022-10-21 14:55:13',
            ),
            5 => 
            array (
                'id' => '3373b411-53a0-4465-83eb-3fe6aee3eb47',
                'lokasi_hewan_id' => 'f191b086-9b22-4dc0-a1aa-ebbfb8144abe',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:37:49',
                'updated_at' => '2022-10-21 20:37:49',
            ),
            6 => 
            array (
                'id' => '3414330d-c18a-4324-bc2c-a4c174ce131b',
                'lokasi_hewan_id' => '4820d004-b03b-43bb-a662-5476b36b5268',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:54:31',
                'updated_at' => '2022-10-21 14:54:31',
            ),
            7 => 
            array (
                'id' => '3541443d-9abe-4376-ac5f-0c58db2afef7',
                'lokasi_hewan_id' => '66284472-a4d6-4135-8efc-c32df0b9772b',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:43:35',
                'updated_at' => '2022-10-21 20:43:35',
            ),
            8 => 
            array (
                'id' => '4381833b-240b-4d4e-800c-6f5babe539c2',
                'lokasi_hewan_id' => 'dfcf92f5-e31d-48c1-8e0a-ace7add43e20',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '6',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:34:25',
                'updated_at' => '2022-10-21 20:34:25',
            ),
            9 => 
            array (
                'id' => '48b9b92f-adfd-4323-afcb-8353be1e5977',
                'lokasi_hewan_id' => '1acd27eb-ee07-42fa-86fe-0d3557e7bf88',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:55:33',
                'updated_at' => '2022-10-21 19:55:33',
            ),
            10 => 
            array (
                'id' => '535ed0e0-abc0-4557-8ec0-de433af65988',
                'lokasi_hewan_id' => '36284a26-900a-4836-9680-5c46076ad472',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:56:42',
                'updated_at' => '2022-10-21 14:56:42',
            ),
            11 => 
            array (
                'id' => '5d2e0154-9f6e-4129-8f3e-b6a3cbd7fda0',
                'lokasi_hewan_id' => '9070d9bd-0d0e-40fb-b192-fe514f8986f3',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:28:43',
                'updated_at' => '2022-10-21 20:28:43',
            ),
            12 => 
            array (
                'id' => '678fc19f-c177-47e6-a93a-9a50e4a20a7f',
                'lokasi_hewan_id' => 'af36f573-0f93-4228-bc55-828de6fadaea',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:46:09',
                'updated_at' => '2022-10-21 20:46:09',
            ),
            13 => 
            array (
                'id' => '6905a446-938d-47a5-985e-9aeec78447a1',
                'lokasi_hewan_id' => '6a514fdc-fe8a-46d8-abdf-d7d4f1b01541',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:05:52',
                'updated_at' => '2022-10-21 20:05:52',
            ),
            14 => 
            array (
                'id' => '6bbb8bc3-2bbb-4d69-8390-72e3d318269d',
                'lokasi_hewan_id' => '064913e9-f4e9-426d-8751-4b0df1821eba',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:50:17',
                'updated_at' => '2022-10-21 19:50:17',
            ),
            15 => 
            array (
                'id' => '7290ab4a-3b5b-4cb3-8f3f-75610d9ffeb5',
                'lokasi_hewan_id' => 'e38b11df-6e58-45d9-8124-b7799d187ae6',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:51:36',
                'updated_at' => '2022-10-21 19:51:36',
            ),
            16 => 
            array (
                'id' => '72d20c4e-27dc-42b1-92fa-81959f44e3f7',
                'lokasi_hewan_id' => '8622d87c-41fc-462c-92a8-f63b5af08ce9',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:41:02',
                'updated_at' => '2022-10-21 20:41:02',
            ),
            17 => 
            array (
                'id' => '73ae283b-7a51-4bca-ae2a-54d624c0521a',
                'lokasi_hewan_id' => 'ee5d8ebc-1195-4002-a2b4-5b30f27aab6c',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:19:36',
                'updated_at' => '2022-10-21 20:19:36',
            ),
            18 => 
            array (
                'id' => '804fee29-6b48-4019-be7b-102e4700bde2',
                'lokasi_hewan_id' => '1dffb3ba-07a6-4e06-a54d-37600429618f',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:44:04',
                'updated_at' => '2022-10-21 20:44:04',
            ),
            19 => 
            array (
                'id' => '8829fedb-ec1e-4851-8f62-21aa3b2138a5',
                'lokasi_hewan_id' => '0de5cd04-645b-455d-9c66-8dbc4c7b190f',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:43:04',
                'updated_at' => '2022-10-21 20:43:04',
            ),
            20 => 
            array (
                'id' => '8c5c81e4-2f29-49e4-8781-6f60143f77cc',
                'lokasi_hewan_id' => 'a33d7f6c-abe1-46ba-b545-5ca7aa738e01',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:54:29',
                'updated_at' => '2022-10-21 19:54:29',
            ),
            21 => 
            array (
                'id' => '8fa3c429-ae6a-40ab-9cb9-4756175e1039',
                'lokasi_hewan_id' => 'ef35ae57-76af-4cbb-ba8b-1a25efdbaefc',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:05:06',
                'updated_at' => '2022-10-21 20:05:06',
            ),
            22 => 
            array (
                'id' => '943bf816-f4a0-4108-b05c-906e8cfbed9c',
                'lokasi_hewan_id' => 'a23efbdd-6581-4992-a7e7-69a5846808e0',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:49:28',
                'updated_at' => '2022-10-21 19:49:28',
            ),
            23 => 
            array (
                'id' => '95634a23-fd7e-4e13-82dd-26f9769872a4',
                'lokasi_hewan_id' => '13a7e0b5-2939-4604-b0db-2f7371564ac0',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '0',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:27:47',
                'updated_at' => '2022-10-21 20:27:47',
            ),
            24 => 
            array (
                'id' => '99c83242-834e-4d00-94f7-ecbe1369708c',
                'lokasi_hewan_id' => 'ee59f14d-388b-4a91-ba69-483d8cbd8c67',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:52:52',
                'updated_at' => '2022-10-21 19:52:52',
            ),
            25 => 
            array (
                'id' => '9b0258d5-ca13-4ad9-bef0-f0454a503225',
                'lokasi_hewan_id' => '9d559484-19f8-4461-9744-646513c39a03',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:42:32',
                'updated_at' => '2022-10-21 20:42:32',
            ),
            26 => 
            array (
                'id' => '9fbcaa93-bfeb-4c79-b3e8-7dd4dc0c1966',
                'lokasi_hewan_id' => '7cb2880a-6239-4d39-a2c0-7a39d01bc456',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:39:49',
                'updated_at' => '2022-10-21 20:39:49',
            ),
            27 => 
            array (
                'id' => 'a28dc247-78fc-4092-9b6f-0c5e15b28bdf',
                'lokasi_hewan_id' => 'f4d24852-1f31-4b8f-bfd9-984e22c49c36',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:32:45',
                'updated_at' => '2022-10-21 20:32:45',
            ),
            28 => 
            array (
                'id' => 'a4017d7d-f5cd-4cbb-982f-e07ea0ca41c7',
                'lokasi_hewan_id' => 'bdd257ad-fad9-4ffd-be7c-7337d81409c3',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:09:42',
                'updated_at' => '2022-10-21 20:09:42',
            ),
            29 => 
            array (
                'id' => 'a5c8363c-41fe-4d7d-a44c-c2f24eaed210',
                'lokasi_hewan_id' => '890c08a0-ca79-44bb-87af-dcbba4bb18b1',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:50:52',
                'updated_at' => '2022-10-21 19:50:52',
            ),
            30 => 
            array (
                'id' => 'a720bf32-df94-49b8-bf8f-31e984f06219',
                'lokasi_hewan_id' => 'f84f9e8d-8d26-4829-8ff0-0143e1ed0165',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:53:41',
                'updated_at' => '2022-10-21 19:53:41',
            ),
            31 => 
            array (
                'id' => 'aa6b019c-c422-4911-8435-bf5962d38be7',
                'lokasi_hewan_id' => 'ef35ae57-76af-4cbb-ba8b-1a25efdbaefc',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:25:43',
                'updated_at' => '2022-10-21 20:25:43',
            ),
            32 => 
            array (
                'id' => 'b8dc36ec-ee49-4f5d-b99d-91203f8354dd',
                'lokasi_hewan_id' => '9e300225-3ee5-4162-b961-b5541c5b9c22',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:37:05',
                'updated_at' => '2022-10-21 20:37:05',
            ),
            33 => 
            array (
                'id' => 'c10e5e72-5fc9-4f29-8dfa-961584182b6e',
                'lokasi_hewan_id' => 'dbbce63b-71df-421f-870c-dad9c557bddf',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:57:35',
                'updated_at' => '2022-10-21 14:57:35',
            ),
            34 => 
            array (
                'id' => 'c6543e95-016c-4149-ab39-1128e304ef89',
                'lokasi_hewan_id' => '69ef7267-f028-4898-8ad6-8547971d2611',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:54:59',
                'updated_at' => '2022-10-21 19:54:59',
            ),
            35 => 
            array (
                'id' => 'c69173ea-be18-42b4-a1fe-218495a519af',
                'lokasi_hewan_id' => '24dfd08f-4ed0-4c73-bd1e-c9195f76f73b',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:45:29',
                'updated_at' => '2022-10-21 20:45:29',
            ),
            36 => 
            array (
                'id' => 'ca6b7599-ef22-4bf9-b6ad-0f08798956e2',
                'lokasi_hewan_id' => 'b7e1447f-1c35-403d-abca-0524183db062',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:29:13',
                'updated_at' => '2022-10-21 20:29:13',
            ),
            37 => 
            array (
                'id' => 'ccbee7e8-0a61-4164-8cf6-f184e8c869b7',
                'lokasi_hewan_id' => '8ea1f176-8241-40aa-b7e8-da06e18f7105',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:12:45',
                'updated_at' => '2022-10-21 20:12:45',
            ),
            38 => 
            array (
                'id' => 'd2809031-5263-49e5-8f89-841b42ecc905',
                'lokasi_hewan_id' => '3b470bcb-740b-4cbe-bb25-2ec1ffda1a36',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:27:07',
                'updated_at' => '2022-10-21 20:27:07',
            ),
            39 => 
            array (
                'id' => 'd883c73c-869a-4d1c-814d-19d2596adbef',
                'lokasi_hewan_id' => 'fcfb1a77-1b2e-4750-8a34-e6e4e5ab91f9',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:40:30',
                'updated_at' => '2022-10-21 20:40:30',
            ),
            40 => 
            array (
                'id' => 'e3054bca-b4d4-4e66-b2cb-0e123a72cea6',
                'lokasi_hewan_id' => '3ef5c674-ec9f-48e9-bd50-3aa5ff0a0271',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:17:18',
                'updated_at' => '2022-10-21 20:17:18',
            ),
            41 => 
            array (
                'id' => 'e5f04c6a-03a8-43a0-bc67-342cc0dc3464',
                'lokasi_hewan_id' => 'f1f322a1-43be-44d4-8972-41ecb0348b36',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:23:26',
                'updated_at' => '2022-10-21 20:23:26',
            ),
            42 => 
            array (
                'id' => 'ee6a22d7-55e7-4ebd-b5b0-c31484d499f8',
                'lokasi_hewan_id' => '3fc74fe1-bc66-41b1-9646-c422596c0276',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:22:41',
                'updated_at' => '2022-10-21 20:22:41',
            ),
        ));
        
        
    }
}