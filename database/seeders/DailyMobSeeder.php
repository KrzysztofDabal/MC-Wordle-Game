<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mob;
use App\Models\DailyMob;
use Illuminate\Support\Facades\DB;

class DailyMobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mob = Mob::find(2);
        if($mob){
            DailyMob::create([
                'version' => 1,
                'mob_id' => $mob->id,
                'mob_name' => $mob->name,
                'date' => \Carbon\Carbon::now()->format('Y-m-d')
            ]);
        }
    }
}
