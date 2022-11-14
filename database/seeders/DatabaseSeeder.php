<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Seeders\OPDSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\DesaSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\HewanSeeder;
use Database\Seeders\SiswaSeeder;
use Database\Seeders\TahunSeeder;
use Database\Seeders\RoadMapSeeder;
use Database\Seeders\SekolahSeeder;
use Illuminate\Support\Facades\File;
use Database\Seeders\MasterPlanSeeder;
use Database\Seeders\LokasiHewanSeeder;
use Illuminate\Support\Facades\Storage;
use Database\Seeders\PendudukTableSeeder;
use Database\Seeders\JumlahHewanTableSeeder;
use Database\Seeders\LokasiKeongTableSeeder;
use Database\Seeders\PemilikLokasiKeongSeeder;
use Database\Seeders\RealisasiKeongTableSeeder;
use Database\Seeders\OpdTerkaitManusiaTableSeeder;
use Database\Seeders\PemilikLokasiHewanTableSeeder;
use Database\Seeders\DokumenRealisasiKeongTableSeeder;
use Database\Seeders\DokumenRealisasiManusiaTableSeeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('/uploads');
        Storage::makeDirectory('/uploads');

        File::copyDirectory(
            public_path('file_dummy'),
            storage_path('app/public/uploads')
        );

        $this->call(OPDSeeder::class);
        $this->call(DesaSeeder::class);
        $this->call(HewanSeeder::class);
        // $this->call(LokasiKeongTableSeeder::class);
        // $this->call(LokasiHewanSeeder::class);
        // $this->call(PendudukTableSeeder::class); // new
        // $this->call(RealisasiKeongTableSeeder::class);
        // $this->call(DokumenRealisasiKeongTableSeeder::class);
        // $this->call(LokasiRealisasiKeongTableSeeder::class);
        $this->call(TahunSeeder::class);
        $this->call(RoadMapSeeder::class);
        $this->call(MasterPlanSeeder::class);
        // $this->call(JumlahHewanTableSeeder::class);
        // $this->call(PemilikLokasiHewanTableSeeder::class);
        // $this->call(SekolahSeeder::class);
        // $this->call(SiswaSeeder::class);
        // $this->call(PemilikLokasiKeongSeeder::class);
        // $this->call(OpdTerkaitManusiaTableSeeder::class);
        // $this->call(PerencanaanManusiaTableSeeder::class);
        // $this->call(DokumenPerencanaanManusiaTableSeeder::class);
        // $this->call(RealisasiManusiaTableSeeder::class);
        // $this->call(DokumenRealisasiManusiaTableSeeder::class);
        // $this->call(OpdTerkaitKeongTableSeeder::class);
        // $this->call(PerencanaanHewanTableSeeder::class); // new
        // $this->call(OpdTerkaitHewanTableSeeder::class); // new
        // $this->call(DokumenPerencanaanHewanTableSeeder::class); // new
        // $this->call(RealisasiHewanTableSeeder::class);
        // $this->call(LokasiRealisasiHewanTableSeeder::class); // new
        // $this->call(DokumenRealisasiHewanTableSeeder::class);
        // $this->call(PerencanaanKeongTableSeeder::class);
        // $this->call(DokumenPerencanaanKeongTableSeeder::class);
        $this->call(SumberDanaSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(PendudukRealisasiManusiaTableSeeder::class);


        // Production
        $this->call(LokasiKeongTableSeeder::class);
        $this->call(ProductionPendudukTableSeeder::class);
        $this->call(ProductionLokasiHewanTableSeeder::class);
        $this->call(ProductionJumlahHewanTableSeeder::class);
        $this->call(ProductionPemilikLokasiHewanTableSeeder::class);
    }
}
