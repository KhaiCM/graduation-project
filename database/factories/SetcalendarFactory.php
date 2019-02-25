<?php

use Faker\Generator as Faker;

$factory->define(App\Models\SetCalendar::class, function (Faker $faker) {
    return [
        'date' => now(),
        'time' => rand(1, 10),
        'phone' => $faker->phoneNumber,
        'email' => str_random(10) . '@gmail.com',
        'note' => str_random(200),
        'property_id' => rand(1, 10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
