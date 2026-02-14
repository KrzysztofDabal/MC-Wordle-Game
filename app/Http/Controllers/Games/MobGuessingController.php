<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Models\Mob;
use App\Services\GuessValueComparisonService;
use App\Services\MobService;

class MobGuessingController extends Controller
{
    public function __construct(private MobService $mobService, private GuessValueComparisonService $comparisonService) {}

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

        $guess = Mob::with('game_version')->where('name', $validated['guess_to_compare'])->firstOrFail();
        $daily = $this->mobService->getDailyMob();
        $daily_mob = Mob::with('game_version')->findOrFail($daily->mob_id);

        $name_response = $this->comparisonService->compareGuessValue($guess->name, $daily_mob->name);
        $graphic_response = $this->comparisonService->isNameCorrect($guess->name, $daily_mob->name);
        $version_response = $this->comparisonService->compareGuessUpDownValue($guess->game_version->release_order, $daily_mob->game_version->release_order);
        $health_response = $this->comparisonService->compareGuessUpDownValue((int)$guess->health, (int)$daily_mob->health);
        $height_response = $this->comparisonService->compareGuessUpDownValue((float)$guess->height, (float)$daily_mob->height);
        $behavior_response = $this->comparisonService->compareGuessJsonValue($guess->behavior, $daily_mob->behavior);
        $spawn_response = $this->comparisonService->compareGuessJsonValue($guess->spawn, $daily_mob->spawn);
        $classification_response = $this->comparisonService->compareGuessJsonValue($guess->classification, $daily_mob->classification);

        $result = [
            'name' => $guess->name,
            'name_is_correct' => $name_response,

            'graphic' => $guess->graphic,
            'graphic_is_correct' => $graphic_response,
            
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
