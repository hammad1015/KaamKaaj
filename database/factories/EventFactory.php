<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name'      => $faker->company,                                 // 'Bogan-Treutel'                                   
        'budget'    => $faker->numberBetween($min = 1000, $max = 9000), // 8567
        'email'     => $faker->unique()->safeEmail,                     // 'king.alford@example.org'
        'location'  => $faker->address,                                 // '8888 Cummings Vista Apt. 101, Susanbury, NY 95473'
        'details'   => $faker->paragraph,
    ];
});
