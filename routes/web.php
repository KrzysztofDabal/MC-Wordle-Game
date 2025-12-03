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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mobguesser', [MobGuessingController::class, 'index'])->name('mobguesser');
Route::post('/mobguesser/check', [MobGuessingController::class, 'check_guess'])->name('mobguesser.check');

Route::get('/blockguesser', [BlockGuessingController::class, 'index'])->name('blockguesser');

Route::get('/itemguesser', [ItemGuessingController::class, 'index'])->name('itemguesser');
