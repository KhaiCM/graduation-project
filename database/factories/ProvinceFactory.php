<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Province::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
