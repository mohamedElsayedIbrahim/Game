<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    function players() : object {
        return GameService::return_players();
    }

    function game_turn()
    {
        return GameService::simple_game();
    }

    function mutiple_turn()
    {
        return GameService::more_turn_game();
    }

    function game_with_player(string $player) {
        
    }
}
