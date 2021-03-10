<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Vehicle;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {
      $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $random_insurance_date = Carbon::today()->addDays(rand(0, 365))->format('Y-m-d');
        
    return [
      
       'brand' => $faker->vehicleBrand,
       'model' => $faker->vehicleModel,
       'plate_number' =>  $faker->vehicleRegistration('[A-Z]{2}-[0-9]{5}'),
       'insurance_date' =>   $random_insurance_date
        
        
    ];
});
