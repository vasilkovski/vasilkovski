<?php

namespace App\Http\Controllers;

use App\Game;
use App\Team;
use App\Player;
use App\Game_Teams;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $games = Game::all();
        $teams = Team::all();
       
        return view('home', compact('games', 'teams'));
    }

    
}
