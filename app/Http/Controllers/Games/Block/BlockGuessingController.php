<?php

namespace App\Http\Controllers\Games\Block;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlockGuessingController extends Controller
{
    public function index(){
        return view('games.blocks');
    }
}
