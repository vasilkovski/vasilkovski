<?php

namespace App\Http\Controllers;

use App\Game;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Requests\MatchRequest;

class GameController extends Controller
{
    public function index()
    {
       $games =  Game::whereNull('result')->get();
    
        $teams = Team::all();
        return view('match.create', compact('teams'));
    }


    public function storeMatch(MatchRequest $request)
    {
        $homeTeam = $request->input('home_team');
        $awayTeam = $request->input('away_team');
        if ($homeTeam == $awayTeam ) {
            
            return redirect('matches')->with('message', 'Can\'t play same teams');
        } else {

            Game::insert([
                'team1_id' => $homeTeam,
                'team2_id' => $awayTeam,
                'date' => $request->input('date'),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString()

            ]);
            return redirect('/home');
        }
    }

    public function deleteMatch($id){
        $game = Game::find($id);
        $game->delete();
        return redirect('/home');
    }
}
