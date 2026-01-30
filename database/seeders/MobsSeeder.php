<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pre Alpha
        DB::table('mobs')->insert([
            'name' => 'Zombie',
            'graphic' => 'https://minecraft.wiki/images/Zombie_JE3_BE2.png?228b5',
            'game_version_id' => 1,
            'health' => 20,
            'height' => 1.95,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Light Level', 'Spawner']),
            'classification' => json_encode(['Undead'])
        ]);
        DB::table('mobs')->insert([
            'name' => 'Creeper',
            'graphic' => 'https://minecraft.wiki/images/Creeper_JE3_BE1.png?dc7b2',
            'game_version_id' => 1,
            'health' => 20,
            'height' => 1.7,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Light Level']),
            'classification' => json_encode(['None'])
        ]);
        DB::table('mobs')->insert([
            'name' => 'Spider',
            'graphic' => 'https://minecraft.wiki/images/thumb/Spider_JE5_BE4.png/1280px-Spider_JE5_BE4.png?b090e',
            'game_version_id' => 1,
            'health' => 16,
            'height' => 0.9,
            'behavior' => json_encode(['Neutral', 'Hostile']),
            'spawn' => json_encode(['Light Level', 'Spawner', 'Jockey']),
            'classification' => json_encode(['Arthropod'])
        ]);
        DB::table('mobs')->insert([
            'name' => 'Skeleton',
            'graphic' => 'https://minecraft.wiki/images/Skeleton_JE6_BE4.png?85786',
            'game_version_id' => 1,
            'health' => 20,
            'height' => 1.99,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Light Level', 'Spawner', 'Structure', 'Lightning']),
            'classification' => json_encode(['Undead'])
        ]);
        DB::table('mobs')->insert([
            'name' => 'Pig',
            'graphic' => 'https://minecraft.wiki/images/Temperate_Pig_JE4_BE2.png?26a31',
            'game_version_id' => 1,
            'health' => 10,
            'height' => 0.9,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Grass', 'Breeding', 'Structure']),
            'classification' => json_encode(['Animal'])
        ]);
        DB::table('mobs')->insert([
            'name' => 'Sheep',
            'graphic' => 'https://minecraft.wiki/images/White_Sheep_JE4_BE7.png?5062a',
            'game_version_id' => 1,
            'health' => 8,
            'height' => 1.3,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Grass', 'Breeding', 'Structure']),
            'classification' => json_encode(['Animal'])
        ]);

        // Alpha 1.0.8
        DB::table('mobs')->insert([
            'name' => 'Cow',
            'graphic' => 'https://minecraft.wiki/images/Cow_JE7_BE4.png?a8c84',
            'game_version_id' => 2,
            'health' => 10,
            'height' => 1.4,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Grass', 'Breeding', 'Structure', 'Conversion']),
            'classification' => json_encode(['Animal'])
        ]);

        // Alpha 1.0.11
        DB::table('mobs')->insert([
            'name' => 'Slime',
            'graphic' => 'https://minecraft.wiki/images/Slime_JE3_BE2.png?5b6a7',
            'game_version_id' => 3,
            'health' => 16,
            'height' => 2.04,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['biome', 'Magic','Sawner']),
            'classification' => json_encode(['None'])
        ]);

        // Alpha 1.0.14
        DB::table('mobs')->insert([
            'name' => 'Chicken',
            'graphic' => 'https://minecraft.wiki/images/Chicken_JE2_BE2.png?30245',
            'game_version_id' => 4,
            'health' => 4,
            'height' => 0.7,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Grass', 'Breeding', 'Projectile']),
            'classification' => json_encode(['Animal'])
        ]);
        // Alpha 1.2.0
        DB::table('mobs')->insert([
            'name' => 'Pigman',
            'graphic' => 'https://minecraft.wiki/images/Zombified_Piglin_JE9.png?b91da',
            'game_version_id' => 5,
            'health' => 20,
            'height' => 1.95,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Biome', 'Structure', 'Conversion', 'Lightning']),
            'classification' => json_encode(['Undead'])
        ]);
        DB::table('mobs')->insert([
            'name' => 'Ghast',
            'graphic' => 'https://minecraft.wiki/images/Ghast_shooting_JE3.png?48502',
            'game_version_id' => 5,
            'health' => 10,
            'height' => 4,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Biome']),
            'classification' => json_encode(['None'])
        ]);

        // Beta 1.2
        DB::table('mobs')->insert([
            'name' => 'Squid',
            'graphic' => 'https://minecraft.wiki/images/Squid_JE2_BE2.png?1c3f9',
            'game_version_id' => 6,
            'health' => 10,
            'height' => 0.8,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Biome']),
            'classification' => json_encode(['Animal', 'Aquatic'])
        ]);

        // Beta 1.4
        DB::table('mobs')->insert([
            'name' => 'Wolf',
            'graphic' => 'https://minecraft.wiki/images/Wolf_JE2_BE2.png?ee46e',
            'game_version_id' => 7,
            'health' => 8,
            'height' => 0.85,
            'behavior' => json_encode(['Neutral', 'Passive']),
            'spawn' => json_encode(['Biome', 'Breeding']),
            'classification' => json_encode(['Animal'])
        ]);

        // Beta 1.8
        DB::table('mobs')->insert([
            'name' => 'Enderman',
            'graphic' => 'https://minecraft.wiki/images/thumb/Enderman_JE3_BE1.png/1024px-Enderman_JE3_BE1.png?c6308',
            'game_version_id' => 8,
            'health' => 40,
            'height' => 2.9,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Light Level', 'Biome']),
            'classification' => json_encode(['None'])
        ]);
        DB::table('mobs')->insert([
            'name' => 'Cave Spider',
            'graphic' => 'https://minecraft.wiki/images/Cave_Spider_JE3_BE3.png?86c1d',
            'game_version_id' => 8,
            'health' => 12,
            'height' => 0.5,
            'behavior' => json_encode(['Hostile', 'Neutral']),
            'spawn' => json_encode(['Spawner']),
            'classification' => json_encode(['Arthropod'])
        ]);
        DB::table('mobs')->insert([
            'name' => 'Silverfish',
            'graphic' => 'https://minecraft.wiki/images/Silverfish_JE1_BE1.gif?d40a7',
            'game_version_id' => 8,
            'health' => 8,
            'height' => 0.3,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Block', 'Spawner', 'Magic']),
            'classification' => json_encode(['Arthropod'])
        ]);
    }
}
