<?php

namespace App\Services;

class GameService {

    private static $players;

    public function __construct() {
        self::$players = ['A','B','C'];    
    }

    public static function return_players()
    {
        dd('test');   
        return JsonResponse::sendResponse(self::$players);
    }
}