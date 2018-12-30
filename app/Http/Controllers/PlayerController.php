<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Player as PlayerResource;
use App\Http\Resources\Players as PlayerCollection;
use App\Player as Player;

class PlayerController extends Controller
{
    public function show($id){
        return new PlayerResource(Player::with('team')->find($id));
    }

    public function show_all(){
        return new PlayerCollection(Player::all());
    }

    public function create(Request $request){
        try{
            $player = new Player;
            $player->first_name = $request->first_name;
            $player->last_name = $request->last_name;
            $player->team_id = $request->team_id;
            $player->games = $request->games;
            $player->minutes_per_game = $request->minutes_per_game;
            $player->points_per_game = $request->points_per_game;
            $player->save();
        }catch(\Exception $e){
            
        }
    }

    public function delete(Request $request){
        try{
            Player::find($request->id)->delete();
        }catch(\Exception $e){
            
        }
    }

    public function update(Request $request){
        $player = Player::find($request->id);
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->games = $request->games;
        $player->minutes_per_game = $request->minutes_per_game;
        $player->points_per_game = $request->points_per_game;
        $player->save();
    }
}
