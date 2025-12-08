<?php

namespace App\Http\Controllers\Games\Mob;

use App\Http\Controllers\Controller;
use App\Models\DailyMob;
use App\Models\Mob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobGuessingController extends Controller
{
    public function index(Request $request){
        $mobs = Mob::all();
        return view('games.mobs', compact('mobs'));
    }

    public function get_daily_mob(){
        $dailymob = DailyMob::latest('id')->first();
        return $dailymob;
    }

    public function get_mobs(Request $request){
        return Mob::orderBy('name')->get();
    }

    public function check_guess(Request $request){
        // $result = $this->compare_guess_daily($request->mob_id);

        $guess = Mob::find($request->mob_id);
        $daily = $this->get_daily_mob();
        $result = $guess->id === $daily->mob_id;
        return response()->json([
            'version' => $daily->version,
            'name' => $guess->name,
            'is_guess_corect' => $result
        ]);
    }

    public function compare_to_daily($mob_id){
        $guess = Mob::find($mob_id);
        $daily = $this->get_daily_mob();
        $daily_mob = Mob::find($daily->mob_id);

        
        $guess_spawn = is_string($guess->spawn) ? json_decode($guess->spawn, true) : $guess->spawn;
        $daily_spawn = is_string($daily_mob->spawn) ? json_decode($daily_mob->spawn, true) : $daily_mob->spawn;

        $result = [
            'name' => $guess->name,
            'name_is_correct' => $guess->name === $daily_mob->name,

            'graphic' => $guess->graphic,
            
            'game_version' => $guess->game_version,
            'game_version_is_correct' => $guess->game_version === $daily_mob->game_version,

            'health' => $guess->health,
            'health_is_correct' => (int)$guess->health === (int)$daily_mob->health,

            'height' => $guess->height,
            'height_is_correct' => (float)$guess->height === (float)$daily_mob->height,

            'behavior' => $guess->behavior,
            'behavior_is_correct' => $guess->behavior === $daily_mob->behavior,

            'spawn' => $guess->spawn,
            'spawn_is_correct' => count(array_intersect($guess_spawn, $daily_spawn)) > 0,
            
            'classification' => $guess->classification,
            'classification_is_correct' => $guess->classification === $daily_mob->classification
        ];

        return $result;
    }
}
