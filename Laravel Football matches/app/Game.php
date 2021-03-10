<?php

namespace App;

use App\Team;
use App\Player;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['team1_id', 'team2_id', 'date ', 'created_at'];

   public function team1(){
       return $this->belongsTo(Team::class, 'team1_id');
   }
   public function team2(){
    return $this->belongsTo(Team::class, 'team2_id');
}

}
