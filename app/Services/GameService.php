<?php

namespace App\Services;

use function Psy\debug;

class GameService {

    private static $players = ['A','B','C','D','E','F','G','H','I','j','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

    public static function return_players()
    {
        return JsonResponse::sendResponse(self::$players);
    }

    public static function simple_game(string $player = 'A', int $player_number = 3)
    {
        return JsonResponse::sendResponse(self::turns($player, $player_number));
    }

    public static function more_turn_game(string $player = 'A', int $player_number = 3, int $turn = 3)
    {
        return JsonResponse::sendResponse(array_merge(self::turns($player, $player_number),array_reverse(self::turns($player, $player_number))));
    }

    public static function simple_game_with_player(string $player , int $player_number = 3)
    {
        return JsonResponse::sendResponse(self::turns($player,$player_number));
    }

    public static function simple_game_with_player_turns(string $player , int $turns ,int $player_number = 3)
    {
        return self::turns($player,$player_number,$turns);
    }

    private static function get_element_index(string $element)
    {
        return  array_search($element,Self::$players);
    }
    private static function init_players(string $player, int $player_number)
    {
        $index = self::get_element_index($player);
        $players = [];
        if ($index == 0) {
            $players= array_slice(Self::$players,0,$player_number);
        } else
        {
            $players = array_slice(self::$players,$index,($player_number-1));
            for ($i=0; $i < $index; $i++) { 
                array_push($players,self::$players[$i]);
            }
        }

        return $players;
    }

    private static function turns(string $player, int $player_number, int $turn = 3)
    {
        $response = [];
        
        $players = self::init_players($player,$player_number);

        $customize = -1; //this variable for adjusment

        for ($i=0; $i < $turn; $i++) {       
            
            $temp = [];
            $target = [];

            $customize++;

            if ($i%$player_number == 0) {
                $customize = 0;
            }

            for ($j=0; $j < count($players); $j++) { 
                if ($j < $customize) {
                    array_push($temp,$players[$j]);
                } else{
                    array_push($target,$players[$j]);
                }
            }
            array_push($response,array_merge($target,$temp)); 
        }
        
        return $response;
    }
}