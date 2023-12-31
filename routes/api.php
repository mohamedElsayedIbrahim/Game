<?php

use App\Http\Controllers\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['cors','json'])->group(function () {
    Route::prefix('game')->group(function(){
        Route::get('players',[GameController::class,'players']);
        Route::get('simple/turn',[GameController::class,'game_turn']);
        Route::get('mutiple/turn',[GameController::class,'mutiple_turn']);
        Route::get('simple/player',[GameController::class,'start_with_player']);
        Route::get('simple/player/turns',[GameController::class,'start_with_player_with_turns']);
    });
});

Route::any('{url}', function(){return response()->json(['type'=>'error','message'=>'This URL is not found'],404);})->where('url', '.*');