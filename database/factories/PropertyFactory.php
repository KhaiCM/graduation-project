<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Property::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'property_type_id' => rand(1, 10),
        'district_id' => rand(1, 10),
        'unit_id' => rand(1, 9),
        'name' => $faker->name,
        'address' => $faker->address,
        'describe' => str_random(100),
        'acreage' => rand(1, 10),
        'price' => rand(1, 10) * 1000,
        'status' => str_random(100),
        'form' => rand(0, 1),
        'image' => $faker->imageUrl(400, 300),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
