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
}
