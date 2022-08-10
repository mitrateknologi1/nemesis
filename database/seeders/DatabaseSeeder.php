<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\OPDSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
                $this->call(OPDSeeder::class);
                $this->call(PerencanaanKeongSeeder::class);
                $this->call(DesaSeeder::class);
                $this->call(HewanSeeder::class);
        }
}
