<?php

use Faker\Generator as Faker;

$factory->define(App\Models\PropertyType::class, function (Faker $faker) {
    return [
        'property_category_id' => rand(1, 10),
        'name' => $faker->name,
        'status' => str_random(100),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
