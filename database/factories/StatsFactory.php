<?php

use Faker\Generator as Faker;

$factory->define(App\Stats::class, function (Faker $faker) {
    return [
        'games' => $faker->randomNumber(2),
        'minutes_per_game' => $faker->numberBetween(15,60),
        'points_per_game' => $faker->numberBetween(8,35),
        'rebounds_per_game' => $faker->numberBetween(0,49),
        
    ];
});
