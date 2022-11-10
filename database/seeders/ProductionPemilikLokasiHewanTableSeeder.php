<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductionPemilikLokasiHewanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pemilik_lokasi_hewan')->delete();
        
        \DB::table('pemilik_lokasi_hewan')->insert(array (
            0 => 
            array (
                'id' => '042bffcb-3f62-4f04-9878-15c15fda684a',
                'lokasi_hewan_id' => '3ef5c674-ec9f-48e9-bd50-3aa5ff0a0271',
                'penduduk_id' => 'edbca451-b5f0-4408-bceb-af59f7f8e871',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:17:18',
                'updated_at' => '2022-10-21 20:17:18',
            ),
            1 => 
            array (
                'id' => '090f4157-48d4-4344-860a-76a0e11fb154',
                'lokasi_hewan_id' => '890c08a0-ca79-44bb-87af-dcbba4bb18b1',
                'penduduk_id' => '7e24e7e7-8775-4c45-ab55-5fa2b0d9e915',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:50:52',
                'updated_at' => '2022-10-21 19:50:52',
            ),
            2 => 
            array (
                'id' => '1bbec0ab-2190-44d8-becc-efa4957d5fd4',
                'lokasi_hewan_id' => '9e300225-3ee5-4162-b961-b5541c5b9c22',
                'penduduk_id' => '08f15de1-6d23-482d-afb3-70458ee3119e',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:37:05',
                'updated_at' => '2022-10-21 20:37:05',
            ),
            3 => 
            array (
                'id' => '20ec6d49-c2af-444c-a5b9-a57184e5af1b',
                'lokasi_hewan_id' => '9d559484-19f8-4461-9744-646513c39a03',
                'penduduk_id' => 'd5409526-24a1-40ae-8cbd-01235f3b6292',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:42:32',
                'updated_at' => '2022-10-21 20:42:32',
            ),
            4 => 
            array (
                'id' => '2434501d-0933-49ea-8302-8f964a2274ea',
                'lokasi_hewan_id' => '3fc74fe1-bc66-41b1-9646-c422596c0276',
                'penduduk_id' => '7a87296c-9930-4cbb-a0e4-3ddd0ca28d77',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:22:41',
                'updated_at' => '2022-10-21 20:22:41',
            ),
            5 => 
            array (
                'id' => '27ec7dd8-3618-4ae9-8177-c7b769a69ebc',
                'lokasi_hewan_id' => 'f1f322a1-43be-44d4-8972-41ecb0348b36',
                'penduduk_id' => '6952587b-c370-452b-b109-5c206e0a15bb',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:23:26',
                'updated_at' => '2022-10-21 20:23:26',
            ),
            6 => 
            array (
                'id' => '29bfd97f-c83e-4d19-aed0-fac1cf6d10a2',
                'lokasi_hewan_id' => 'a23efbdd-6581-4992-a7e7-69a5846808e0',
                'penduduk_id' => 'c69ae4ed-e6a1-432f-9443-7566e1d04cee',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:49:28',
                'updated_at' => '2022-10-21 19:49:28',
            ),
            7 => 
            array (
                'id' => '2de45c31-af00-4466-8ec8-95c56989ae49',
                'lokasi_hewan_id' => 'f4d24852-1f31-4b8f-bfd9-984e22c49c36',
                'penduduk_id' => 'bf3b60d8-f9f8-4953-a88b-e918f463ade2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:32:45',
                'updated_at' => '2022-10-21 20:32:45',
            ),
            8 => 
            array (
                'id' => '30eaf827-21ce-41b1-9392-e28fb273c2bd',
                'lokasi_hewan_id' => '2869c712-b08d-4267-be1f-fcced029152c',
                'penduduk_id' => '3142725c-b8f1-4736-8baa-df15357d8bae',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:16:09',
                'updated_at' => '2022-10-21 20:16:09',
            ),
            9 => 
            array (
                'id' => '3286d5a1-b94a-475e-b8f5-3416cb7742ad',
                'lokasi_hewan_id' => '1acd27eb-ee07-42fa-86fe-0d3557e7bf88',
                'penduduk_id' => 'cf6247df-f8f9-4b41-808b-6cdcff4a4f01',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:55:33',
                'updated_at' => '2022-10-21 19:55:33',
            ),
            10 => 
            array (
                'id' => '33984254-9e4a-426f-a2a4-174024887cb3',
                'lokasi_hewan_id' => 'ee59f14d-388b-4a91-ba69-483d8cbd8c67',
                'penduduk_id' => '61c1b153-51d0-4d79-b333-4e69b78b3553',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:52:52',
                'updated_at' => '2022-10-21 19:52:52',
            ),
            11 => 
            array (
                'id' => '3a607504-fc03-427a-9e27-6a686836f8b4',
                'lokasi_hewan_id' => '8ea1f176-8241-40aa-b7e8-da06e18f7105',
                'penduduk_id' => '5bb431b0-b29f-4ae8-989f-b7d83c71044f',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:12:45',
                'updated_at' => '2022-10-21 20:12:45',
            ),
            12 => 
            array (
                'id' => '3f7b4113-63ad-4936-b522-28fe50713a37',
                'lokasi_hewan_id' => '1dffb3ba-07a6-4e06-a54d-37600429618f',
                'penduduk_id' => 'd12576f6-4926-472c-a25b-d3bd826eeeea',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:44:04',
                'updated_at' => '2022-10-21 20:44:04',
            ),
            13 => 
            array (
                'id' => '406e9a99-8db1-4201-9548-2e3cafe55b40',
                'lokasi_hewan_id' => '6a514fdc-fe8a-46d8-abdf-d7d4f1b01541',
                'penduduk_id' => 'd12576f6-4926-472c-a25b-d3bd826eeeea',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:05:52',
                'updated_at' => '2022-10-21 20:05:52',
            ),
            14 => 
            array (
                'id' => '533cbb2b-9114-455a-bf3f-3a602d343148',
                'lokasi_hewan_id' => '66284472-a4d6-4135-8efc-c32df0b9772b',
                'penduduk_id' => '060310f6-2377-4080-982b-17c58269f531',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:43:35',
                'updated_at' => '2022-10-21 20:43:35',
            ),
            15 => 
            array (
                'id' => '59e3dc0b-dc75-4893-ab71-cf71a09dcfbd',
                'lokasi_hewan_id' => 'b7e1447f-1c35-403d-abca-0524183db062',
                'penduduk_id' => 'b1c50892-46ef-4056-81d7-5eb20f2f685b',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:29:13',
                'updated_at' => '2022-10-21 20:29:13',
            ),
            16 => 
            array (
                'id' => '59f81e02-2f99-425d-bd24-181e5ac21b50',
                'lokasi_hewan_id' => 'f191b086-9b22-4dc0-a1aa-ebbfb8144abe',
                'penduduk_id' => '33f4b635-06a6-47fb-a5c8-758a74d584cc',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:37:49',
                'updated_at' => '2022-10-21 20:37:49',
            ),
            17 => 
            array (
                'id' => '700c9cdd-ec87-4c4b-b9e7-9c57d8c5dab2',
                'lokasi_hewan_id' => '4b61c091-654f-4247-a86c-a4d76301ed04',
                'penduduk_id' => '92a2405e-1061-47c0-ab64-e5f26f7f814c',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:46:47',
                'updated_at' => '2022-10-21 20:46:47',
            ),
            18 => 
            array (
                'id' => '7529603d-1c48-45e4-a413-84d284e96fd3',
                'lokasi_hewan_id' => '13a7e0b5-2939-4604-b0db-2f7371564ac0',
                'penduduk_id' => '06ff628b-b373-4da3-942a-e99f301e3c4c',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:27:47',
                'updated_at' => '2022-10-21 20:27:47',
            ),
            19 => 
            array (
                'id' => '76c73980-51d7-478a-9d9c-5754d9521b2f',
                'lokasi_hewan_id' => 'a33d7f6c-abe1-46ba-b545-5ca7aa738e01',
                'penduduk_id' => '120b39c0-77ee-45a0-b61e-def877c40b9b',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:54:29',
                'updated_at' => '2022-10-21 19:54:29',
            ),
            20 => 
            array (
                'id' => '76ee77c1-aacf-40a0-8002-846a2f8dbc20',
                'lokasi_hewan_id' => 'e38b11df-6e58-45d9-8124-b7799d187ae6',
                'penduduk_id' => '490099f4-489a-4ec9-9cfd-873d541db9d1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:51:36',
                'updated_at' => '2022-10-21 19:51:36',
            ),
            21 => 
            array (
                'id' => '7ee0858f-a762-4d09-9aee-79774eb792dd',
                'lokasi_hewan_id' => 'af36f573-0f93-4228-bc55-828de6fadaea',
                'penduduk_id' => '3e69c179-e577-45e5-b048-b8953046c6d3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:46:09',
                'updated_at' => '2022-10-21 20:46:09',
            ),
            22 => 
            array (
                'id' => '87e76b59-6163-4aca-a9cc-7b2f1a631460',
                'lokasi_hewan_id' => '3b470bcb-740b-4cbe-bb25-2ec1ffda1a36',
                'penduduk_id' => '91c920c2-e4c1-495d-b268-9463676f7ad3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:27:07',
                'updated_at' => '2022-10-21 20:27:07',
            ),
            23 => 
            array (
                'id' => '88e96aea-ee52-43f7-b96f-a848bbe1af8c',
                'lokasi_hewan_id' => 'dbbce63b-71df-421f-870c-dad9c557bddf',
                'penduduk_id' => 'cabc9b2e-8c5a-4eb6-a6d7-9a9a487602d9',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:57:35',
                'updated_at' => '2022-10-21 14:57:35',
            ),
            24 => 
            array (
                'id' => '9cee9782-c5d3-422b-86e5-180f7f161ccf',
                'lokasi_hewan_id' => '36284a26-900a-4836-9680-5c46076ad472',
                'penduduk_id' => 'feefd03f-41e6-4ee5-a3cc-7437777903b0',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:56:42',
                'updated_at' => '2022-10-21 14:56:42',
            ),
            25 => 
            array (
                'id' => 'b0dbcf8e-dee5-4761-8eb0-beb5a25965bd',
                'lokasi_hewan_id' => '24dfd08f-4ed0-4c73-bd1e-c9195f76f73b',
                'penduduk_id' => '29110cde-7ec9-4f7e-b1c4-560557fca531',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:45:29',
                'updated_at' => '2022-10-21 20:45:29',
            ),
            26 => 
            array (
                'id' => 'b5d0aee1-3cf2-4b56-9c5f-7e1d2d1e6bf6',
                'lokasi_hewan_id' => 'fcfb1a77-1b2e-4750-8a34-e6e4e5ab91f9',
                'penduduk_id' => '44aca47f-47cc-4a34-8551-006a56d82a91',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:40:30',
                'updated_at' => '2022-10-21 20:40:30',
            ),
            27 => 
            array (
                'id' => 'bec8eb43-0da0-4759-b5c2-a774ecea80b4',
                'lokasi_hewan_id' => '0de5cd04-645b-455d-9c66-8dbc4c7b190f',
                'penduduk_id' => '37fd4b62-fbfb-4782-bb10-f4b32bbc1636',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:43:04',
                'updated_at' => '2022-10-21 20:43:04',
            ),
            28 => 
            array (
                'id' => 'c2f85f51-85f0-4ff5-b42b-6b6ac9541557',
                'lokasi_hewan_id' => '9070d9bd-0d0e-40fb-b192-fe514f8986f3',
                'penduduk_id' => 'aeba60e2-3fb0-4735-9e71-3f962bc649b6',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:28:43',
                'updated_at' => '2022-10-21 20:28:43',
            ),
            29 => 
            array (
                'id' => 'c513924c-4823-4923-af78-e3b84e4fbeee',
                'lokasi_hewan_id' => 'ef35ae57-76af-4cbb-ba8b-1a25efdbaefc',
                'penduduk_id' => 'cfad416f-87db-4f59-be98-d7b718f6bd66',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:05:06',
                'updated_at' => '2022-10-21 20:05:06',
            ),
            30 => 
            array (
                'id' => 'c9041b9e-aa12-4426-a097-74ffa5c0660a',
                'lokasi_hewan_id' => '891c0b08-d002-4abc-8ab9-b7a371a4b8dd',
                'penduduk_id' => '52cf0727-cc13-4597-b707-d230eecce980',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:55:13',
                'updated_at' => '2022-10-21 14:55:13',
            ),
            31 => 
            array (
                'id' => 'cc503dc3-3142-4c1f-b4a7-27155d4b192b',
                'lokasi_hewan_id' => '69ef7267-f028-4898-8ad6-8547971d2611',
                'penduduk_id' => 'ef277e51-5a4f-4e31-8a73-8e2b26521b55',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:54:59',
                'updated_at' => '2022-10-21 19:54:59',
            ),
            32 => 
            array (
                'id' => 'cee7374e-1e4a-44dc-82ac-5f1d4798c6c5',
                'lokasi_hewan_id' => '8622d87c-41fc-462c-92a8-f63b5af08ce9',
                'penduduk_id' => '098efe00-ebb8-43ee-911c-61a4dedfc247',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:41:02',
                'updated_at' => '2022-10-21 20:41:02',
            ),
            33 => 
            array (
                'id' => 'd0737a40-c298-4ace-88f3-c7412b9fee3e',
                'lokasi_hewan_id' => 'bdd257ad-fad9-4ffd-be7c-7337d81409c3',
                'penduduk_id' => '5d9628a2-a59b-4f2e-9a41-06e228d72671',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:09:42',
                'updated_at' => '2022-10-21 20:09:42',
            ),
            34 => 
            array (
                'id' => 'd2227eac-839d-4fb5-ab51-3ebd4a186ceb',
                'lokasi_hewan_id' => 'dfcf92f5-e31d-48c1-8e0a-ace7add43e20',
                'penduduk_id' => 'c8b79f9d-76b1-4520-a3ba-fac88899728c',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:34:25',
                'updated_at' => '2022-10-21 20:34:25',
            ),
            35 => 
            array (
                'id' => 'd4c61182-4d7a-4702-8acb-786fb47add4b',
                'lokasi_hewan_id' => '064913e9-f4e9-426d-8751-4b0df1821eba',
                'penduduk_id' => 'c39f047b-ae1b-4c71-ad8c-11475ca8aae2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:50:17',
                'updated_at' => '2022-10-21 19:50:17',
            ),
            36 => 
            array (
                'id' => 'd73b1acb-ac16-4d60-bd6e-71a6495a1dbf',
                'lokasi_hewan_id' => '16c73fb6-f254-4c24-86ca-84389f405a2d',
                'penduduk_id' => '0ff35d99-7a74-4848-9dc4-bae7008ac151',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:56:12',
                'updated_at' => '2022-10-21 19:56:12',
            ),
            37 => 
            array (
                'id' => 'd7933967-df69-488f-8ccb-353e4549aba3',
                'lokasi_hewan_id' => 'f84f9e8d-8d26-4829-8ff0-0143e1ed0165',
                'penduduk_id' => '2ddb4437-9b62-4b00-8d0b-79bf1d0c719b',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:53:41',
                'updated_at' => '2022-10-21 19:53:41',
            ),
            38 => 
            array (
                'id' => 'dbf49fcd-7ff1-4d62-8304-d930bce492eb',
                'lokasi_hewan_id' => '7cb2880a-6239-4d39-a2c0-7a39d01bc456',
                'penduduk_id' => '86f741d6-2623-469a-8234-603659027c38',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:39:49',
                'updated_at' => '2022-10-21 20:39:49',
            ),
            39 => 
            array (
                'id' => 'e1bbda63-a9a6-483d-a678-ab820d7c61e1',
                'lokasi_hewan_id' => '162f0076-aa6c-49d3-910f-506928439fc4',
                'penduduk_id' => '81a5e618-cc6b-4c96-83aa-e8fb539defb6',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:35:55',
                'updated_at' => '2022-10-21 20:35:55',
            ),
            40 => 
            array (
                'id' => 'e8647540-3bb6-4015-8c74-1640ac5c82b5',
                'lokasi_hewan_id' => 'ee5d8ebc-1195-4002-a2b4-5b30f27aab6c',
                'penduduk_id' => '88221ee5-c109-498b-a87b-3209839803fe',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:19:36',
                'updated_at' => '2022-10-21 20:19:36',
            ),
            41 => 
            array (
                'id' => 'f09cbb22-7c97-43dd-82c0-5d881d23a295',
                'lokasi_hewan_id' => '4820d004-b03b-43bb-a662-5476b36b5268',
                'penduduk_id' => 'a7fd1545-ce4f-4425-bd42-c2f48cf7f531',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:54:31',
                'updated_at' => '2022-10-21 14:54:31',
            ),
        ));
        
        
    }
}