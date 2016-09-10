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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\MovieSession::class, function (Faker\Generator $faker) {
    return [
        'time' => $faker->dateTimeThisMonth,
        'theater' => $faker->randomDigit,
        'movie_id' => $faker->numberBetween(1, 5),
        'location_id' => $faker->numberBetween(1, 9),
    ];
});
