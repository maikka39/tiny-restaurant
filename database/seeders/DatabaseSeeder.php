<?php

namespace Database\Seeders;

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
        $this->call([
            SuperAdminSeeder::class,
            HomepageSeeder::class,
            MunicipalitySeeder::class,
            PageSeeder::class,
            FarmerSeeder::class,
            NewsItemSeeder::class,
            ProjectSeeder::class
        ]);
    }
}
