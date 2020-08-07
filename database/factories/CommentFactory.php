<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        "body" => $faker -> sentence(50) ,
        'post_id' => rand(1, 100),
        'user_id' => rand(1, 30),
    ];
});
