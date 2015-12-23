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

$factory->define(Soma\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('somasoma'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Soma\Categories::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory('Soma\User')->create()->id,
        'title' => $faker->sentence,
    ];
});

$factory->define(Soma\Videos::class, function (Faker\Generator $faker) {
    return [
        'category_id' => factory('Soma\Categories')->create()->id,
        'user_id' => factory('Soma\User')->create()->id,
        'youtube_link' => $faker->url,
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});
