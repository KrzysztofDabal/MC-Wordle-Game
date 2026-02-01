<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Games\Mob\MobGuessingController;
use App\Http\Controllers\Games\Block\BlockGuessingController;
use App\Http\Controllers\Games\Item\ItemGuessingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/mob-guesser')->group(function(){
    Route::get('', [MobGuessingController::class, 'index'])->name('mob_guesser');
    Route::post('/check-guess', [MobGuessingController::class, 'checkGuess'])->name('mob_guesser.check_guess');
    Route::post('/compare-to-daily', [MobGuessingController::class, 'compareToDaily'])->name('mobGuesser.compare_to_daily');
    Route::get('/get-mobs', [MobGuessingController::class, 'getMobs'])->name('mobGuesser.ge_mobs');
});

// Route::get('/block-guesser', [BlockGuessingController::class, 'index'])->name('block_guesser');

// Route::get('/item-guesser', [ItemGuessingController::class, 'index'])->name('item_guesser');
