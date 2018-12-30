<?php

use Faker\Generator as Faker;

$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'games' => $faker->randomNumber(2),
        'minutes_per_game' => $faker->numberBetween(15,60),
        'points_per_game' => $faker->numberBetween(8,35)
    ];
});
