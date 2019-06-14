<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\Team as TeamResource;
use App\Http\Resources\Teams as TeamCollection;
use App\Http\Resources\TeamPlayers as Players;
use App\Team as Team;

class TeamController extends Controller
{
    public function show($id){
        return new TeamResource(Team::find($id));
    }

    public function show_players($id){
        
        return new Players(Team::find($id)->players);
    }

    public function show_all(){
        return new TeamCollection(Team::with('players')->get());
    }

    public function delete(Request $request){
        try{
            Team::find($request->id)->delete();
        }catch(\Exception $e){
            
        }
    }

    public function create(Request $request){
        try{
            $team = new Team;
            $team->name = $request->name;
            $team->save();
        }catch(\Exception $e){
            
        }

    }

    public function update(Request $request){
        $team = Team::find($request->id);
        $team->name = $request->name;
        $team->save();
    }
}
