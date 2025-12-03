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
        DB::table('mobs')->insert([
            'name' => 'Zombie',
            'graphic' => 'https://minecraft.wiki/images/Zombie_JE3_BE2.png?228b5',
            'game_version' => 'Pre-alpha',
            'health' => 20,
            'height' => 1.95,
            'behavior' => 'Hostile',
            'spawn' => json_encode(['Light Level', 'Spawner']),
            'classification' => 'Undead'
        ]);
        DB::table('mobs')->insert([
            'name' => 'Creeper',
            'graphic' => 'https://minecraft.wiki/images/Creeper_JE3_BE1.png?dc7b2',
            'game_version' => 'Pre-alpha',
            'health' => 20,
            'height' => 1.7,
            'behavior' => 'Hostile',
            'spawn' => json_encode(['Light Level']),
            'classification' => 'None'
        ]);
        DB::table('mobs')->insert([
            'name' => 'Skeleton',
            'graphic' => 'https://minecraft.wiki/images/Skeleton_JE6_BE4.png?85786',
            'game_version' => 'Pre-alpha',
            'health' => 20,
            'height' => 1.99,
            'behavior' => 'Hostile',
            'spawn' => json_encode(['Light Level', 'Spawner', 'Structure', 'Lightning']),
            'classification' => 'Undead'
        ]);
        DB::table('mobs')->insert([
            'name' => 'Pig',
            'graphic' => 'https://minecraft.wiki/images/Temperate_Pig_JE4_BE2.png?26a31',
            'game_version' => 'Pre-alpha',
            'health' => 10,
            'height' => 0.9,
            'behavior' => 'Passive',
            'spawn' => json_encode(['Grass', 'Breeding', 'Structure']),
            'classification' => 'Animal'
        ]);
        DB::table('mobs')->insert([
            'name' => 'Chicken',
            'graphic' => 'https://minecraft.wiki/images/Chicken_JE2_BE2.png?30245',
            'game_version' => 'Pre-alpha',
            'health' => 4,
            'height' => 0.7,
            'behavior' => 'Passive',
            'spawn' => json_encode(['Grass', 'Breeding', 'Projectile']),
            'classification' => 'Animal'
        ]);
        DB::table('mobs')->insert([
            'name' => 'Cow',
            'graphic' => 'https://minecraft.wiki/images/Cow_JE7_BE4.png?a8c84',
            'game_version' => 'Pre-alpha',
            'health' => 10,
            'height' => 1.4,
            'behavior' => 'Passive',
            'spawn' => json_encode(['Grass', 'Breeding', 'Structure', 'Conversion']),
            'classification' => 'Animal'
        ]);
        DB::table('mobs')->insert([
            'name' => 'Enderman',
            'graphic' => 'https://minecraft.wiki/images/Zombified_Piglin_JE9.png?b91da',
            'game_version' => 'Pre-alpha',
            'health' => 40,
            'height' => 2.9,
            'behavior' => 'Hostile',
            'spawn' => json_encode(['Light Level', 'Biome']),
            'classification' => 'None'
        ]);
        DB::table('mobs')->insert([
            'name' => 'Pigman',
            'graphic' => 'https://minecraft.wiki/images/thumb/Enderman_JE3_BE1.png/1024px-Enderman_JE3_BE1.png?c6308',
            'game_version' => 'Pre-alpha',
            'health' => 20,
            'height' => 1.95,
            'behavior' => 'Hostile',
            'spawn' => json_encode(['Biome', 'Structure', 'Conversion', 'Lightning']),
            'classification' => 'Undead'
        ]);
        DB::table('mobs')->insert([
            'name' => 'Sheep',
            'graphic' => 'https://minecraft.wiki/images/White_Sheep_JE4_BE7.png?5062a',
            'game_version' => 'Pre-alpha',
            'health' => 8,
            'height' => 1.3,
            'behavior' => 'Passive',
            'spawn' => json_encode(['Grass', 'Breeding', 'Structure']),
            'classification' => 'Animal'
        ]);
    }
}
