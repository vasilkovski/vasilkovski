<?php

use App\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        Team::create([
            'name' => 'Team1',
            'year' => 1990
        ]);
        Team::create([
            'name' => 'Team2',
            'year' => 2000
        ]);
        Team::create([
            'name' => 'Team3',
            'year' => 1960
        ]);
        Team::create([
            'name' => 'Team4',
            'year' => 1859
        ]);
    }
}
