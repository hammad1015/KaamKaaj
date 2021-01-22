<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Channel;
use Faker\Generator as Faker;

$factory->define(Channel::class, function (Faker $faker) {
    return [
        'name'                  => $faker->company,                           // 'Bogan-Treutel'                                   
        'authorization_level'   => $faker->numberBetween($min = 0, $max = 4), // 8567
    ];
});
