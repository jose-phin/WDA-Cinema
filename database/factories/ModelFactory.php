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
    $datetime = $faker->dateTimeThisMonth;

    // Ensure that we don't get any "weird" hours, like a session at 4am in the morning
    // If we do encounter one of these times, convert it to PM
    $hour = $datetime->format("H");
    if ($hour < 9) {
        $datetime->add(new DateInterval("PT12H"));
    }

    // Round our time to the nearest half hour
    // Adapted from http://stackoverflow.com/a/19814731/4310053
    $minute = $datetime->format("i");
    $minute = $minute % 30;
    $diff = 30 - $minute;

    $datetime->add(new DateInterval("PT".$diff."M"));

    // Format date in something a bit more readable for a user
    $dateString = $datetime->format('d F Y \a\t g:ia');

    return [
        'time' => $dateString,
        'theater' => $faker->numberBetween(1, 10),
        'movie_id' => $faker->numberBetween(1, 5),
        'location_id' => $faker->numberBetween(1, 9),
    ];
});
