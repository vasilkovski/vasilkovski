<?php

namespace App;

use App\Country;


use Illuminate\Database\Eloquent\Model;

class Coivd extends Model
{
    protected $table = 'cases';
    protected $fillable = ['active', 'deaths', 'recovered', 'date', 'confirmed'];

    public function countries(){
        return $this->belongsTo( \App\Country::class, 'country_id');
    }
}
