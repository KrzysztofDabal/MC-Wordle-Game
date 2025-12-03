<?php

namespace App\Http\Controllers\Games\Mob;

use App\Http\Controllers\Controller;
use App\Models\Mob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobGuessingController extends Controller
{
    public function index(){
        $mobs = Mob::all();
        return view('games.mobs', compact('mobs'));
    }

    public function get_daily_mob(){
        return Mob::latest('id')->first();
    }
}
