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
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Cheque::class, function ($faker) {
    return [
        'name' => $faker->name,
        'amount' => 500,
    ];
});

$factory->define(App\Envelope::class, function ($faker) {
    return [
        'name' => $faker->name,
        'amount' => 0,
    ];
});

$factory->define(App\Transaction::class, function ($faker) {
    return [
        'description' => $faker->sentence,
        'amount' => $faker->randomNumber(5),
    ];
});

$factory->define(App\Transfer::class, function ($faker) {
    return [
        'description' => $faker->sentence,
        'amount' => $faker->randomNumber(5),
    ];
});