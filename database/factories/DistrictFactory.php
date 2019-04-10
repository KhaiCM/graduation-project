<?php

use Faker\Generator as Faker;

$factory->define(App\Models\District::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'provinces_id' => rand(1, 64),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
