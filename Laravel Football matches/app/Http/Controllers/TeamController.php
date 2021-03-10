<?php

namespace App\Http\Controllers;

use App\Game;
use App\Team;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    public function teams(){

        $teams = Team::all();
       
         return view('teams.teams', compact('teams'));
     }
 
     
     public function createTeam(){
      return view('teams.create');

     }
     public function storeTeam(TeamRequest $request){
      Team::insert([
        'name' => $request->input('name'),
        'year' => $request->input('year'),
      ]);


      return redirect('/teams');

     }


      public function showTeam($id){
 
         $team = Team::find($id);
         $games = Game::where('team1_id', $id)
                        ->orWhere('team2_id', $id)
                        ->get();

                       
          return view('teams.team', compact('team', 'games'));
      }


      public function editTeam($id){
        $team = Team::find($id);
         return view('teams.editTeam', compact('team'));
     }

     public function updateTeam(TeamRequest $request, Team $id){
   
            $id->name = $request->input('name');
            $id->year = $request->input('year');
            $id->save();
         return redirect ('teams');
     }

      public function deleteTeam($id){
        $team = Team::find($id);
        $team->delete();
        return redirect('/teams');
      }
}
