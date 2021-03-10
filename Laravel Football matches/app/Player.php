<?php

namespace App;

use App\Team;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['fullname', 'date'];
    public function teams(){
        return $this->belongsTo(Team::class, 'team_id');
    }
}
