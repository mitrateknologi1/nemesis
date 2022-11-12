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
                'id' => '1cf5826f-43a0-4168-a504-d97224b10605',
                'lokasi_hewan_id' => '0db731b8-cb92-46a4-8b79-4a891ae5377b',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:31:38',
                'updated_at' => '2022-11-12 14:31:38',
            ),
            4 => 
            array (
                'id' => '1d77bb10-3a2f-4fcf-9bd3-147f1aee636c',
                'lokasi_hewan_id' => '068304c9-d709-4ac0-83a4-d6c7fa9ce21b',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:25:03',
                'updated_at' => '2022-11-12 14:25:03',
            ),
            5 => 
            array (
                'id' => '21111046-35ce-4bc3-9c2b-50b565b38061',
                'lokasi_hewan_id' => 'e2b99e34-8f35-4576-b76c-c82dba979dfd',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:34:12',
                'updated_at' => '2022-11-12 14:34:12',
            ),
            6 => 
            array (
                'id' => '24945a7a-7223-45b3-a2bf-425e6417caff',
                'lokasi_hewan_id' => '1f9e3252-06fb-4eef-b6d5-91509e6b51b0',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:10:46',
                'updated_at' => '2022-11-12 14:10:46',
            ),
            7 => 
            array (
                'id' => '271ff291-ab3c-4193-b2e6-e8adde4e0086',
                'lokasi_hewan_id' => '162f0076-aa6c-49d3-910f-506928439fc4',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:35:55',
                'updated_at' => '2022-10-21 20:35:55',
            ),
            8 => 
            array (
                'id' => '29ceee26-206f-42ec-96dc-c6a49b66b786',
                'lokasi_hewan_id' => '7e7615c0-8e18-4724-a8d1-fd939d882dd2',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:26:30',
                'updated_at' => '2022-11-12 14:26:30',
            ),
            9 => 
            array (
                'id' => '32076040-22d4-45d0-99f2-5b34c0f17fd5',
                'lokasi_hewan_id' => '7e514f47-5425-437e-a00a-d7ed4999b7b5',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:12:48',
                'updated_at' => '2022-11-12 14:12:48',
            ),
            10 => 
            array (
                'id' => '336e19a0-64c5-4633-9e49-f1da09c2ec6f',
                'lokasi_hewan_id' => '891c0b08-d002-4abc-8ab9-b7a371a4b8dd',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:55:13',
                'updated_at' => '2022-10-21 14:55:13',
            ),
            11 => 
            array (
                'id' => '3373b411-53a0-4465-83eb-3fe6aee3eb47',
                'lokasi_hewan_id' => 'f191b086-9b22-4dc0-a1aa-ebbfb8144abe',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:37:49',
                'updated_at' => '2022-10-21 20:37:49',
            ),
            12 => 
            array (
                'id' => '3414330d-c18a-4324-bc2c-a4c174ce131b',
                'lokasi_hewan_id' => '4820d004-b03b-43bb-a662-5476b36b5268',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:54:31',
                'updated_at' => '2022-10-21 14:54:31',
            ),
            13 => 
            array (
                'id' => '3541443d-9abe-4376-ac5f-0c58db2afef7',
                'lokasi_hewan_id' => '66284472-a4d6-4135-8efc-c32df0b9772b',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:43:35',
                'updated_at' => '2022-10-21 20:43:35',
            ),
            14 => 
            array (
                'id' => '3b7fca72-76fc-4a48-8d21-d26ecbb7569b',
                'lokasi_hewan_id' => '61263600-303e-45cc-8668-48ca1dee1b44',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:07:34',
                'updated_at' => '2022-11-12 14:07:34',
            ),
            15 => 
            array (
                'id' => '3f912420-3ddd-457f-b310-69e65c131264',
                'lokasi_hewan_id' => 'c2ed79a9-0786-4476-a9cf-3d41931ea252',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:05:48',
                'updated_at' => '2022-11-12 14:05:48',
            ),
            16 => 
            array (
                'id' => '4381833b-240b-4d4e-800c-6f5babe539c2',
                'lokasi_hewan_id' => 'dfcf92f5-e31d-48c1-8e0a-ace7add43e20',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '6',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:34:25',
                'updated_at' => '2022-10-21 20:34:25',
            ),
            17 => 
            array (
                'id' => '48b9b92f-adfd-4323-afcb-8353be1e5977',
                'lokasi_hewan_id' => '1acd27eb-ee07-42fa-86fe-0d3557e7bf88',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:55:33',
                'updated_at' => '2022-10-21 19:55:33',
            ),
            18 => 
            array (
                'id' => '5184ab37-7e28-44da-9d8d-add5789ab0c5',
                'lokasi_hewan_id' => '49d6d5fd-5bea-428b-9bd7-5dd6931c8b04',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:13:53',
                'updated_at' => '2022-11-12 14:13:53',
            ),
            19 => 
            array (
                'id' => '535ed0e0-abc0-4557-8ec0-de433af65988',
                'lokasi_hewan_id' => '36284a26-900a-4836-9680-5c46076ad472',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:56:42',
                'updated_at' => '2022-10-21 14:56:42',
            ),
            20 => 
            array (
                'id' => '5589fba5-f4bb-4f8c-bcb6-b5c13e399542',
                'lokasi_hewan_id' => 'fa277220-e0c2-4780-8fa7-1bbc45a4aa84',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:16:50',
                'updated_at' => '2022-11-12 14:16:50',
            ),
            21 => 
            array (
                'id' => '5d2e0154-9f6e-4129-8f3e-b6a3cbd7fda0',
                'lokasi_hewan_id' => '9070d9bd-0d0e-40fb-b192-fe514f8986f3',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:28:43',
                'updated_at' => '2022-10-21 20:28:43',
            ),
            22 => 
            array (
                'id' => '678fc19f-c177-47e6-a93a-9a50e4a20a7f',
                'lokasi_hewan_id' => 'af36f573-0f93-4228-bc55-828de6fadaea',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:46:09',
                'updated_at' => '2022-10-21 20:46:09',
            ),
            23 => 
            array (
                'id' => '6905a446-938d-47a5-985e-9aeec78447a1',
                'lokasi_hewan_id' => '6a514fdc-fe8a-46d8-abdf-d7d4f1b01541',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:05:52',
                'updated_at' => '2022-10-21 20:05:52',
            ),
            24 => 
            array (
                'id' => '6bbb8bc3-2bbb-4d69-8390-72e3d318269d',
                'lokasi_hewan_id' => '064913e9-f4e9-426d-8751-4b0df1821eba',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:50:17',
                'updated_at' => '2022-10-21 19:50:17',
            ),
            25 => 
            array (
                'id' => '7290ab4a-3b5b-4cb3-8f3f-75610d9ffeb5',
                'lokasi_hewan_id' => 'e38b11df-6e58-45d9-8124-b7799d187ae6',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:51:36',
                'updated_at' => '2022-10-21 19:51:36',
            ),
            26 => 
            array (
                'id' => '72d20c4e-27dc-42b1-92fa-81959f44e3f7',
                'lokasi_hewan_id' => '8622d87c-41fc-462c-92a8-f63b5af08ce9',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:41:02',
                'updated_at' => '2022-10-21 20:41:02',
            ),
            27 => 
            array (
                'id' => '73ae283b-7a51-4bca-ae2a-54d624c0521a',
                'lokasi_hewan_id' => 'ee5d8ebc-1195-4002-a2b4-5b30f27aab6c',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:19:36',
                'updated_at' => '2022-10-21 20:19:36',
            ),
            28 => 
            array (
                'id' => '742e495d-51ff-46f3-abe1-de1a19fed3ec',
                'lokasi_hewan_id' => '9bdd212c-b354-4b34-b265-db1eb48d411f',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:19:17',
                'updated_at' => '2022-11-12 14:19:17',
            ),
            29 => 
            array (
                'id' => '7c18a132-1b19-4ca7-8bac-e1497968687c',
                'lokasi_hewan_id' => '2be0d694-8779-43e8-95a8-e22f3fa6aea5',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:11:18',
                'updated_at' => '2022-11-12 14:11:18',
            ),
            30 => 
            array (
                'id' => '804fee29-6b48-4019-be7b-102e4700bde2',
                'lokasi_hewan_id' => '1dffb3ba-07a6-4e06-a54d-37600429618f',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:44:04',
                'updated_at' => '2022-10-21 20:44:04',
            ),
            31 => 
            array (
                'id' => '8829fedb-ec1e-4851-8f62-21aa3b2138a5',
                'lokasi_hewan_id' => '0de5cd04-645b-455d-9c66-8dbc4c7b190f',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:43:04',
                'updated_at' => '2022-10-21 20:43:04',
            ),
            32 => 
            array (
                'id' => '8c5c81e4-2f29-49e4-8781-6f60143f77cc',
                'lokasi_hewan_id' => 'a33d7f6c-abe1-46ba-b545-5ca7aa738e01',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:54:29',
                'updated_at' => '2022-10-21 19:54:29',
            ),
            33 => 
            array (
                'id' => '8d3cbb2b-4daa-42b0-816b-b5fc1bb9eee6',
                'lokasi_hewan_id' => '9f3f2b9d-9ebb-4673-9cb8-10501887d985',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:25:43',
                'updated_at' => '2022-11-12 14:25:43',
            ),
            34 => 
            array (
                'id' => '8fa3c429-ae6a-40ab-9cb9-4756175e1039',
                'lokasi_hewan_id' => 'ef35ae57-76af-4cbb-ba8b-1a25efdbaefc',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:05:06',
                'updated_at' => '2022-10-21 20:05:06',
            ),
            35 => 
            array (
                'id' => '905e0842-6370-499e-b1db-b7015df24574',
                'lokasi_hewan_id' => '1619fc16-a334-4d5b-84a8-e4b581e2eec6',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:09:43',
                'updated_at' => '2022-11-12 14:09:43',
            ),
            36 => 
            array (
                'id' => '943bf816-f4a0-4108-b05c-906e8cfbed9c',
                'lokasi_hewan_id' => 'a23efbdd-6581-4992-a7e7-69a5846808e0',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:49:28',
                'updated_at' => '2022-10-21 19:49:28',
            ),
            37 => 
            array (
                'id' => '95634a23-fd7e-4e13-82dd-26f9769872a4',
                'lokasi_hewan_id' => '13a7e0b5-2939-4604-b0db-2f7371564ac0',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '0',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:27:47',
                'updated_at' => '2022-10-21 20:27:47',
            ),
            38 => 
            array (
                'id' => '99c83242-834e-4d00-94f7-ecbe1369708c',
                'lokasi_hewan_id' => 'ee59f14d-388b-4a91-ba69-483d8cbd8c67',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:52:52',
                'updated_at' => '2022-10-21 19:52:52',
            ),
            39 => 
            array (
                'id' => '9b0258d5-ca13-4ad9-bef0-f0454a503225',
                'lokasi_hewan_id' => '9d559484-19f8-4461-9744-646513c39a03',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:42:32',
                'updated_at' => '2022-10-21 20:42:32',
            ),
            40 => 
            array (
                'id' => '9e12cde5-0f75-47bb-b66e-38cd1e564849',
                'lokasi_hewan_id' => '78c172c0-c5b0-427e-99b7-4b545f0cb6fb',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:16:07',
                'updated_at' => '2022-11-12 14:16:07',
            ),
            41 => 
            array (
                'id' => '9fbcaa93-bfeb-4c79-b3e8-7dd4dc0c1966',
                'lokasi_hewan_id' => '7cb2880a-6239-4d39-a2c0-7a39d01bc456',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:39:49',
                'updated_at' => '2022-10-21 20:39:49',
            ),
            42 => 
            array (
                'id' => 'a28dc247-78fc-4092-9b6f-0c5e15b28bdf',
                'lokasi_hewan_id' => 'f4d24852-1f31-4b8f-bfd9-984e22c49c36',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:32:45',
                'updated_at' => '2022-10-21 20:32:45',
            ),
            43 => 
            array (
                'id' => 'a4017d7d-f5cd-4cbb-982f-e07ea0ca41c7',
                'lokasi_hewan_id' => 'bdd257ad-fad9-4ffd-be7c-7337d81409c3',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:09:42',
                'updated_at' => '2022-10-21 20:09:42',
            ),
            44 => 
            array (
                'id' => 'a5c8363c-41fe-4d7d-a44c-c2f24eaed210',
                'lokasi_hewan_id' => '890c08a0-ca79-44bb-87af-dcbba4bb18b1',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:50:52',
                'updated_at' => '2022-10-21 19:50:52',
            ),
            45 => 
            array (
                'id' => 'a720bf32-df94-49b8-bf8f-31e984f06219',
                'lokasi_hewan_id' => 'f84f9e8d-8d26-4829-8ff0-0143e1ed0165',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:53:41',
                'updated_at' => '2022-10-21 19:53:41',
            ),
            46 => 
            array (
                'id' => 'aa6b019c-c422-4911-8435-bf5962d38be7',
                'lokasi_hewan_id' => 'ef35ae57-76af-4cbb-ba8b-1a25efdbaefc',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:25:43',
                'updated_at' => '2022-10-21 20:25:43',
            ),
            47 => 
            array (
                'id' => 'b1414be4-78e4-498b-b079-506da4b3e3f3',
                'lokasi_hewan_id' => '6c517a5f-1336-44a2-a489-d04f32f1947b',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:09:02',
                'updated_at' => '2022-11-12 14:09:02',
            ),
            48 => 
            array (
                'id' => 'b5bf5016-9694-46b0-9080-79907c737ed2',
                'lokasi_hewan_id' => 'a548a030-8436-4a1a-be78-04d3e577b8b6',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:05:09',
                'updated_at' => '2022-11-12 14:05:09',
            ),
            49 => 
            array (
                'id' => 'b8dc36ec-ee49-4f5d-b99d-91203f8354dd',
                'lokasi_hewan_id' => '9e300225-3ee5-4162-b961-b5541c5b9c22',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:37:05',
                'updated_at' => '2022-10-21 20:37:05',
            ),
            50 => 
            array (
                'id' => 'ba323a58-05dc-46de-ab1a-63985dfa458b',
                'lokasi_hewan_id' => 'f2565a97-dcb4-4fe8-9d6a-aba7a278e904',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:33:11',
                'updated_at' => '2022-11-12 14:33:11',
            ),
            51 => 
            array (
                'id' => 'c10e5e72-5fc9-4f29-8dfa-961584182b6e',
                'lokasi_hewan_id' => 'dbbce63b-71df-421f-870c-dad9c557bddf',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:57:35',
                'updated_at' => '2022-10-21 14:57:35',
            ),
            52 => 
            array (
                'id' => 'c6543e95-016c-4149-ab39-1128e304ef89',
                'lokasi_hewan_id' => '69ef7267-f028-4898-8ad6-8547971d2611',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '4',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:54:59',
                'updated_at' => '2022-10-21 19:54:59',
            ),
            53 => 
            array (
                'id' => 'c69173ea-be18-42b4-a1fe-218495a519af',
                'lokasi_hewan_id' => '24dfd08f-4ed0-4c73-bd1e-c9195f76f73b',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:45:29',
                'updated_at' => '2022-10-21 20:45:29',
            ),
            54 => 
            array (
                'id' => 'ca6b7599-ef22-4bf9-b6ad-0f08798956e2',
                'lokasi_hewan_id' => 'b7e1447f-1c35-403d-abca-0524183db062',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:29:13',
                'updated_at' => '2022-10-21 20:29:13',
            ),
            55 => 
            array (
                'id' => 'cc4e106b-e8b3-48d8-9168-f4d655b2d1f3',
                'lokasi_hewan_id' => '0fe7d585-9396-44ed-87a8-d9dc37959593',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:06:38',
                'updated_at' => '2022-11-12 14:06:38',
            ),
            56 => 
            array (
                'id' => 'cc66ec28-4401-4730-9ffb-0b8ccd830b7f',
                'lokasi_hewan_id' => '9dd5a556-7a6e-4be5-89c5-bed48cbb9cab',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:17:23',
                'updated_at' => '2022-11-12 14:17:23',
            ),
            57 => 
            array (
                'id' => 'ccbee7e8-0a61-4164-8cf6-f184e8c869b7',
                'lokasi_hewan_id' => '8ea1f176-8241-40aa-b7e8-da06e18f7105',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:12:45',
                'updated_at' => '2022-10-21 20:12:45',
            ),
            58 => 
            array (
                'id' => 'ce0b7181-28db-44f0-8638-8cfbfe709ad7',
                'lokasi_hewan_id' => 'dcb11a92-4c3a-40f0-a5f2-1c9e0c466a6d',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:20:07',
                'updated_at' => '2022-11-12 14:20:07',
            ),
            59 => 
            array (
                'id' => 'd2809031-5263-49e5-8f89-841b42ecc905',
                'lokasi_hewan_id' => '3b470bcb-740b-4cbe-bb25-2ec1ffda1a36',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:27:07',
                'updated_at' => '2022-10-21 20:27:07',
            ),
            60 => 
            array (
                'id' => 'd4bf2e1a-d016-4dfe-b05d-731b9df4239c',
                'lokasi_hewan_id' => 'f958fbee-4c04-488e-83c3-7d228ffdfa5f',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:11:53',
                'updated_at' => '2022-11-12 14:11:53',
            ),
            61 => 
            array (
                'id' => 'd883c73c-869a-4d1c-814d-19d2596adbef',
                'lokasi_hewan_id' => 'fcfb1a77-1b2e-4750-8a34-e6e4e5ab91f9',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:40:30',
                'updated_at' => '2022-10-21 20:40:30',
            ),
            62 => 
            array (
                'id' => 'dae18b1e-815e-45ab-95a3-75f97902b607',
                'lokasi_hewan_id' => '72183a0e-3058-43db-afed-71e4c2deb12e',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:17:58',
                'updated_at' => '2022-11-12 14:17:58',
            ),
            63 => 
            array (
                'id' => 'def6aefa-39ac-46d0-b234-259de2dc744b',
                'lokasi_hewan_id' => '5c1dcd20-e333-4a89-98b1-5196eb3d9974',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:15:12',
                'updated_at' => '2022-11-12 14:15:12',
            ),
            64 => 
            array (
                'id' => 'e3054bca-b4d4-4e66-b2cb-0e123a72cea6',
                'lokasi_hewan_id' => '3ef5c674-ec9f-48e9-bd50-3aa5ff0a0271',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:17:18',
                'updated_at' => '2022-10-21 20:17:18',
            ),
            65 => 
            array (
                'id' => 'e5f04c6a-03a8-43a0-bc67-342cc0dc3464',
                'lokasi_hewan_id' => 'f1f322a1-43be-44d4-8972-41ecb0348b36',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:23:26',
                'updated_at' => '2022-10-21 20:23:26',
            ),
            66 => 
            array (
                'id' => 'ed0d01ac-8407-4f7c-9195-4650096183ad',
                'lokasi_hewan_id' => '6c85c452-5c1e-4e1f-a148-b9ecfe20aef3',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:37:10',
                'updated_at' => '2022-11-12 14:37:10',
            ),
            67 => 
            array (
                'id' => 'ee6a22d7-55e7-4ebd-b5b0-c31484d499f8',
                'lokasi_hewan_id' => '3fc74fe1-bc66-41b1-9646-c422596c0276',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c11',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:22:41',
                'updated_at' => '2022-10-21 20:22:41',
            ),
            68 => 
            array (
                'id' => 'f754290b-d641-4a24-ae74-6d960be39549',
                'lokasi_hewan_id' => 'abd5cc45-4b8a-4024-b8ae-086a5c719add',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:24:36',
                'updated_at' => '2022-11-12 14:24:36',
            ),
            69 => 
            array (
                'id' => 'fc343cb9-5468-4649-acf8-a564a5ed89bd',
                'lokasi_hewan_id' => '22e94eae-bf2c-42af-a7c1-d5d893afc585',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '1',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:35:13',
                'updated_at' => '2022-11-12 14:35:13',
            ),
            70 => 
            array (
                'id' => 'fd3e4225-ec79-451b-95b7-fa8eaf740cc2',
                'lokasi_hewan_id' => '8703dd48-7656-40cb-9ee3-5271391eca33',
                'hewan_id' => '0075b51c-49c0-4e81-a3b3-a6b4e21b3c12',
                'jumlah' => '2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:32:08',
                'updated_at' => '2022-11-12 14:32:08',
            ),
        ));
        
        
    }
}