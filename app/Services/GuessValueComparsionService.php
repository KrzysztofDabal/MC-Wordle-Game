<?php

namespace App\Services;

class GuessValueComparsionService
{
    public function compareGuessValue($guess, $daily){
        return $guess === $daily ? "correct" : "wrong";
    }
    public function isNameCorrect($guess, $daily){
        return $guess === $daily ? "correct" : "";
    }

    public function compareGuessUpDownValue($guess, $daily){
        switch($guess <=> $daily){
            case -1:
                return "wrong up"; break;
            case 0:
                return "correct"; break;
            case 1:
                return "wrong down"; break;
        }
    }

    public function compareGuessJsonValue($guess, $daily){
        $guess_value = is_string($guess) ? json_decode($guess, true) : $guess;
        $daily_value = is_string($daily) ? json_decode($daily, true) : $daily;
        if($guess_value == $daily_value){
            return "correct";
        }
        else if(count(array_intersect($guess_value, $daily_value)) > 0){
                return "partial";
        }  
        else{
            return "wrong";
        }
    }

    // public function responseGenerator(array $fields, object $guess, object $daily)
    // {
    // }
}
