<?php

namespace App\Http\Controllers\Games\Mob;

use App\Http\Controllers\Controller;
use App\Models\DailyMob;
use App\Models\Mob;
use Illuminate\Http\Request;

class MobGuessingController extends Controller
{
    public function index(Request $request){
        $version = DailyMob::latest('id')->value('version');
        $mobs = Mob::select('id', 'name')->orderBy('name')->get();
        return view('games.mobs', compact('version', 'mobs'));
    }

    public function getDailyMob(){
        $dailymob = DailyMob::latest('id')->first();
        return $dailymob;
    }

    public function getMobs(Request $request){
        return Mob::orderBy('name')->get();
    }

    public function checkGuess(Request $request){
        $validated_id = $request->validate([
            'mob_id' => ['required', 'integer', 'exists:mobs,id']
        ]);

        $guess = Mob::where('id', '=', $validated_id)->firstOrFail();
        $daily = $this->getDailyMob();
        $result = $guess->id === $daily->mob_id;
        return response()->json([
            'version' => $daily->version,
            'name' => $guess->name,
            'is_guess_corect' => $result
        ]);
    }

    public function compareGuessValue($guess, $daily){
        switch($guess <=> $daily){
            case -1:
                $result = "wrong up"; break;
            case 0:
                $result = "correct"; break;
            case 1:
                $result = "wrong down"; break;
        }
        return $result;
    }

    public function compareGuessJsonValue($guess, $daily){
        $guess_value = is_string($guess) ? json_decode($guess, true) : $guess;
        $daily_value = is_string($daily) ? json_decode($daily, true) : $daily;
        if($guess_value == $daily_value){
            $result = "correct";
        }
        else if(count(array_intersect($guess_value, $daily_value)) > 0){
                $result = "partial";
        }  
        else{
            $result = "wrong";
        }
        return $result;
    }

    public function compareToDaily(Request $request){
        $validated_name = $request->validate([
            'guess_to_compare' => ['required', 'string', 'exists:mobs,name']
        ]);

        $guess = Mob::with('game_version')->where('name', '=', $validated_name)->firstOrFail();
        $daily = $this->getDailyMob();
        $daily_mob = Mob::with('game_version')->find($daily->mob_id);

        $name_response = $guess->name === $daily_mob->name ? "correct" : "wrong";
        $version_response = $this->compareGuessValue($guess->game_version->release_order, $daily_mob->game_version->release_order);
        $health_response = $this->compareGuessValue((int)$guess->health, (int)$daily_mob->health);
        $height_response = $this->compareGuessValue((float)$guess->height, (float)$daily_mob->height);
        $behavior_response = $this->compareGuessJsonValue($guess->behavior, $daily_mob->behavior);
        $spawn_response = $this->compareGuessJsonValue($guess->spawn, $daily_mob->spawn);
        $classification_response = $this->compareGuessJsonValue($guess->classification, $daily_mob->classification);

        $result = [
            'name' => $guess->name,
            'name_is_correct' => $name_response,

            'graphic' => $guess->graphic,
            
            'game_version' => $guess->game_version,
            'game_version_is_correct' => $version_response,

            'health' => $guess->health,
            'health_is_correct' => $health_response,

            'height' => $guess->height,
            'height_is_correct' => $height_response,

            'behavior' => $guess->behavior,
            'behavior_is_correct' => $behavior_response,

            'spawn' => $guess->spawn,
            'spawn_is_correct' => $spawn_response,
            
            'classification' => $guess->classification,
            'classification_is_correct' => $classification_response
        ];

        return response()->json($result);
    }
}
