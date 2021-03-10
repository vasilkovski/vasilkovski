<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use App\Model;
use App\Player;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [ 
        'fullname' => $faker->name,
        'date' => $faker->date,
        'team_id' => Team::all()->random()->id
    ];
});
