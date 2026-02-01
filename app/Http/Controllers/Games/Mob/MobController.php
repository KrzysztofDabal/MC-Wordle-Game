<?php

namespace App\Http\Controllers\Games\Mob;

use App\Http\Controllers\Controller;
use App\Models\Mob;
use Illuminate\Http\Request;

class MobController extends Controller
{
    public function getMobs(){
        $mobs = Mob::all();
        return $mobs;
    }

    public function addMob(){
        $mobs = Mob::all();
        return $mobs;
    }

    public function storeMob(){
        $mobs = Mob::all();
        return $mobs;
    }

    public function updateMob(){
        $mobs = Mob::all();
        return $mobs;
    }
}
