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
        
        $version = DailyMob::latest('id')->value('version');
        // $daily_mob = DailyMob::latest('id')->first();
        // $version = $daily_mob?->version;
        $mobs = Mob::select('id', 'name')->orderBy('name')->get();
        return view('games.mobs', compact('version', 'mobs'));
    }

    public function get_daily_mob(){
        $dailymob = DailyMob::latest('id')->first();
        return $dailymob;
    }

    public function get_mobs(Request $request){
        return Mob::orderBy('name')->get();
    }

    public function check_guess(Request $request){
        $validated_id = $request->validate([
            'mob_id' => ['required', 'integer', 'exists:mobs,id']
        ]);

        $guess = Mob::where('id', '=', $validated_id)->firstOrFail();
        $daily = $this->get_daily_mob();
        $result = $guess->id === $daily->mob_id;
        return response()->json([
            'version' => $daily->version,
            'name' => $guess->name,
            'is_guess_corect' => $result
        ]);
    }

    public function compare_to_daily(Request $request){
        $validated_name = $request->validate([
            'guess_to_compare' => ['required', 'string', 'exists:mobs,name']
        ]);

        $guess = Mob::where('name', '=', $validated_name)->firstOrFail();
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

        return response()->json($result);
    }
}
