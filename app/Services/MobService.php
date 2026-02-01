<?php

namespace App\Services;

use App\Models\DailyMob;
use App\Models\Mob;

class MobService
{
    public function getDailyMob(){
        return DailyMob::latest('id')->first();
    }
    public function getDailyMobVersion(){
        return $this->getDailyMob()?->version;
    }
    public function getMobsForList(){
        return Mob::select('id', 'name')->orderBy('name')->get();
    }
    public function getMobsByName(){
        return Mob::orderBy('name')->get();
    }
}