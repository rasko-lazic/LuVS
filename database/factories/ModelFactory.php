<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => $faker->name,
    ];
});

$factory->define(App\Spending::class, function($faker) {
    return [
        'user_id' => 1,
        'amount' => $faker->numberBetween($min = 1000, $max = 9000),
        'description' => $faker->sentence(5, true),
        'balance' => $faker->numberBetween($min = 5000, $max = 50000),
    ];
});