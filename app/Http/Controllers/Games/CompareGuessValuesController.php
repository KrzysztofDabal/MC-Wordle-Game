<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompareGuessValuesController extends Controller
{
    public function compare_guess_value($guess, $daily){
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

    public function compare_guess_json_value($guess, $daily){
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
}
