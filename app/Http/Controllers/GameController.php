<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

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

    function start_with_player() {
        $player = request()->get('player');
        return GameService::simple_game_with_player($player);
    }

    function start_with_player_with_turns(){
        $player = request()->get('player');
        $turns = request()->get('turns') ?? 3;
        $players_numbers = request()->get('player_num') ?? 3;

        return GameService::simple_game_with_player_turns($player,(int)$turns,(int)$players_numbers);
    }
}
