<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Seeders\OPDSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\DesaSeeder;
use Database\Seeders\HewanSeeder;
use Illuminate\Support\Facades\File;
use App\Models\DokumenPerencanaanKeong;
use Database\Seeders\LokasiKeongSeeder;
use Illuminate\Support\Facades\Storage;
use Database\Seeders\PerencanaanKeongSeeder;
use Database\Seeders\LokasiPerencanaanKeongSeeder;
use Database\Seeders\DokumenPerencanaanKeongSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('/public/uploads');
        Storage::makeDirectory('/public/uploads');

        File::copyDirectory(
            public_path('file_dummy'),
            storage_path('app/public/uploads')
        );

        $this->call(OPDSeeder::class);
        $this->call(PerencanaanKeongSeeder::class);
        $this->call(RealisasiKeongSeeder::class);
        $this->call(DesaSeeder::class);
        $this->call(HewanSeeder::class);
        $this->call(LokasiKeongTableSeeder::class);
        $this->call(LokasiPerencanaanKeongSeeder::class);
        $this->call(LokasiHewanSeeder::class);
        $this->call(DokumenPerencanaanKeongSeeder::class);
    }
}
