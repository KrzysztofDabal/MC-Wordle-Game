<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        GameVersionSeeder::class,
        MobsSeeder::class,
        MobsSeeder2::class,
        // MobsSeeder3::class,
        DailyMobSeeder::class,
        AdminSeeder::class
       ]);
    }
}
