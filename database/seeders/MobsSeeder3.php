<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mob;

class MobsSeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1.11
       Mob::create([
            'name' => 'Llama',
            'graphic' => 'https://minecraft.wiki/images/Brown_Llama_JE2_BE2.png?3b960',
            'game_version_id' => 15,
            'health' => ,
            'height' => ,
            'behavior' => json_encode(['']),
            'spawn' => json_encode(['']),
            'classification' => json_encode([''])
        ]);
       Mob::create([
            'name' => '',
            'graphic' => '',
            'game_version_id' => 15,
            'health' => ,
            'height' => ,
            'behavior' => json_encode(['']),
            'spawn' => json_encode(['']),
            'classification' => json_encode([''])
        ]);

        // 1.12
       Mob::create([
            'name' => '',
            'graphic' => '',
            'game_version_id' => 16,
            'health' => ,
            'height' => ,
            'behavior' => json_encode(['']),
            'spawn' => json_encode(['']),
            'classification' => json_encode([''])
        ]);
    }
}
