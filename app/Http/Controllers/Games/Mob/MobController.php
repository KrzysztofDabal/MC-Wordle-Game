<?php

namespace App\Http\Controllers\Games\Mob;

use App\Http\Controllers\Controller;
use App\Models\Mob;
use Illuminate\Http\Request;

class MobController extends Controller
{
    public function get_mobs(){
        $mobs = Mob::all();
        return $mobs;
    }

    public function add_mob(){
        $mobs = Mob::all();
        return $mobs;
    }

    public function store_mob(){
        $mobs = Mob::all();
        return $mobs;
    }

    public function update_mob(){
        $mobs = Mob::all();
        return $mobs;
    }
}
