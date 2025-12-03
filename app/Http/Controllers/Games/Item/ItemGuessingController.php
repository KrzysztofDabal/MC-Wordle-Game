<?php

namespace App\Http\Controllers\Games\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemGuessingController extends Controller
{
    public function index(){
        return view('games.items');
    }
}
