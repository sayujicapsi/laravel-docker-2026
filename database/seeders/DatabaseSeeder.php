<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Note: users are intentionally not seeded here. UserSeeder relies on the
     * model factory (Faker), which is a dev-only dependency and is not present
     * in the production image. Run it explicitly in dev: db:seed --class=UserSeeder
     */
    public function run(): void
    {
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
    }
}
