<?php

namespace App\Http\Controllers\Games\Mob;

use App\Http\Controllers\Controller;
use App\Models\Mob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobGuessingController extends Controller
{
    public function index(Request $request){
        $mobs = Mob::all();
        return view('games.mobs', compact('mobs'));
    }

    public function get_daily_mob(Request $request){
        $dailymob = Mob::latest('id')->first();
        $mob = Mob::find($dailymob->mob_id)->first();
        return $mob;
    }

    public function get_mobs(Request $request){
        return Mob::orderBy('name')->get();
    }

    public function check_guess(Request $request){
        return response()->json([
            'received_id' => $request->mob_id
        ]);
    }

        // $request->validate([
        //     'mob_id' => 'required|exist:mobs, id'
        // ]);

        // $result = $this->compare_guess_daily($request->mob_id);

    public function compare_guess_daily($mob_id){
        $guess = Mob::find($mob_id)->first();
        $daily = $this->get_daily_mob();

        
        $guess_spawn = is_string($guess->spawn) ? json_decode($guess->spawn, true) : $guess->spawn;
        $daily_spawn = is_string($daily->spawn) ? json_decode($daily->spawn, true) : $daily->spawn;

        $result = [
            'name' => $guess->name,
            'name_is_correct' => $guess->name === $daily->name,

            'graphic' => $guess->graphic,
            
            'game_version' => $guess->game_version,
            'game_version_is_correct' => $guess->game_version === $daily->game_version,

            'health' => $guess->health,
            'health_is_correct' => (int)$guess->health === (int)$daily->health,

            'height' => $guess->height,
            'height_is_correct' => (float)$guess->height === (float)$daily->height,

            'behavior' => $guess->behavior,
            'behavior_is_correct' => $guess->behavior === $daily->behavior,

            'spawn' => $guess->spawn,
            'spawn_is_correct' => count(array_intersect($guess_spawn, $daily_spawn)) > 0,
            
            'classification' => $guess->classification,
            'classification_is_correct' => $guess->classification === $daily->classification
        ];

        return $result;
    }
}
