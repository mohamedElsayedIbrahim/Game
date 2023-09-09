<?php

namespace App\Services;

class GameService {

    private static $players = ['A','B','C'];

    public static function return_players()
    {
        return JsonResponse::sendResponse(self::$players);
    }

    public static function simple_game()
    {
        $response =[];

        for ($i=0; $i < count(Self::$players); $i++) { 
            if ($i == 0) {
                $response[]
            }
        }
        
    }
}