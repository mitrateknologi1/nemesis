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
                'id' => '000fa4ba-4e9e-4700-84e5-4fe36d87245f',
                'lokasi_hewan_id' => 'da7e7736-d4ce-4ead-8ca6-818f65ba9799',
                'penduduk_id' => '5b6cf7bb-72d4-42e6-b128-f95c031c830a',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:50:45',
                'updated_at' => '2022-11-12 14:50:45',
            ),
            1 => 
            array (
                'id' => '042bffcb-3f62-4f04-9878-15c15fda684a',
                'lokasi_hewan_id' => '3ef5c674-ec9f-48e9-bd50-3aa5ff0a0271',
                'penduduk_id' => 'edbca451-b5f0-4408-bceb-af59f7f8e871',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:17:18',
                'updated_at' => '2022-10-21 20:17:18',
            ),
            2 => 
            array (
                'id' => '090f4157-48d4-4344-860a-76a0e11fb154',
                'lokasi_hewan_id' => '890c08a0-ca79-44bb-87af-dcbba4bb18b1',
                'penduduk_id' => '7e24e7e7-8775-4c45-ab55-5fa2b0d9e915',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:50:52',
                'updated_at' => '2022-10-21 19:50:52',
            ),
            3 => 
            array (
                'id' => '11f878fa-e3d2-40df-9b83-d6363905b274',
                'lokasi_hewan_id' => '2be0d694-8779-43e8-95a8-e22f3fa6aea5',
                'penduduk_id' => '4cba077f-bb0e-4fe5-8d96-37dc7a52b8a0',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:11:18',
                'updated_at' => '2022-11-12 14:11:18',
            ),
            4 => 
            array (
                'id' => '16298ec7-8c65-4915-b7db-2461d8ba3ec9',
                'lokasi_hewan_id' => '94ac2226-7f98-46ea-83ab-08d779b7feb4',
                'penduduk_id' => 'a02bd316-608b-4f9a-a17b-af4f326109bf',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:18:58',
                'updated_at' => '2022-11-12 15:18:58',
            ),
            5 => 
            array (
                'id' => '1bbec0ab-2190-44d8-becc-efa4957d5fd4',
                'lokasi_hewan_id' => '9e300225-3ee5-4162-b961-b5541c5b9c22',
                'penduduk_id' => '08f15de1-6d23-482d-afb3-70458ee3119e',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:37:05',
                'updated_at' => '2022-10-21 20:37:05',
            ),
            6 => 
            array (
                'id' => '1db0fa18-616f-4d19-80eb-a5df2959fd37',
                'lokasi_hewan_id' => '7272ccc2-26d1-4360-9b71-a6129ada14fe',
                'penduduk_id' => 'cfa00fbd-849e-4663-ad06-f1a34f806f5c',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:19:39',
                'updated_at' => '2022-11-12 15:19:39',
            ),
            7 => 
            array (
                'id' => '20ec6d49-c2af-444c-a5b9-a57184e5af1b',
                'lokasi_hewan_id' => '9d559484-19f8-4461-9744-646513c39a03',
                'penduduk_id' => 'd5409526-24a1-40ae-8cbd-01235f3b6292',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:42:32',
                'updated_at' => '2022-10-21 20:42:32',
            ),
            8 => 
            array (
                'id' => '2222b87e-b10e-40a6-8550-7319f31f330b',
                'lokasi_hewan_id' => '1b207e2f-f1f4-45d2-973f-a73cf6427559',
                'penduduk_id' => '0bdc26ad-c0e4-4580-be98-79570167f510',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:07:51',
                'updated_at' => '2022-11-12 15:07:51',
            ),
            9 => 
            array (
                'id' => '2434501d-0933-49ea-8302-8f964a2274ea',
                'lokasi_hewan_id' => '3fc74fe1-bc66-41b1-9646-c422596c0276',
                'penduduk_id' => '7a87296c-9930-4cbb-a0e4-3ddd0ca28d77',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:22:41',
                'updated_at' => '2022-10-21 20:22:41',
            ),
            10 => 
            array (
                'id' => '27ec7dd8-3618-4ae9-8177-c7b769a69ebc',
                'lokasi_hewan_id' => 'f1f322a1-43be-44d4-8972-41ecb0348b36',
                'penduduk_id' => '6952587b-c370-452b-b109-5c206e0a15bb',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:23:26',
                'updated_at' => '2022-10-21 20:23:26',
            ),
            11 => 
            array (
                'id' => '29bfd97f-c83e-4d19-aed0-fac1cf6d10a2',
                'lokasi_hewan_id' => 'a23efbdd-6581-4992-a7e7-69a5846808e0',
                'penduduk_id' => 'c69ae4ed-e6a1-432f-9443-7566e1d04cee',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:49:28',
                'updated_at' => '2022-10-21 19:49:28',
            ),
            12 => 
            array (
                'id' => '2c24e174-02d4-44ba-b6b0-48427d862851',
                'lokasi_hewan_id' => '7e514f47-5425-437e-a00a-d7ed4999b7b5',
                'penduduk_id' => '1e54cdda-791a-4dba-951f-dbf318917140',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:12:48',
                'updated_at' => '2022-11-12 14:12:48',
            ),
            13 => 
            array (
                'id' => '2de45c31-af00-4466-8ec8-95c56989ae49',
                'lokasi_hewan_id' => 'f4d24852-1f31-4b8f-bfd9-984e22c49c36',
                'penduduk_id' => 'bf3b60d8-f9f8-4953-a88b-e918f463ade2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:32:45',
                'updated_at' => '2022-10-21 20:32:45',
            ),
            14 => 
            array (
                'id' => '30eaf827-21ce-41b1-9392-e28fb273c2bd',
                'lokasi_hewan_id' => '2869c712-b08d-4267-be1f-fcced029152c',
                'penduduk_id' => '3142725c-b8f1-4736-8baa-df15357d8bae',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:16:09',
                'updated_at' => '2022-10-21 20:16:09',
            ),
            15 => 
            array (
                'id' => '3254db54-5e12-47c4-b2f7-6b9e447b39cb',
                'lokasi_hewan_id' => '9f3f2b9d-9ebb-4673-9cb8-10501887d985',
                'penduduk_id' => '0a5616ed-da49-429a-beba-330ec866eb33',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:25:43',
                'updated_at' => '2022-11-12 14:25:43',
            ),
            16 => 
            array (
                'id' => '3286d5a1-b94a-475e-b8f5-3416cb7742ad',
                'lokasi_hewan_id' => '1acd27eb-ee07-42fa-86fe-0d3557e7bf88',
                'penduduk_id' => 'cf6247df-f8f9-4b41-808b-6cdcff4a4f01',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:55:33',
                'updated_at' => '2022-10-21 19:55:33',
            ),
            17 => 
            array (
                'id' => '33984254-9e4a-426f-a2a4-174024887cb3',
                'lokasi_hewan_id' => 'ee59f14d-388b-4a91-ba69-483d8cbd8c67',
                'penduduk_id' => '61c1b153-51d0-4d79-b333-4e69b78b3553',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:52:52',
                'updated_at' => '2022-10-21 19:52:52',
            ),
            18 => 
            array (
                'id' => '37987ea9-dff7-445b-8d63-248944d92be9',
                'lokasi_hewan_id' => '615b62bb-d9c7-41f0-86a8-d74bcf91b9fe',
                'penduduk_id' => '2b603c1c-a2b9-45e6-9eb0-1b1e13c779aa',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:47:21',
                'updated_at' => '2022-11-12 14:47:21',
            ),
            19 => 
            array (
                'id' => '383724a3-3287-4dc6-9c0b-aea59f3a2a2d',
                'lokasi_hewan_id' => '5f2dba80-d1aa-493f-afca-d3c7f58bb927',
                'penduduk_id' => 'bc5801ee-7f48-4a17-bf85-d0655f7c0968',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:08:18',
                'updated_at' => '2022-11-12 15:08:18',
            ),
            20 => 
            array (
                'id' => '3a607504-fc03-427a-9e27-6a686836f8b4',
                'lokasi_hewan_id' => '8ea1f176-8241-40aa-b7e8-da06e18f7105',
                'penduduk_id' => '5bb431b0-b29f-4ae8-989f-b7d83c71044f',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:12:45',
                'updated_at' => '2022-10-21 20:12:45',
            ),
            21 => 
            array (
                'id' => '3f7b4113-63ad-4936-b522-28fe50713a37',
                'lokasi_hewan_id' => '1dffb3ba-07a6-4e06-a54d-37600429618f',
                'penduduk_id' => 'd12576f6-4926-472c-a25b-d3bd826eeeea',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:44:04',
                'updated_at' => '2022-10-21 20:44:04',
            ),
            22 => 
            array (
                'id' => '406e9a99-8db1-4201-9548-2e3cafe55b40',
                'lokasi_hewan_id' => '6a514fdc-fe8a-46d8-abdf-d7d4f1b01541',
                'penduduk_id' => 'd12576f6-4926-472c-a25b-d3bd826eeeea',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:05:52',
                'updated_at' => '2022-10-21 20:05:52',
            ),
            23 => 
            array (
                'id' => '428318ea-9d86-4e54-bea8-d6e7b86caae9',
                'lokasi_hewan_id' => '314ffe3f-ec9b-4b61-a821-fc8eeaef4d74',
                'penduduk_id' => 'f9ee9734-a897-45a4-8b29-202f9ecc4822',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:02:32',
                'updated_at' => '2022-11-12 15:02:32',
            ),
            24 => 
            array (
                'id' => '452675f3-ec44-4dca-a9c8-6422f826af07',
                'lokasi_hewan_id' => 'df4d546c-ccff-410d-8bd0-edddd7d3d4db',
                'penduduk_id' => '8de484c4-fda9-48f5-bb82-eedeece0ed81',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:57:33',
                'updated_at' => '2022-11-12 14:57:33',
            ),
            25 => 
            array (
                'id' => '467bd75e-1e97-4258-b9b4-a94bbbdd5da1',
                'lokasi_hewan_id' => 'fa277220-e0c2-4780-8fa7-1bbc45a4aa84',
                'penduduk_id' => 'fee72291-822c-4ef0-b307-c1fbe830dc51',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:16:50',
                'updated_at' => '2022-11-12 14:16:50',
            ),
            26 => 
            array (
                'id' => '475a94e4-ecde-4f68-aa33-eaaeb8dbf9f6',
                'lokasi_hewan_id' => '6556f5bb-a3d7-4e2e-8cf1-3ca905600e88',
                'penduduk_id' => 'e422fc35-0d3b-4fa9-a5b2-930418a693a1',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:56:15',
                'updated_at' => '2022-11-12 14:56:15',
            ),
            27 => 
            array (
                'id' => '49d6baae-9380-40cc-b557-926ce637ba91',
                'lokasi_hewan_id' => '0fe7d585-9396-44ed-87a8-d9dc37959593',
                'penduduk_id' => 'bc7d9d62-52e1-448b-a34c-645b5b69bd82',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:06:38',
                'updated_at' => '2022-11-12 14:06:38',
            ),
            28 => 
            array (
                'id' => '533cbb2b-9114-455a-bf3f-3a602d343148',
                'lokasi_hewan_id' => '66284472-a4d6-4135-8efc-c32df0b9772b',
                'penduduk_id' => '060310f6-2377-4080-982b-17c58269f531',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:43:35',
                'updated_at' => '2022-10-21 20:43:35',
            ),
            29 => 
            array (
                'id' => '59e3dc0b-dc75-4893-ab71-cf71a09dcfbd',
                'lokasi_hewan_id' => 'b7e1447f-1c35-403d-abca-0524183db062',
                'penduduk_id' => 'b1c50892-46ef-4056-81d7-5eb20f2f685b',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:29:13',
                'updated_at' => '2022-10-21 20:29:13',
            ),
            30 => 
            array (
                'id' => '59f81e02-2f99-425d-bd24-181e5ac21b50',
                'lokasi_hewan_id' => 'f191b086-9b22-4dc0-a1aa-ebbfb8144abe',
                'penduduk_id' => '33f4b635-06a6-47fb-a5c8-758a74d584cc',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:37:49',
                'updated_at' => '2022-10-21 20:37:49',
            ),
            31 => 
            array (
                'id' => '5ad68b2a-fd6e-4560-ade8-9f9d51186d45',
                'lokasi_hewan_id' => '7e7615c0-8e18-4724-a8d1-fd939d882dd2',
                'penduduk_id' => '76a79377-1a21-42ea-8e0f-3453c31dc6f3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:26:30',
                'updated_at' => '2022-11-12 14:26:30',
            ),
            32 => 
            array (
                'id' => '5d98fed6-384f-44e6-9c2e-747b08b0e234',
                'lokasi_hewan_id' => 'fd8c696e-18f3-4528-a52c-75a9e9e99f9e',
                'penduduk_id' => '8c650d1c-604b-4ce0-b959-eb5d436b91c3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:16:42',
                'updated_at' => '2022-11-12 15:16:42',
            ),
            33 => 
            array (
                'id' => '5dd15b1b-6f3c-495e-9191-341909ea0bd7',
                'lokasi_hewan_id' => '4494f4db-0dee-4e51-9c26-994173f30a48',
                'penduduk_id' => 'fecc5b32-03ba-4921-929f-fa80aa7b15f6',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:56:52',
                'updated_at' => '2022-11-12 14:56:52',
            ),
            34 => 
            array (
                'id' => '5e1f356f-a917-4907-a322-88925f84b6a0',
                'lokasi_hewan_id' => '0a5e4063-c1de-4006-ba8a-18d0c664079b',
                'penduduk_id' => '906fde56-ee0e-4c98-80cc-161478e17779',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:15:00',
                'updated_at' => '2022-11-12 15:15:00',
            ),
            35 => 
            array (
                'id' => '6152a6a1-8879-46a2-a50e-25a83d2dc99f',
                'lokasi_hewan_id' => 'eeb4f1c0-1915-487e-aa20-378abe51712d',
                'penduduk_id' => '5604babc-1104-40c9-bb3e-8bc0e9ddf19f',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:12:13',
                'updated_at' => '2022-11-12 15:12:13',
            ),
            36 => 
            array (
                'id' => '61b6faa3-1357-46ba-8d2e-7eb450d5113d',
                'lokasi_hewan_id' => '61263600-303e-45cc-8668-48ca1dee1b44',
                'penduduk_id' => 'beec89da-4215-4f1f-b462-2e205f66eb0e',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:07:34',
                'updated_at' => '2022-11-12 14:07:34',
            ),
            37 => 
            array (
                'id' => '6d5b612a-e7ba-4b9c-ac51-9d20fcfcce71',
                'lokasi_hewan_id' => 'c2ed79a9-0786-4476-a9cf-3d41931ea252',
                'penduduk_id' => 'dd998d05-fe63-4ce7-b3d1-7a3abc47f50c',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:05:48',
                'updated_at' => '2022-11-12 14:05:48',
            ),
            38 => 
            array (
                'id' => '6db0e375-b5c2-4ad3-bff0-4b24b86ad274',
                'lokasi_hewan_id' => 'a548a030-8436-4a1a-be78-04d3e577b8b6',
                'penduduk_id' => '8ca48ab7-3333-4a36-9da6-910b69535134',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:05:09',
                'updated_at' => '2022-11-12 14:05:09',
            ),
            39 => 
            array (
                'id' => '6de72eea-32b2-42ed-b1a5-6fed202fa9e3',
                'lokasi_hewan_id' => '69d51da4-bc8f-4445-8f22-ac2db9be7f6c',
                'penduduk_id' => '1c2f91bc-bdd0-4710-8c8b-f2d76bf135da',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:07:18',
                'updated_at' => '2022-11-12 15:07:18',
            ),
            40 => 
            array (
                'id' => '700c9cdd-ec87-4c4b-b9e7-9c57d8c5dab2',
                'lokasi_hewan_id' => '4b61c091-654f-4247-a86c-a4d76301ed04',
                'penduduk_id' => '92a2405e-1061-47c0-ab64-e5f26f7f814c',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:46:47',
                'updated_at' => '2022-10-21 20:46:47',
            ),
            41 => 
            array (
                'id' => '72aab8e6-38cd-4c79-9b40-0c50059face7',
                'lokasi_hewan_id' => '936a225f-c39b-4db5-a976-c693f9ee63dd',
                'penduduk_id' => 'e8c97777-0b1d-4fe5-8597-a3a64441ce45',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:55:19',
                'updated_at' => '2022-11-12 14:55:19',
            ),
            42 => 
            array (
                'id' => '7529603d-1c48-45e4-a413-84d284e96fd3',
                'lokasi_hewan_id' => '13a7e0b5-2939-4604-b0db-2f7371564ac0',
                'penduduk_id' => '06ff628b-b373-4da3-942a-e99f301e3c4c',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:27:47',
                'updated_at' => '2022-10-21 20:27:47',
            ),
            43 => 
            array (
                'id' => '75834705-6593-48a5-9f09-d6c8b94822de',
                'lokasi_hewan_id' => '5e6e6db8-43af-4de7-a439-cc973050295e',
                'penduduk_id' => '6a49d1a6-734c-4a4c-8597-00efad8d325b',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:04:20',
                'updated_at' => '2022-11-12 15:04:20',
            ),
            44 => 
            array (
                'id' => '76c73980-51d7-478a-9d9c-5754d9521b2f',
                'lokasi_hewan_id' => 'a33d7f6c-abe1-46ba-b545-5ca7aa738e01',
                'penduduk_id' => '120b39c0-77ee-45a0-b61e-def877c40b9b',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:54:29',
                'updated_at' => '2022-10-21 19:54:29',
            ),
            45 => 
            array (
                'id' => '76ee77c1-aacf-40a0-8002-846a2f8dbc20',
                'lokasi_hewan_id' => 'e38b11df-6e58-45d9-8124-b7799d187ae6',
                'penduduk_id' => '490099f4-489a-4ec9-9cfd-873d541db9d1',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:51:36',
                'updated_at' => '2022-10-21 19:51:36',
            ),
            46 => 
            array (
                'id' => '7a46a7fe-a399-4087-982c-ab514bf8ae41',
                'lokasi_hewan_id' => '1619fc16-a334-4d5b-84a8-e4b581e2eec6',
                'penduduk_id' => '32f873f4-5681-406a-a3a7-d7cb0277838b',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:09:43',
                'updated_at' => '2022-11-12 14:09:43',
            ),
            47 => 
            array (
                'id' => '7cb8881c-abda-4f46-9ce5-ff9d8d541792',
                'lokasi_hewan_id' => 'e12aefc0-0bf7-45e2-9275-d9327f8fa746',
                'penduduk_id' => 'e8bcd8cc-dc1e-4d90-8725-f6087cee02df',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:06:23',
                'updated_at' => '2022-11-12 15:06:23',
            ),
            48 => 
            array (
                'id' => '7ee0858f-a762-4d09-9aee-79774eb792dd',
                'lokasi_hewan_id' => 'af36f573-0f93-4228-bc55-828de6fadaea',
                'penduduk_id' => '3e69c179-e577-45e5-b048-b8953046c6d3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:46:09',
                'updated_at' => '2022-10-21 20:46:09',
            ),
            49 => 
            array (
                'id' => '8240de13-cef1-422e-a553-07294c95b0c5',
                'lokasi_hewan_id' => '9dd5a556-7a6e-4be5-89c5-bed48cbb9cab',
                'penduduk_id' => '71a1a5c3-31c6-4a43-a2f2-4fc600c23e8a',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:17:23',
                'updated_at' => '2022-11-12 14:17:23',
            ),
            50 => 
            array (
                'id' => '826c5f60-4250-4443-9351-fd3724e8d4f9',
                'lokasi_hewan_id' => '9bdd212c-b354-4b34-b265-db1eb48d411f',
                'penduduk_id' => '4751e608-3494-4971-8e5a-659c17bff4a5',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:19:17',
                'updated_at' => '2022-11-12 14:19:17',
            ),
            51 => 
            array (
                'id' => '859205f7-c106-401f-afc5-9a5f44849478',
                'lokasi_hewan_id' => '72183a0e-3058-43db-afed-71e4c2deb12e',
                'penduduk_id' => '4751e608-3494-4971-8e5a-659c17bff4a5',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:17:58',
                'updated_at' => '2022-11-12 14:17:58',
            ),
            52 => 
            array (
                'id' => '870ce2bf-09cf-419c-b369-31a9e8e5039a',
                'lokasi_hewan_id' => '78c172c0-c5b0-427e-99b7-4b545f0cb6fb',
                'penduduk_id' => '50e43962-86b4-4ba9-8f8d-08cb47987710',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:16:07',
                'updated_at' => '2022-11-12 14:16:07',
            ),
            53 => 
            array (
                'id' => '87e76b59-6163-4aca-a9cc-7b2f1a631460',
                'lokasi_hewan_id' => '3b470bcb-740b-4cbe-bb25-2ec1ffda1a36',
                'penduduk_id' => '91c920c2-e4c1-495d-b268-9463676f7ad3',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:27:07',
                'updated_at' => '2022-10-21 20:27:07',
            ),
            54 => 
            array (
                'id' => '88e96aea-ee52-43f7-b96f-a848bbe1af8c',
                'lokasi_hewan_id' => 'dbbce63b-71df-421f-870c-dad9c557bddf',
                'penduduk_id' => 'cabc9b2e-8c5a-4eb6-a6d7-9a9a487602d9',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:57:35',
                'updated_at' => '2022-10-21 14:57:35',
            ),
            55 => 
            array (
                'id' => '88fc421a-cb75-4b91-afb8-409181c4b380',
                'lokasi_hewan_id' => 'd71e7535-94fe-42a2-a11b-99b6fee83958',
                'penduduk_id' => 'f03ca6be-7495-448e-9b46-f0fed2f8b8e9',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:20:14',
                'updated_at' => '2022-11-12 15:20:14',
            ),
            56 => 
            array (
                'id' => '8a209a61-c413-46dc-bbe5-f581202af397',
                'lokasi_hewan_id' => '6c85c452-5c1e-4e1f-a148-b9ecfe20aef3',
                'penduduk_id' => '2a9c8c84-6009-49a3-8077-1fdaeacf635f',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:37:10',
                'updated_at' => '2022-11-12 14:37:10',
            ),
            57 => 
            array (
                'id' => '8e00996a-73ab-4c18-9c52-65d8a5d7b63c',
                'lokasi_hewan_id' => 'abd5cc45-4b8a-4024-b8ae-086a5c719add',
                'penduduk_id' => 'e386a578-93e2-4aa9-b806-c848423c9390',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:24:36',
                'updated_at' => '2022-11-12 14:24:36',
            ),
            58 => 
            array (
                'id' => '98186a45-c23b-4425-a574-9eef46257e1b',
                'lokasi_hewan_id' => '30c1fa19-69b7-4618-9bbc-617cb9f4d7b8',
                'penduduk_id' => '0387855d-964c-4b41-bc21-245dec444339',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:14:26',
                'updated_at' => '2022-11-12 15:14:26',
            ),
            59 => 
            array (
                'id' => '9ab1cace-7a01-4a0a-a776-d50bae7c2a2a',
                'lokasi_hewan_id' => 'd244995b-bff6-47e4-887a-2ee071cfbd1d',
                'penduduk_id' => '6342ce45-05e8-4549-ac81-053ef88a69eb',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:58:06',
                'updated_at' => '2022-11-12 14:58:06',
            ),
            60 => 
            array (
                'id' => '9cee9782-c5d3-422b-86e5-180f7f161ccf',
                'lokasi_hewan_id' => '36284a26-900a-4836-9680-5c46076ad472',
                'penduduk_id' => 'feefd03f-41e6-4ee5-a3cc-7437777903b0',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:56:42',
                'updated_at' => '2022-10-21 14:56:42',
            ),
            61 => 
            array (
                'id' => '9e7904e2-9e4e-4601-8c48-ff81981c7412',
                'lokasi_hewan_id' => '1f52395a-dd9f-476b-af1f-7ba0d7615a48',
                'penduduk_id' => '33731e31-fc4a-43d8-a951-e014b0a9c5c2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:09:01',
                'updated_at' => '2022-11-12 15:09:01',
            ),
            62 => 
            array (
                'id' => '9f503f98-e5ff-4a2f-a5c8-42803335de18',
                'lokasi_hewan_id' => 'e2b99e34-8f35-4576-b76c-c82dba979dfd',
                'penduduk_id' => '2f861c4d-a107-4bd9-ae35-e12942e5866c',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:34:12',
                'updated_at' => '2022-11-12 14:34:12',
            ),
            63 => 
            array (
                'id' => 'a71fa4b2-077b-44b8-9d85-b84852243566',
                'lokasi_hewan_id' => '22e94eae-bf2c-42af-a7c1-d5d893afc585',
                'penduduk_id' => 'e78e816f-b0b7-41ab-be84-ba71035f85d9',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:35:13',
                'updated_at' => '2022-11-12 14:35:13',
            ),
            64 => 
            array (
                'id' => 'aa83ebdc-f23a-401e-a1cd-51e1921d65e1',
                'lokasi_hewan_id' => '3f167bfa-d1a1-451c-8b16-9e0514c573d9',
                'penduduk_id' => 'afccc775-217b-4d0a-ae7f-b530e9b09d12',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:17:15',
                'updated_at' => '2022-11-12 15:17:15',
            ),
            65 => 
            array (
                'id' => 'abb029cd-c6c9-48e6-86c7-c02b72cc6a3b',
                'lokasi_hewan_id' => 'dcb11a92-4c3a-40f0-a5f2-1c9e0c466a6d',
                'penduduk_id' => '3c7345cb-de35-482b-b65d-67f462799060',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:20:07',
                'updated_at' => '2022-11-12 14:20:07',
            ),
            66 => 
            array (
                'id' => 'ace89b11-288b-4684-be06-72f5c28d06a3',
                'lokasi_hewan_id' => '216054af-e187-4dc7-9a1d-5e998eda2334',
                'penduduk_id' => '6c06e04d-867c-4e6d-acbc-958d27f7befb',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:49:42',
                'updated_at' => '2022-11-12 14:49:42',
            ),
            67 => 
            array (
                'id' => 'ad30b87b-18cb-4653-b8b6-4e26e20be639',
                'lokasi_hewan_id' => 'f2565a97-dcb4-4fe8-9d6a-aba7a278e904',
                'penduduk_id' => '1fe31613-a1a8-40fa-96d4-31380cc6bb23',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:33:11',
                'updated_at' => '2022-11-12 14:33:11',
            ),
            68 => 
            array (
                'id' => 'b0dbcf8e-dee5-4761-8eb0-beb5a25965bd',
                'lokasi_hewan_id' => '24dfd08f-4ed0-4c73-bd1e-c9195f76f73b',
                'penduduk_id' => '29110cde-7ec9-4f7e-b1c4-560557fca531',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:45:29',
                'updated_at' => '2022-10-21 20:45:29',
            ),
            69 => 
            array (
                'id' => 'b3808a3c-d300-4e09-b64f-ef37e0fe41a1',
                'lokasi_hewan_id' => '17f1c021-1c0c-43b8-88a5-8e8053ef8c52',
                'penduduk_id' => '8dcee5e7-fbf2-45f0-9f78-2d180f4e2e0e',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:15:35',
                'updated_at' => '2022-11-12 15:15:35',
            ),
            70 => 
            array (
                'id' => 'b5d0aee1-3cf2-4b56-9c5f-7e1d2d1e6bf6',
                'lokasi_hewan_id' => 'fcfb1a77-1b2e-4750-8a34-e6e4e5ab91f9',
                'penduduk_id' => '44aca47f-47cc-4a34-8551-006a56d82a91',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:40:30',
                'updated_at' => '2022-10-21 20:40:30',
            ),
            71 => 
            array (
                'id' => 'b6657d3d-cf15-4b13-92e9-ea6d6c39e959',
                'lokasi_hewan_id' => '5c1dcd20-e333-4a89-98b1-5196eb3d9974',
                'penduduk_id' => '79ec925b-eaff-478b-9536-d2ddeb26adac',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:15:12',
                'updated_at' => '2022-11-12 14:15:12',
            ),
            72 => 
            array (
                'id' => 'b96ca1f5-0561-4d7e-9d18-8cfaae320cd1',
                'lokasi_hewan_id' => 'e9a8a64b-575b-48e4-a665-8f7e14b91c4e',
                'penduduk_id' => 'ad23dcda-50a1-4ad4-bc95-33f17f41bfd3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:12:50',
                'updated_at' => '2022-11-12 15:12:50',
            ),
            73 => 
            array (
                'id' => 'bec8eb43-0da0-4759-b5c2-a774ecea80b4',
                'lokasi_hewan_id' => '0de5cd04-645b-455d-9c66-8dbc4c7b190f',
                'penduduk_id' => '37fd4b62-fbfb-4782-bb10-f4b32bbc1636',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:43:04',
                'updated_at' => '2022-10-21 20:43:04',
            ),
            74 => 
            array (
                'id' => 'c2be57b1-3d5e-4aa0-a1b4-c4aa522e7b38',
                'lokasi_hewan_id' => '0db731b8-cb92-46a4-8b79-4a891ae5377b',
                'penduduk_id' => '3a1b4e49-33fa-47c4-8448-95bc017d896f',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:31:38',
                'updated_at' => '2022-11-12 14:31:38',
            ),
            75 => 
            array (
                'id' => 'c2f85f51-85f0-4ff5-b42b-6b6ac9541557',
                'lokasi_hewan_id' => '9070d9bd-0d0e-40fb-b192-fe514f8986f3',
                'penduduk_id' => 'aeba60e2-3fb0-4735-9e71-3f962bc649b6',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:28:43',
                'updated_at' => '2022-10-21 20:28:43',
            ),
            76 => 
            array (
                'id' => 'c513924c-4823-4923-af78-e3b84e4fbeee',
                'lokasi_hewan_id' => 'ef35ae57-76af-4cbb-ba8b-1a25efdbaefc',
                'penduduk_id' => 'cfad416f-87db-4f59-be98-d7b718f6bd66',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:05:06',
                'updated_at' => '2022-10-21 20:05:06',
            ),
            77 => 
            array (
                'id' => 'c66c29a6-7178-4f43-8ab2-b4f90e2fc59d',
                'lokasi_hewan_id' => 'a6e21a04-482c-41f0-9d88-eb883ce36b4c',
                'penduduk_id' => '0228431d-bc2e-40ff-8df3-4e45d30c8144',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:58:58',
                'updated_at' => '2022-11-12 14:58:58',
            ),
            78 => 
            array (
                'id' => 'c9041b9e-aa12-4426-a097-74ffa5c0660a',
                'lokasi_hewan_id' => '891c0b08-d002-4abc-8ab9-b7a371a4b8dd',
                'penduduk_id' => '52cf0727-cc13-4597-b707-d230eecce980',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:55:13',
                'updated_at' => '2022-10-21 14:55:13',
            ),
            79 => 
            array (
                'id' => 'cad40ab6-3a0f-427f-888a-9ea8df182da0',
                'lokasi_hewan_id' => 'f958fbee-4c04-488e-83c3-7d228ffdfa5f',
                'penduduk_id' => '3770b3eb-257d-4fa8-9990-e85e21c03d11',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:11:53',
                'updated_at' => '2022-11-12 14:11:53',
            ),
            80 => 
            array (
                'id' => 'cc503dc3-3142-4c1f-b4a7-27155d4b192b',
                'lokasi_hewan_id' => '69ef7267-f028-4898-8ad6-8547971d2611',
                'penduduk_id' => 'ef277e51-5a4f-4e31-8a73-8e2b26521b55',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:54:59',
                'updated_at' => '2022-10-21 19:54:59',
            ),
            81 => 
            array (
                'id' => 'cee7374e-1e4a-44dc-82ac-5f1d4798c6c5',
                'lokasi_hewan_id' => '8622d87c-41fc-462c-92a8-f63b5af08ce9',
                'penduduk_id' => '098efe00-ebb8-43ee-911c-61a4dedfc247',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:41:02',
                'updated_at' => '2022-10-21 20:41:02',
            ),
            82 => 
            array (
                'id' => 'd007e58f-a6e7-4d9b-871b-78e4df0931a4',
                'lokasi_hewan_id' => '992c6ccc-5520-497a-b6f6-112027c03311',
                'penduduk_id' => '8122183d-a718-4c73-bab4-1a94bdfdc3de',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:04:52',
                'updated_at' => '2022-11-12 15:04:52',
            ),
            83 => 
            array (
                'id' => 'd0737a40-c298-4ace-88f3-c7412b9fee3e',
                'lokasi_hewan_id' => 'bdd257ad-fad9-4ffd-be7c-7337d81409c3',
                'penduduk_id' => '5d9628a2-a59b-4f2e-9a41-06e228d72671',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:09:42',
                'updated_at' => '2022-10-21 20:09:42',
            ),
            84 => 
            array (
                'id' => 'd13102e3-66b2-4ee6-82a7-66ae89af694b',
                'lokasi_hewan_id' => 'dd8932ca-0fe8-4fa5-9e3e-23a5a7356703',
                'penduduk_id' => 'bf654a43-b10c-4d29-92aa-f7629658ccae',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:18:25',
                'updated_at' => '2022-11-12 15:18:25',
            ),
            85 => 
            array (
                'id' => 'd2227eac-839d-4fb5-ab51-3ebd4a186ceb',
                'lokasi_hewan_id' => 'dfcf92f5-e31d-48c1-8e0a-ace7add43e20',
                'penduduk_id' => 'c8b79f9d-76b1-4520-a3ba-fac88899728c',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:34:25',
                'updated_at' => '2022-10-21 20:34:25',
            ),
            86 => 
            array (
                'id' => 'd4c61182-4d7a-4702-8acb-786fb47add4b',
                'lokasi_hewan_id' => '064913e9-f4e9-426d-8751-4b0df1821eba',
                'penduduk_id' => 'c39f047b-ae1b-4c71-ad8c-11475ca8aae2',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:50:17',
                'updated_at' => '2022-10-21 19:50:17',
            ),
            87 => 
            array (
                'id' => 'd73b1acb-ac16-4d60-bd6e-71a6495a1dbf',
                'lokasi_hewan_id' => '16c73fb6-f254-4c24-86ca-84389f405a2d',
                'penduduk_id' => '0ff35d99-7a74-4848-9dc4-bae7008ac151',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:56:12',
                'updated_at' => '2022-10-21 19:56:12',
            ),
            88 => 
            array (
                'id' => 'd7933967-df69-488f-8ccb-353e4549aba3',
                'lokasi_hewan_id' => 'f84f9e8d-8d26-4829-8ff0-0143e1ed0165',
                'penduduk_id' => '2ddb4437-9b62-4b00-8d0b-79bf1d0c719b',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 19:53:41',
                'updated_at' => '2022-10-21 19:53:41',
            ),
            89 => 
            array (
                'id' => 'd8869b49-ae7c-478f-843d-9cee654dd8d8',
                'lokasi_hewan_id' => '440fbbc7-2610-422f-ac2b-5af95597cc3e',
                'penduduk_id' => '8b60f38b-41d9-4bf1-ab75-2169bd4d063b',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:59:41',
                'updated_at' => '2022-11-12 14:59:41',
            ),
            90 => 
            array (
                'id' => 'dbf49fcd-7ff1-4d62-8304-d930bce492eb',
                'lokasi_hewan_id' => '7cb2880a-6239-4d39-a2c0-7a39d01bc456',
                'penduduk_id' => '86f741d6-2623-469a-8234-603659027c38',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:39:49',
                'updated_at' => '2022-10-21 20:39:49',
            ),
            91 => 
            array (
                'id' => 'df2853de-bfb2-4cad-861b-97d46cf94a5c',
                'lokasi_hewan_id' => '1f9e3252-06fb-4eef-b6d5-91509e6b51b0',
                'penduduk_id' => 'df17eb77-00ea-469f-857e-9824f92ba424',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:10:46',
                'updated_at' => '2022-11-12 14:10:46',
            ),
            92 => 
            array (
                'id' => 'e07dcbc5-e4e9-49a0-b2cf-d8b7192fcc32',
                'lokasi_hewan_id' => '1cadc403-436b-4d4b-9c6b-943b57a904c8',
                'penduduk_id' => 'cee97232-99bb-4e33-a6af-3c2156b72fb3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:16:18',
                'updated_at' => '2022-11-12 15:16:18',
            ),
            93 => 
            array (
                'id' => 'e1bbda63-a9a6-483d-a678-ab820d7c61e1',
                'lokasi_hewan_id' => '162f0076-aa6c-49d3-910f-506928439fc4',
                'penduduk_id' => '81a5e618-cc6b-4c96-83aa-e8fb539defb6',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:35:55',
                'updated_at' => '2022-10-21 20:35:55',
            ),
            94 => 
            array (
                'id' => 'e8647540-3bb6-4015-8c74-1640ac5c82b5',
                'lokasi_hewan_id' => 'ee5d8ebc-1195-4002-a2b4-5b30f27aab6c',
                'penduduk_id' => '88221ee5-c109-498b-a87b-3209839803fe',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 20:19:36',
                'updated_at' => '2022-10-21 20:19:36',
            ),
            95 => 
            array (
                'id' => 'e87f963d-2d80-4557-9aea-71da865ad297',
                'lokasi_hewan_id' => '068304c9-d709-4ac0-83a4-d6c7fa9ce21b',
                'penduduk_id' => 'd3c831a6-1bf2-40fd-b045-04fa95d7a68f',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:25:03',
                'updated_at' => '2022-11-12 14:25:03',
            ),
            96 => 
            array (
                'id' => 'ef24535d-1331-44d4-9ded-17249b4cc6ec',
                'lokasi_hewan_id' => '440ceb82-17cd-49e8-ab4a-f48746dc50a3',
                'penduduk_id' => 'baa30434-ad6e-440b-bb02-a2f17f018415',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:17:53',
                'updated_at' => '2022-11-12 15:17:53',
            ),
            97 => 
            array (
                'id' => 'ef271e4c-5d45-4378-aa52-835dafc88fca',
                'lokasi_hewan_id' => '8703dd48-7656-40cb-9ee3-5271391eca33',
                'penduduk_id' => '476fd7ca-dc67-4094-bf47-708edf28f83f',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:32:08',
                'updated_at' => '2022-11-12 14:32:08',
            ),
            98 => 
            array (
                'id' => 'f09cbb22-7c97-43dd-82c0-5d881d23a295',
                'lokasi_hewan_id' => '4820d004-b03b-43bb-a662-5476b36b5268',
                'penduduk_id' => 'a7fd1545-ce4f-4425-bd42-c2f48cf7f531',
                'deleted_at' => NULL,
                'created_at' => '2022-10-21 14:54:31',
                'updated_at' => '2022-10-21 14:54:31',
            ),
            99 => 
            array (
                'id' => 'f337640e-ecd3-4aee-b3b8-c04dcc88a2d3',
                'lokasi_hewan_id' => '244c6ff5-f133-4d62-b8fc-f6cfd5db8dd5',
                'penduduk_id' => '707bd8ea-f958-4fbd-83c8-981cadc5fed2',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:44:59',
                'updated_at' => '2022-11-12 14:44:59',
            ),
            100 => 
            array (
                'id' => 'f4c4797b-4a91-4e32-a55d-f294b9cc0d06',
                'lokasi_hewan_id' => '03c84da3-b958-469b-abce-ea7e9b42b317',
                'penduduk_id' => '2e8a4622-2f90-44ff-8eae-e4f47d0d3059',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:00:13',
                'updated_at' => '2022-11-12 15:00:13',
            ),
            101 => 
            array (
                'id' => 'f6485ac3-4229-4dcf-b983-90bf37ce546d',
                'lokasi_hewan_id' => '6c517a5f-1336-44a2-a489-d04f32f1947b',
                'penduduk_id' => '29bab67a-93bc-473b-92df-e6da87ae39b3',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:09:02',
                'updated_at' => '2022-11-12 14:09:02',
            ),
            102 => 
            array (
                'id' => 'f64d1e32-fc97-4eff-9602-d8ae1712124b',
                'lokasi_hewan_id' => '49d6d5fd-5bea-428b-9bd7-5dd6931c8b04',
                'penduduk_id' => 'fe2b760b-e2b4-4d05-8413-6719b8d244cb',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:13:53',
                'updated_at' => '2022-11-12 14:13:53',
            ),
            103 => 
            array (
                'id' => 'f9447cc4-16d2-4df3-abb2-4a9f3cba3db2',
                'lokasi_hewan_id' => '83e52f4c-6452-47ae-8467-43243fd647f7',
                'penduduk_id' => '6b0651bf-d8aa-4158-ab63-8e3d3ba6fca4',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 15:03:38',
                'updated_at' => '2022-11-12 15:03:38',
            ),
            104 => 
            array (
                'id' => 'fbb81289-d1b4-4fe5-ac62-13ef183be7ff',
                'lokasi_hewan_id' => '05f0ad5b-a23e-4b04-8a40-fc303266b13d',
                'penduduk_id' => 'dd998d05-fe63-4ce7-b3d1-7a3abc47f50c',
                'deleted_at' => NULL,
                'created_at' => '2022-11-12 14:45:28',
                'updated_at' => '2022-11-12 14:45:28',
            ),
        ));
        
        
    }
}