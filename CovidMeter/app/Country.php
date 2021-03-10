<?php

namespace App;

use App\Coivd;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = ['name', 'slug'];
    
    public $timestamps = false;

    public function cases(){
        return $this->hasMany(\App\Coivd::class, 'country_id', 'id');
    }
}
