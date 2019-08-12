<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quiz;
use App\User;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->lazy(),
        'suggestions' => $faker->paragraph(),
        'is_the_information_right' => $faker->randomElement(['yes', 'no', 'both']),
        'fast_site' => 5
    ];
});
