<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $title = $faker->name;

    return [
        'title' => $title,
        'describe' => $faker->text(200),
        'content' => $faker->text(200),
        'slug'=> str_slug($title),
        'image' => str_random(50),
        'status' => $faker->text(200),
        'category_post_id' => rand(1, 10),
        'user_id' => rand(1, 10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
