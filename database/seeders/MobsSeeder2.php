<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mob;

class MobsSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1.0.0 (Beta 1.9)
       Mob::create([
            'name' => 'Blaze',
            'graphic' => 'https://minecraft.wiki/images/Blaze_JE2.png?29f6f&format=original',
            'game_version_id' => 9,
            'health' => 20,
            'height' => 1.8,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Structure', 'Spawner']),
            'classification' => json_encode(['None'])
        ]);
       Mob::create([
            'name' => 'Magma Cube',
            'graphic' => 'https://minecraft.wiki/images/Magma_Cube_JE2_BE2.png?b4389&format=original',
            'game_version_id' => 9,
            'health' => 16,
            'height' => 2.08,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Biome', 'Structure', 'Spawner']),
            'classification' => json_encode(['None'])
        ]);
       Mob::create([
            'name' => 'Mooshroom Cow',
            'graphic' => 'https://minecraft.wiki/images/Red_Mooshroom_JE5_BE3.png?de6c9&format=original',
            'game_version_id' => 9,
            'health' => 10,
            'height' => 1.4,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Biome', 'Breeding']),
            'classification' => json_encode(['Animal'])
        ]);
       Mob::create([
            'name' => 'Snow Golem',
            'graphic' => 'https://minecraft.wiki/images/Snow_Golem_JE2_BE2.png?23125&format=original',
            'game_version_id' => 9,
            'health' => 4,
            'height' => 1.9,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Summon']),
            'classification' => json_encode(['Golem'])
        ]);
       Mob::create([
            'name' => 'Villager',
            'graphic' => 'https://minecraft.wiki/images/Plains_Villager_Base_JE2.png?a2fcc&format=original',
            'game_version_id' => 9,
            'health' => 20,
            'height' => 1.95,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Structure', 'Breeding', 'Conversion']),
            'classification' => json_encode(['None'])
        ]);
       Mob::create([
            'name' => 'Ender Dragon',
            'graphic' => 'https://www.vhv.rs/dpng/d/419-4195607_minecraft-ender-dragon-clipart-png-download-minecraft-mobs.png',
            'game_version_id' => 9,
            'health' => 200,
            'height' => 8,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Structure', 'Summon']),
            'classification' => json_encode(['Boss'])
        ]);
        
        // 1.2.1
       Mob::create([
            'name' => 'Ocelot',
            'graphic' => 'https://minecraft.wiki/images/Ocelot_JE2_BE2.png?7d798&format=original',
            'game_version_id' => 10,
            'health' => 10,
            'height' => 0.7,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Biom', 'Breeding']),
            'classification' => json_encode(['Animal'])
        ]);
       Mob::create([
            'name' => 'Iron Golem',
            'graphic' => 'https://minecraft.wiki/images/Iron_Golem_JE2_BE2.png?2cd73&format=original',
            'game_version_id' => 10,
            'health' => 100,
            'height' => 2.7,
            'behavior' => json_encode(['Neutral']),
            'spawn' => json_encode(['Structure', 'Summon']),
            'classification' => json_encode(['Golem'])
        ]);

        // 1.4.2
       Mob::create([
            'name' => 'Zombie Villager',
            'graphic' => 'https://minecraft.wiki/images/Plains_Zombie_Villager_Base_JE1_BE1.png?7882a&format=original',
            'game_version_id' => 10,
            'health' => 20,
            'height' => 1.9,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Light Level', 'Conversion', 'Structure', 'Jockey', 'Reinforcement']),
            'classification' => json_encode(['Undead'])
        ]);
       Mob::create([
            'name' => 'Wither',
            'graphic' => 'https://minecraft.wiki/images/Wither_JE2_BE2.png?60b11',
            'game_version_id' => 10,
            'health' => 300,
            'height' => 3.5,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Summon']),
            'classification' => json_encode(['Undead', 'Boss'])
        ]);
       Mob::create([
            'name' => 'Wither Skeleton',
            'graphic' => 'https://minecraft.wiki/images/Wither_Skeleton_JE4_BE3.png?9c107&format=original',
            'game_version_id' => 10,
            'health' => 20,
            'height' => 2.4,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Structure']),
            'classification' => json_encode(['Undead'])
        ]);
       Mob::create([
            'name' => 'Bat',
            'graphic' => 'https://minecraft.wiki/images/Bat_JE4_BE3.png?db68c&format=original',
            'game_version_id' => 10,
            'health' => 6,
            'height' => 0.9,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Light Level']),
            'classification' => json_encode(['Animal'])
        ]);
       Mob::create([
            'name' => 'Witch',
            'graphic' => 'https://minecraft.wiki/images/Witch_JE3.png?aeb30&format=original',
            'game_version_id' => 10,
            'health' => 26,
            'height' => 1.95,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Light Level', 'Structure', 'Raid', 'Conversion', 'Lightning']),
            'classification' => json_encode(['None'])
        ]);

        // 1.6.1
       Mob::create([
            'name' => 'Horse',
            'graphic' => 'https://minecraft.wiki/images/White_Horse.png?0cc9a',
            'game_version_id' => 11,
            'health' => 22,
            'height' => 1.6,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Biome', 'Structure', 'Breeding']),
            'classification' => json_encode(['Animal'])
        ]);
       Mob::create([
            'name' => 'Donkey',
            'graphic' => 'https://minecraft.wiki/images/Donkey_JE5.png?9e2a1',
            'game_version_id' => 11,
            'health' => 22,
            'height' => 1.5,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Biome', 'Breeding']),
            'classification' => json_encode(['Animal'])
        ]);
       Mob::create([
            'name' => 'Mule',
            'graphic' => 'https://minecraft.wiki/images/Mule_JE5.png?3c1f0',
            'game_version_id' => 11,
            'health' => 22,
            'height' => 1.6,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Breeding']),
            'classification' => json_encode(['Animal'])
        ]);
       Mob::create([
            'name' => 'Skeleton Horse',
            'graphic' => 'https://minecraft.wiki/images/Skeleton_Horse.png?5e42a',
            'game_version_id' => 11,
            'health' => 15,
            'height' => 1.6,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Lightning']),
            'classification' => json_encode(['Animal', 'Undead'])
        ]);
       Mob::create([
            'name' => 'Zombie Horse',
            'graphic' => 'https://minecraft.wiki/images/Zombie_Horse_JE6.png?b6882',
            'game_version_id' => 11,
            'health' => 15,
            'height' => 1.6,
            'behavior' => json_encode(['Passive']),
            'spawn' => json_encode(['Biome', 'Grass', 'Light Level']),
            'classification' => json_encode(['Animal', 'Undead'])
        ]);

        // 1.8
       Mob::create([
            'name' => 'Endermite',
            'graphic' => 'https://minecraft.wiki/images/Endermite.png?920c2',
            'game_version_id' => 12,
            'health' => 8,
            'height' => 0.3,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Projectile']),
            'classification' => json_encode(['Arthropod'])
        ]);
       Mob::create([
            'name' => 'Guardian',
            'graphic' => 'https://minecraft.wiki/images/Guardian_JE2_BE2.png?19e5a',
            'game_version_id' => 12,
            'health' => 30,
            'height' => 0.85,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Structure']),
            'classification' => json_encode(['Aquatic'])
        ]);
       Mob::create([
            'name' => 'Elder Guardian',
            'graphic' => 'https://minecraft.wiki/images/Elder_Guardian_JE2_BE2.png?99f67',
            'game_version_id' => 12,
            'health' => 80,
            'height' => 1.9975,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Structure']),
            'classification' => json_encode(['Aquatic'])
        ]);
       Mob::create([
            'name' => 'Rabbit',
            'graphic' => 'https://minecraft.wiki/images/Brown_Rabbit_JE2_BE2.png?bc661',
            'game_version_id' => 12,
            'health' => 3,
            'height' => 0.5,
            'behavior' => json_encode(['Passive', 'Hostile']),
            'spawn' => json_encode(['biome', 'Breeding']),
            'classification' => json_encode(['Animal'])
        ]);

        // 1.9
       Mob::create([
            'name' => 'Shulker',
            'graphic' => 'https://minecraft.wiki/images/Shulker_JE1_BE1.png?02a87',
            'game_version_id' => 13,
            'health' => 30,
            'height' => 1,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Structure', 'Duplication']),
            'classification' => json_encode(['None'])
        ]);

        // 1.10
       Mob::create([
            'name' => 'Husk',
            'graphic' => 'https://minecraft.wiki/images/Husk_JE2_BE2.png?a6767',
            'game_version_id' => 14,
            'health' => 20,
            'height' => 1.95,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Biome', 'Light Level', 'Jockey', 'Spawner', 'Reinforcement']),
            'classification' => json_encode(['Undead'])
        ]);
       Mob::create([
            'name' => 'Polar Bear',
            'graphic' => 'https://minecraft.wiki/images/Polar_Bear_JE2_BE2.png?29c45',
            'game_version_id' => 14,
            'health' => 30,
            'height' => 1.4,
            'behavior' => json_encode(['Passive', 'Neutral']),
            'spawn' => json_encode(['Biome']),
            'classification' => json_encode(['Animal'])
        ]);
       Mob::create([
            'name' => 'Stray',
            'graphic' => 'https://minecraft.wiki/images/Stray_JE2_BE4.png?ef82d',
            'game_version_id' => 14,
            'health' => 20,
            'height' => 1.99,
            'behavior' => json_encode(['Hostile']),
            'spawn' => json_encode(['Biome', 'Light Level', 'Spawner', 'Conversion']),
            'classification' => json_encode(['Undead'])
        ]);
    }
}
