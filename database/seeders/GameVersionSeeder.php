<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GameVersion;
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

        GameVersion::create([
            'release_order' => $release_order++,
            'version' => 'Pre Alpha'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => 'Alpha 1.0.8'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => 'Alpha 1.0.11'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => 'Alpha 1.0.14'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => 'Alpha 1.2.0'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => 'Beta 1.2'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => 'Beta 1.4'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => 'Beta 1.8'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.0.0 (Beta 1.9)'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.2.1'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.4.2'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.6.1'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.8'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.9'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.10'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.11'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.12'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.13'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.14'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.15'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.16'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.16.2'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.17'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.19'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.19.3'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.19.4'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.20.3'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.20.5'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.21.2'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.21.6'
        ]);
        GameVersion::create([
            'release_order' => $release_order++,
            'version' => '1.21.11'
        ]);
    }
}
