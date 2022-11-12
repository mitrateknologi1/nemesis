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
                'id' => '11f878fa-e3d2-40df-9b83-d6363905b274',
                'lokasi_hewan_id' => '2be0d694-8779-43e8-95a8-e22f3fa6aea5',
                'penduduk_id' => '4cba077f-bb0e-4fe5-8d96-37dc7a52b8a0',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:11:18',
                'updated_at' => '2022-11-12 14:11:18',
            ),
            3 => 
            array (
                'id' => '1bbec0ab-2190-44d8-becc-efa4957d5fd4',
                'lokasi_hewan_id' => '9e300225-3ee5-4162-b961-b5541c5b9c22',
                'penduduk_id' => '08f15de1-6d23-482d-afb3-70458ee3119e',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:37:05',
                'updated_at' => '2022-10-21 20:37:05',
            ),
            4 => 
            array (
                'id' => '20ec6d49-c2af-444c-a5b9-a57184e5af1b',
                'lokasi_hewan_id' => '9d559484-19f8-4461-9744-646513c39a03',
                'penduduk_id' => 'd5409526-24a1-40ae-8cbd-01235f3b6292',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:42:32',
                'updated_at' => '2022-10-21 20:42:32',
            ),
            5 => 
            array (
                'id' => '2434501d-0933-49ea-8302-8f964a2274ea',
                'lokasi_hewan_id' => '3fc74fe1-bc66-41b1-9646-c422596c0276',
                'penduduk_id' => '7a87296c-9930-4cbb-a0e4-3ddd0ca28d77',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:22:41',
                'updated_at' => '2022-10-21 20:22:41',
            ),
            6 => 
            array (
                'id' => '27ec7dd8-3618-4ae9-8177-c7b769a69ebc',
                'lokasi_hewan_id' => 'f1f322a1-43be-44d4-8972-41ecb0348b36',
                'penduduk_id' => '6952587b-c370-452b-b109-5c206e0a15bb',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:23:26',
                'updated_at' => '2022-10-21 20:23:26',
            ),
            7 => 
            array (
                'id' => '29bfd97f-c83e-4d19-aed0-fac1cf6d10a2',
                'lokasi_hewan_id' => 'a23efbdd-6581-4992-a7e7-69a5846808e0',
                'penduduk_id' => 'c69ae4ed-e6a1-432f-9443-7566e1d04cee',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:49:28',
                'updated_at' => '2022-10-21 19:49:28',
            ),
            8 => 
            array (
                'id' => '2c24e174-02d4-44ba-b6b0-48427d862851',
                'lokasi_hewan_id' => '7e514f47-5425-437e-a00a-d7ed4999b7b5',
                'penduduk_id' => '1e54cdda-791a-4dba-951f-dbf318917140',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:12:48',
                'updated_at' => '2022-11-12 14:12:48',
            ),
            9 => 
            array (
                'id' => '2de45c31-af00-4466-8ec8-95c56989ae49',
                'lokasi_hewan_id' => 'f4d24852-1f31-4b8f-bfd9-984e22c49c36',
                'penduduk_id' => 'bf3b60d8-f9f8-4953-a88b-e918f463ade2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:32:45',
                'updated_at' => '2022-10-21 20:32:45',
            ),
            10 => 
            array (
                'id' => '30eaf827-21ce-41b1-9392-e28fb273c2bd',
                'lokasi_hewan_id' => '2869c712-b08d-4267-be1f-fcced029152c',
                'penduduk_id' => '3142725c-b8f1-4736-8baa-df15357d8bae',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:16:09',
                'updated_at' => '2022-10-21 20:16:09',
            ),
            11 => 
            array (
                'id' => '3254db54-5e12-47c4-b2f7-6b9e447b39cb',
                'lokasi_hewan_id' => '9f3f2b9d-9ebb-4673-9cb8-10501887d985',
                'penduduk_id' => '0a5616ed-da49-429a-beba-330ec866eb33',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:25:43',
                'updated_at' => '2022-11-12 14:25:43',
            ),
            12 => 
            array (
                'id' => '3286d5a1-b94a-475e-b8f5-3416cb7742ad',
                'lokasi_hewan_id' => '1acd27eb-ee07-42fa-86fe-0d3557e7bf88',
                'penduduk_id' => 'cf6247df-f8f9-4b41-808b-6cdcff4a4f01',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:55:33',
                'updated_at' => '2022-10-21 19:55:33',
            ),
            13 => 
            array (
                'id' => '33984254-9e4a-426f-a2a4-174024887cb3',
                'lokasi_hewan_id' => 'ee59f14d-388b-4a91-ba69-483d8cbd8c67',
                'penduduk_id' => '61c1b153-51d0-4d79-b333-4e69b78b3553',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:52:52',
                'updated_at' => '2022-10-21 19:52:52',
            ),
            14 => 
            array (
                'id' => '3a607504-fc03-427a-9e27-6a686836f8b4',
                'lokasi_hewan_id' => '8ea1f176-8241-40aa-b7e8-da06e18f7105',
                'penduduk_id' => '5bb431b0-b29f-4ae8-989f-b7d83c71044f',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:12:45',
                'updated_at' => '2022-10-21 20:12:45',
            ),
            15 => 
            array (
                'id' => '3f7b4113-63ad-4936-b522-28fe50713a37',
                'lokasi_hewan_id' => '1dffb3ba-07a6-4e06-a54d-37600429618f',
                'penduduk_id' => 'd12576f6-4926-472c-a25b-d3bd826eeeea',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:44:04',
                'updated_at' => '2022-10-21 20:44:04',
            ),
            16 => 
            array (
                'id' => '406e9a99-8db1-4201-9548-2e3cafe55b40',
                'lokasi_hewan_id' => '6a514fdc-fe8a-46d8-abdf-d7d4f1b01541',
                'penduduk_id' => 'd12576f6-4926-472c-a25b-d3bd826eeeea',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:05:52',
                'updated_at' => '2022-10-21 20:05:52',
            ),
            17 => 
            array (
                'id' => '467bd75e-1e97-4258-b9b4-a94bbbdd5da1',
                'lokasi_hewan_id' => 'fa277220-e0c2-4780-8fa7-1bbc45a4aa84',
                'penduduk_id' => 'fee72291-822c-4ef0-b307-c1fbe830dc51',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:16:50',
                'updated_at' => '2022-11-12 14:16:50',
            ),
            18 => 
            array (
                'id' => '49d6baae-9380-40cc-b557-926ce637ba91',
                'lokasi_hewan_id' => '0fe7d585-9396-44ed-87a8-d9dc37959593',
                'penduduk_id' => 'bc7d9d62-52e1-448b-a34c-645b5b69bd82',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:06:38',
                'updated_at' => '2022-11-12 14:06:38',
            ),
            19 => 
            array (
                'id' => '533cbb2b-9114-455a-bf3f-3a602d343148',
                'lokasi_hewan_id' => '66284472-a4d6-4135-8efc-c32df0b9772b',
                'penduduk_id' => '060310f6-2377-4080-982b-17c58269f531',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:43:35',
                'updated_at' => '2022-10-21 20:43:35',
            ),
            20 => 
            array (
                'id' => '59e3dc0b-dc75-4893-ab71-cf71a09dcfbd',
                'lokasi_hewan_id' => 'b7e1447f-1c35-403d-abca-0524183db062',
                'penduduk_id' => 'b1c50892-46ef-4056-81d7-5eb20f2f685b',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:29:13',
                'updated_at' => '2022-10-21 20:29:13',
            ),
            21 => 
            array (
                'id' => '59f81e02-2f99-425d-bd24-181e5ac21b50',
                'lokasi_hewan_id' => 'f191b086-9b22-4dc0-a1aa-ebbfb8144abe',
                'penduduk_id' => '33f4b635-06a6-47fb-a5c8-758a74d584cc',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:37:49',
                'updated_at' => '2022-10-21 20:37:49',
            ),
            22 => 
            array (
                'id' => '5ad68b2a-fd6e-4560-ade8-9f9d51186d45',
                'lokasi_hewan_id' => '7e7615c0-8e18-4724-a8d1-fd939d882dd2',
                'penduduk_id' => '76a79377-1a21-42ea-8e0f-3453c31dc6f3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:26:30',
                'updated_at' => '2022-11-12 14:26:30',
            ),
            23 => 
            array (
                'id' => '61b6faa3-1357-46ba-8d2e-7eb450d5113d',
                'lokasi_hewan_id' => '61263600-303e-45cc-8668-48ca1dee1b44',
                'penduduk_id' => 'beec89da-4215-4f1f-b462-2e205f66eb0e',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:07:34',
                'updated_at' => '2022-11-12 14:07:34',
            ),
            24 => 
            array (
                'id' => '6d5b612a-e7ba-4b9c-ac51-9d20fcfcce71',
                'lokasi_hewan_id' => 'c2ed79a9-0786-4476-a9cf-3d41931ea252',
                'penduduk_id' => 'dd998d05-fe63-4ce7-b3d1-7a3abc47f50c',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:05:48',
                'updated_at' => '2022-11-12 14:05:48',
            ),
            25 => 
            array (
                'id' => '6db0e375-b5c2-4ad3-bff0-4b24b86ad274',
                'lokasi_hewan_id' => 'a548a030-8436-4a1a-be78-04d3e577b8b6',
                'penduduk_id' => '8ca48ab7-3333-4a36-9da6-910b69535134',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:05:09',
                'updated_at' => '2022-11-12 14:05:09',
            ),
            26 => 
            array (
                'id' => '700c9cdd-ec87-4c4b-b9e7-9c57d8c5dab2',
                'lokasi_hewan_id' => '4b61c091-654f-4247-a86c-a4d76301ed04',
                'penduduk_id' => '92a2405e-1061-47c0-ab64-e5f26f7f814c',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:46:47',
                'updated_at' => '2022-10-21 20:46:47',
            ),
            27 => 
            array (
                'id' => '7529603d-1c48-45e4-a413-84d284e96fd3',
                'lokasi_hewan_id' => '13a7e0b5-2939-4604-b0db-2f7371564ac0',
                'penduduk_id' => '06ff628b-b373-4da3-942a-e99f301e3c4c',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:27:47',
                'updated_at' => '2022-10-21 20:27:47',
            ),
            28 => 
            array (
                'id' => '76c73980-51d7-478a-9d9c-5754d9521b2f',
                'lokasi_hewan_id' => 'a33d7f6c-abe1-46ba-b545-5ca7aa738e01',
                'penduduk_id' => '120b39c0-77ee-45a0-b61e-def877c40b9b',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:54:29',
                'updated_at' => '2022-10-21 19:54:29',
            ),
            29 => 
            array (
                'id' => '76ee77c1-aacf-40a0-8002-846a2f8dbc20',
                'lokasi_hewan_id' => 'e38b11df-6e58-45d9-8124-b7799d187ae6',
                'penduduk_id' => '490099f4-489a-4ec9-9cfd-873d541db9d1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:51:36',
                'updated_at' => '2022-10-21 19:51:36',
            ),
            30 => 
            array (
                'id' => '7a46a7fe-a399-4087-982c-ab514bf8ae41',
                'lokasi_hewan_id' => '1619fc16-a334-4d5b-84a8-e4b581e2eec6',
                'penduduk_id' => '32f873f4-5681-406a-a3a7-d7cb0277838b',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:09:43',
                'updated_at' => '2022-11-12 14:09:43',
            ),
            31 => 
            array (
                'id' => '7ee0858f-a762-4d09-9aee-79774eb792dd',
                'lokasi_hewan_id' => 'af36f573-0f93-4228-bc55-828de6fadaea',
                'penduduk_id' => '3e69c179-e577-45e5-b048-b8953046c6d3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:46:09',
                'updated_at' => '2022-10-21 20:46:09',
            ),
            32 => 
            array (
                'id' => '8240de13-cef1-422e-a553-07294c95b0c5',
                'lokasi_hewan_id' => '9dd5a556-7a6e-4be5-89c5-bed48cbb9cab',
                'penduduk_id' => '71a1a5c3-31c6-4a43-a2f2-4fc600c23e8a',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:17:23',
                'updated_at' => '2022-11-12 14:17:23',
            ),
            33 => 
            array (
                'id' => '826c5f60-4250-4443-9351-fd3724e8d4f9',
                'lokasi_hewan_id' => '9bdd212c-b354-4b34-b265-db1eb48d411f',
                'penduduk_id' => '4751e608-3494-4971-8e5a-659c17bff4a5',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:19:17',
                'updated_at' => '2022-11-12 14:19:17',
            ),
            34 => 
            array (
                'id' => '859205f7-c106-401f-afc5-9a5f44849478',
                'lokasi_hewan_id' => '72183a0e-3058-43db-afed-71e4c2deb12e',
                'penduduk_id' => '4751e608-3494-4971-8e5a-659c17bff4a5',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:17:58',
                'updated_at' => '2022-11-12 14:17:58',
            ),
            35 => 
            array (
                'id' => '870ce2bf-09cf-419c-b369-31a9e8e5039a',
                'lokasi_hewan_id' => '78c172c0-c5b0-427e-99b7-4b545f0cb6fb',
                'penduduk_id' => '50e43962-86b4-4ba9-8f8d-08cb47987710',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:16:07',
                'updated_at' => '2022-11-12 14:16:07',
            ),
            36 => 
            array (
                'id' => '87e76b59-6163-4aca-a9cc-7b2f1a631460',
                'lokasi_hewan_id' => '3b470bcb-740b-4cbe-bb25-2ec1ffda1a36',
                'penduduk_id' => '91c920c2-e4c1-495d-b268-9463676f7ad3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:27:07',
                'updated_at' => '2022-10-21 20:27:07',
            ),
            37 => 
            array (
                'id' => '88e96aea-ee52-43f7-b96f-a848bbe1af8c',
                'lokasi_hewan_id' => 'dbbce63b-71df-421f-870c-dad9c557bddf',
                'penduduk_id' => 'cabc9b2e-8c5a-4eb6-a6d7-9a9a487602d9',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:57:35',
                'updated_at' => '2022-10-21 14:57:35',
            ),
            38 => 
            array (
                'id' => '8a209a61-c413-46dc-bbe5-f581202af397',
                'lokasi_hewan_id' => '6c85c452-5c1e-4e1f-a148-b9ecfe20aef3',
                'penduduk_id' => '2a9c8c84-6009-49a3-8077-1fdaeacf635f',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:37:10',
                'updated_at' => '2022-11-12 14:37:10',
            ),
            39 => 
            array (
                'id' => '8e00996a-73ab-4c18-9c52-65d8a5d7b63c',
                'lokasi_hewan_id' => 'abd5cc45-4b8a-4024-b8ae-086a5c719add',
                'penduduk_id' => 'e386a578-93e2-4aa9-b806-c848423c9390',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:24:36',
                'updated_at' => '2022-11-12 14:24:36',
            ),
            40 => 
            array (
                'id' => '9cee9782-c5d3-422b-86e5-180f7f161ccf',
                'lokasi_hewan_id' => '36284a26-900a-4836-9680-5c46076ad472',
                'penduduk_id' => 'feefd03f-41e6-4ee5-a3cc-7437777903b0',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:56:42',
                'updated_at' => '2022-10-21 14:56:42',
            ),
            41 => 
            array (
                'id' => '9f503f98-e5ff-4a2f-a5c8-42803335de18',
                'lokasi_hewan_id' => 'e2b99e34-8f35-4576-b76c-c82dba979dfd',
                'penduduk_id' => '2f861c4d-a107-4bd9-ae35-e12942e5866c',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:34:12',
                'updated_at' => '2022-11-12 14:34:12',
            ),
            42 => 
            array (
                'id' => 'a71fa4b2-077b-44b8-9d85-b84852243566',
                'lokasi_hewan_id' => '22e94eae-bf2c-42af-a7c1-d5d893afc585',
                'penduduk_id' => 'e78e816f-b0b7-41ab-be84-ba71035f85d9',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:35:13',
                'updated_at' => '2022-11-12 14:35:13',
            ),
            43 => 
            array (
                'id' => 'abb029cd-c6c9-48e6-86c7-c02b72cc6a3b',
                'lokasi_hewan_id' => 'dcb11a92-4c3a-40f0-a5f2-1c9e0c466a6d',
                'penduduk_id' => '3c7345cb-de35-482b-b65d-67f462799060',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:20:07',
                'updated_at' => '2022-11-12 14:20:07',
            ),
            44 => 
            array (
                'id' => 'ad30b87b-18cb-4653-b8b6-4e26e20be639',
                'lokasi_hewan_id' => 'f2565a97-dcb4-4fe8-9d6a-aba7a278e904',
                'penduduk_id' => '1fe31613-a1a8-40fa-96d4-31380cc6bb23',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:33:11',
                'updated_at' => '2022-11-12 14:33:11',
            ),
            45 => 
            array (
                'id' => 'b0dbcf8e-dee5-4761-8eb0-beb5a25965bd',
                'lokasi_hewan_id' => '24dfd08f-4ed0-4c73-bd1e-c9195f76f73b',
                'penduduk_id' => '29110cde-7ec9-4f7e-b1c4-560557fca531',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:45:29',
                'updated_at' => '2022-10-21 20:45:29',
            ),
            46 => 
            array (
                'id' => 'b5d0aee1-3cf2-4b56-9c5f-7e1d2d1e6bf6',
                'lokasi_hewan_id' => 'fcfb1a77-1b2e-4750-8a34-e6e4e5ab91f9',
                'penduduk_id' => '44aca47f-47cc-4a34-8551-006a56d82a91',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:40:30',
                'updated_at' => '2022-10-21 20:40:30',
            ),
            47 => 
            array (
                'id' => 'b6657d3d-cf15-4b13-92e9-ea6d6c39e959',
                'lokasi_hewan_id' => '5c1dcd20-e333-4a89-98b1-5196eb3d9974',
                'penduduk_id' => '79ec925b-eaff-478b-9536-d2ddeb26adac',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:15:12',
                'updated_at' => '2022-11-12 14:15:12',
            ),
            48 => 
            array (
                'id' => 'bec8eb43-0da0-4759-b5c2-a774ecea80b4',
                'lokasi_hewan_id' => '0de5cd04-645b-455d-9c66-8dbc4c7b190f',
                'penduduk_id' => '37fd4b62-fbfb-4782-bb10-f4b32bbc1636',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:43:04',
                'updated_at' => '2022-10-21 20:43:04',
            ),
            49 => 
            array (
                'id' => 'c2be57b1-3d5e-4aa0-a1b4-c4aa522e7b38',
                'lokasi_hewan_id' => '0db731b8-cb92-46a4-8b79-4a891ae5377b',
                'penduduk_id' => '3a1b4e49-33fa-47c4-8448-95bc017d896f',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:31:38',
                'updated_at' => '2022-11-12 14:31:38',
            ),
            50 => 
            array (
                'id' => 'c2f85f51-85f0-4ff5-b42b-6b6ac9541557',
                'lokasi_hewan_id' => '9070d9bd-0d0e-40fb-b192-fe514f8986f3',
                'penduduk_id' => 'aeba60e2-3fb0-4735-9e71-3f962bc649b6',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:28:43',
                'updated_at' => '2022-10-21 20:28:43',
            ),
            51 => 
            array (
                'id' => 'c513924c-4823-4923-af78-e3b84e4fbeee',
                'lokasi_hewan_id' => 'ef35ae57-76af-4cbb-ba8b-1a25efdbaefc',
                'penduduk_id' => 'cfad416f-87db-4f59-be98-d7b718f6bd66',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:05:06',
                'updated_at' => '2022-10-21 20:05:06',
            ),
            52 => 
            array (
                'id' => 'c9041b9e-aa12-4426-a097-74ffa5c0660a',
                'lokasi_hewan_id' => '891c0b08-d002-4abc-8ab9-b7a371a4b8dd',
                'penduduk_id' => '52cf0727-cc13-4597-b707-d230eecce980',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:55:13',
                'updated_at' => '2022-10-21 14:55:13',
            ),
            53 => 
            array (
                'id' => 'cad40ab6-3a0f-427f-888a-9ea8df182da0',
                'lokasi_hewan_id' => 'f958fbee-4c04-488e-83c3-7d228ffdfa5f',
                'penduduk_id' => '3770b3eb-257d-4fa8-9990-e85e21c03d11',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:11:53',
                'updated_at' => '2022-11-12 14:11:53',
            ),
            54 => 
            array (
                'id' => 'cc503dc3-3142-4c1f-b4a7-27155d4b192b',
                'lokasi_hewan_id' => '69ef7267-f028-4898-8ad6-8547971d2611',
                'penduduk_id' => 'ef277e51-5a4f-4e31-8a73-8e2b26521b55',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:54:59',
                'updated_at' => '2022-10-21 19:54:59',
            ),
            55 => 
            array (
                'id' => 'cee7374e-1e4a-44dc-82ac-5f1d4798c6c5',
                'lokasi_hewan_id' => '8622d87c-41fc-462c-92a8-f63b5af08ce9',
                'penduduk_id' => '098efe00-ebb8-43ee-911c-61a4dedfc247',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:41:02',
                'updated_at' => '2022-10-21 20:41:02',
            ),
            56 => 
            array (
                'id' => 'd0737a40-c298-4ace-88f3-c7412b9fee3e',
                'lokasi_hewan_id' => 'bdd257ad-fad9-4ffd-be7c-7337d81409c3',
                'penduduk_id' => '5d9628a2-a59b-4f2e-9a41-06e228d72671',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:09:42',
                'updated_at' => '2022-10-21 20:09:42',
            ),
            57 => 
            array (
                'id' => 'd2227eac-839d-4fb5-ab51-3ebd4a186ceb',
                'lokasi_hewan_id' => 'dfcf92f5-e31d-48c1-8e0a-ace7add43e20',
                'penduduk_id' => 'c8b79f9d-76b1-4520-a3ba-fac88899728c',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:34:25',
                'updated_at' => '2022-10-21 20:34:25',
            ),
            58 => 
            array (
                'id' => 'd4c61182-4d7a-4702-8acb-786fb47add4b',
                'lokasi_hewan_id' => '064913e9-f4e9-426d-8751-4b0df1821eba',
                'penduduk_id' => 'c39f047b-ae1b-4c71-ad8c-11475ca8aae2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:50:17',
                'updated_at' => '2022-10-21 19:50:17',
            ),
            59 => 
            array (
                'id' => 'd73b1acb-ac16-4d60-bd6e-71a6495a1dbf',
                'lokasi_hewan_id' => '16c73fb6-f254-4c24-86ca-84389f405a2d',
                'penduduk_id' => '0ff35d99-7a74-4848-9dc4-bae7008ac151',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:56:12',
                'updated_at' => '2022-10-21 19:56:12',
            ),
            60 => 
            array (
                'id' => 'd7933967-df69-488f-8ccb-353e4549aba3',
                'lokasi_hewan_id' => 'f84f9e8d-8d26-4829-8ff0-0143e1ed0165',
                'penduduk_id' => '2ddb4437-9b62-4b00-8d0b-79bf1d0c719b',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:53:41',
                'updated_at' => '2022-10-21 19:53:41',
            ),
            61 => 
            array (
                'id' => 'dbf49fcd-7ff1-4d62-8304-d930bce492eb',
                'lokasi_hewan_id' => '7cb2880a-6239-4d39-a2c0-7a39d01bc456',
                'penduduk_id' => '86f741d6-2623-469a-8234-603659027c38',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:39:49',
                'updated_at' => '2022-10-21 20:39:49',
            ),
            62 => 
            array (
                'id' => 'df2853de-bfb2-4cad-861b-97d46cf94a5c',
                'lokasi_hewan_id' => '1f9e3252-06fb-4eef-b6d5-91509e6b51b0',
                'penduduk_id' => 'df17eb77-00ea-469f-857e-9824f92ba424',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:10:46',
                'updated_at' => '2022-11-12 14:10:46',
            ),
            63 => 
            array (
                'id' => 'e1bbda63-a9a6-483d-a678-ab820d7c61e1',
                'lokasi_hewan_id' => '162f0076-aa6c-49d3-910f-506928439fc4',
                'penduduk_id' => '81a5e618-cc6b-4c96-83aa-e8fb539defb6',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:35:55',
                'updated_at' => '2022-10-21 20:35:55',
            ),
            64 => 
            array (
                'id' => 'e8647540-3bb6-4015-8c74-1640ac5c82b5',
                'lokasi_hewan_id' => 'ee5d8ebc-1195-4002-a2b4-5b30f27aab6c',
                'penduduk_id' => '88221ee5-c109-498b-a87b-3209839803fe',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:19:36',
                'updated_at' => '2022-10-21 20:19:36',
            ),
            65 => 
            array (
                'id' => 'e87f963d-2d80-4557-9aea-71da865ad297',
                'lokasi_hewan_id' => '068304c9-d709-4ac0-83a4-d6c7fa9ce21b',
                'penduduk_id' => 'd3c831a6-1bf2-40fd-b045-04fa95d7a68f',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:25:03',
                'updated_at' => '2022-11-12 14:25:03',
            ),
            66 => 
            array (
                'id' => 'ef271e4c-5d45-4378-aa52-835dafc88fca',
                'lokasi_hewan_id' => '8703dd48-7656-40cb-9ee3-5271391eca33',
                'penduduk_id' => '476fd7ca-dc67-4094-bf47-708edf28f83f',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:32:08',
                'updated_at' => '2022-11-12 14:32:08',
            ),
            67 => 
            array (
                'id' => 'f09cbb22-7c97-43dd-82c0-5d881d23a295',
                'lokasi_hewan_id' => '4820d004-b03b-43bb-a662-5476b36b5268',
                'penduduk_id' => 'a7fd1545-ce4f-4425-bd42-c2f48cf7f531',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:54:31',
                'updated_at' => '2022-10-21 14:54:31',
            ),
            68 => 
            array (
                'id' => 'f6485ac3-4229-4dcf-b983-90bf37ce546d',
                'lokasi_hewan_id' => '6c517a5f-1336-44a2-a489-d04f32f1947b',
                'penduduk_id' => '29bab67a-93bc-473b-92df-e6da87ae39b3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:09:02',
                'updated_at' => '2022-11-12 14:09:02',
            ),
            69 => 
            array (
                'id' => 'f64d1e32-fc97-4eff-9602-d8ae1712124b',
                'lokasi_hewan_id' => '49d6d5fd-5bea-428b-9bd7-5dd6931c8b04',
                'penduduk_id' => 'fe2b760b-e2b4-4d05-8413-6719b8d244cb',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:13:53',
                'updated_at' => '2022-11-12 14:13:53',
            ),
        ));
        
        
    }
}