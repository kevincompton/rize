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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Rize::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->text(20),
        'description' => $faker->text(50),
        'date' => '2017-04-25 23:15:52'
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->text(20),
        'user_id' => 1,
        'city' => 'Los Angeles',
        'description' => $faker->text(60),
        'date' => '2017-04-25 23:15:52'
    ];
});
