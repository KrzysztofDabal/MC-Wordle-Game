<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $release_order = 1;

        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => 'Pre Alpha'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => 'Alpha 1.0.8'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => 'Alpha 1.0.11'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => 'Alpha 1.0.14'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => 'Alpha 1.2.0'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => 'Beta 1.2'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => 'Beta 1.4'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => 'Beta 1.8'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => 'Beta 1.9'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.2.1'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.4.2'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.6.1'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.8'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.10'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.11'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.12'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.13'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.14'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.15'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.16'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.16.2'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.17'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.19'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.19.3'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.19.4'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.20.3'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.20.5'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.21.2'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.21.6'
        ]);
        DB::table('game_versions')->insert([
            'release_order' => $release_order++,
            'version' => '1.21.11'
        ]);
    }
}
