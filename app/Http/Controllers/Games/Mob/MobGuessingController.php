<?php

namespace App\Http\Controllers\Games\Mob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Models\Mob;
use App\Services\GuessValueComparsionService;
use App\Services\MobService;

class MobGuessingController extends Controller
{
    public function __construct(private MobService $mobService, private GuessValueComparsionService $comparisonService) {}

    public function index(Request $request)
    {
        $version = $this->mobService->getDailyMobVersion();
        $mobs = $this->mobService->getMobsForList();
        return view('games.mobs', compact('version', 'mobs'));
    }

    public function getMobs()
    {
        return $this->mobService->getMobsByName();
    }

    public function checkGuess(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'mob_id' => ['required', 'integer', 'exists:mobs,id']
        ]);

        $guess = Mob::where('id', '=', $validated['mob_id'])->firstOrFail();
        $daily = $this->mobService->getDailyMob();
        $result = $guess->id === $daily->mob_id;
        return response()->json([
            'version' => $daily->version,
            'name' => $guess->name,
            'is_guess_correct' => $result
        ]);
    }

    public function compareToDaily(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'guess_to_compare' => ['required', 'string', 'exists:mobs,name']
        ]);

        $guess = Mob::with('game_version')->where('name', '=', $validated['guess_to_compare'])->firstOrFail();
        $daily = $this->mobService->getDailyMob();
        $daily_mob = Mob::with('game_version')->find($daily->mob_id);

        $name_response = $guess->name === $daily_mob->name ? "correct" : "wrong";
        $version_response = $this->comparisonService->compareGuessValue($guess->game_version->release_order, $daily_mob->game_version->release_order);
        $health_response = $this->comparisonService->compareGuessValue((int)$guess->health, (int)$daily_mob->health);
        $height_response = $this->comparisonService->compareGuessValue((float)$guess->height, (float)$daily_mob->height);
        $behavior_response = $this->comparisonService->compareGuessJsonValue($guess->behavior, $daily_mob->behavior);
        $spawn_response = $this->comparisonService->compareGuessJsonValue($guess->spawn, $daily_mob->spawn);
        $classification_response = $this->comparisonService->compareGuessJsonValue($guess->classification, $daily_mob->classification);

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
