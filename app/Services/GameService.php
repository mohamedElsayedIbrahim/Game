<?php

namespace App\Services;

use function Psy\debug;

class GameService {

    private static $players = ['A','B','C'];

    public static function return_players()
    {
        return JsonResponse::sendResponse(self::$players);
    }

    public static function simple_game(string $player = 'A')
    {
        return JsonResponse::sendResponse(self::turn($player));
    }

    public static function more_turn_game(string $player = 'A')
    {
        return JsonResponse::sendResponse(array_merge(self::turn($player),array_reverse(self::turn($player))));
    }

    private static function get_element_index(string $element)
    {
        return  array_search($element,Self::$players);
    }

    public static function simple_game_with_player(string $player)
    {
        return JsonResponse::sendResponse(self::turn($player));
    }

    private static function turn(string $player)
    {
        $index = self::get_element_index($player);
        $response =[];

        for ($i=$index; $i < count(Self::$players); $i++) {
            
            if ( $i == 0 ) {
                array_push($response,self::$players);
            } else {
                $index = self::get_element_index(self::$players[$i]);
                $temp = [];
                $target = [];
                for ($j=0; $j < count(Self::$players); $j++) { 
                    if ($j < $index) {
                        array_push($temp,Self::$players[$j]);
                    } else{
                        array_push($target,Self::$players[$j]);
                    }
                }
                array_push($response,array_merge($target,$temp));
            }
        }
        
        return $response;
    }
}