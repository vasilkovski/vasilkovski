<?php

namespace App;

use App\Game;
use App\Player;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'year'];
    public function games(){
        return $this->hasMany(Game::class, 'id');
    }
    public function players(){
        return $this->hasMany(Player::class);
    }
}
