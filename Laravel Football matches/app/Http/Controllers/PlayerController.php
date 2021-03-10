<?php

namespace App\Http\Controllers;

use App\Game;
use App\Team;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;

class PlayerController extends Controller
{
    public function players()
    {

        $players = Player::all();

        return view('players.players', compact('players'));
    }

    public function showPlayer($id)
    {

        $players = Player::find($id);
        $team = $players->teams->id;
        $games = Game::where('team1_id', $team)
            ->orWhere('team2_id', $team)
            ->get();
       

        return view('players.player', compact('players', 'games'));
    }

    public function createPlayer()
    {
        $teams = Team::all();
        return view('players.create', compact('teams'));
    }
     
    public function storePlayer(PlayerRequest $request){

        Player::insert([
            'fullname' => $request->input('fullname'),
            'date' => $request->input('date'),
            'team_id' => $request->input('team_id'),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        return redirect('players');
    }


    public function editPlayer($id){
        $player = Player::find($id);
        $teams = Team::all();
    return view('players.edit', compact('teams', 'player'));

    }

    public function updatePlayer(Request $request, Player $id){
        $id->fullname = $request->input('name');
        $id->date = $request->input('date');
        $id->team_id = $request->input('teams');
        $id->save();
        return redirect('/players');
    }
    public function deletePlayer(Player $id)
    {
        $id->delete();
        return redirect('/players');
    }
}
