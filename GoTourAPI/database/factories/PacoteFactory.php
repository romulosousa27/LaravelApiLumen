<?php

use App\Models\Pacote;
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

$factory->define(Pacote::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(100),
        'price' => $faker->randomFloat(2,2,2),
        'image' => $faker->imageUrl(),
        'site' => $faker->url,
        'phone' => $faker->phoneNumber,
        'date_start' => $faker->date(),
        'date_end' => $faker->date(),
    ];
});
