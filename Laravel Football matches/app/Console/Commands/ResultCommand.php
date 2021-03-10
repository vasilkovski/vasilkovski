<?php

namespace App\Console\Commands;

use App\Game;
use Illuminate\Console\Command;

class ResultCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'result';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command put result on games';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $games = Game::whereNull('result')->get();
        foreach($games as $game){
            $game->result = rand(0,5) . ' : ' . rand(0,5) ;
            $game->save();
        }
        
       
    }
}
