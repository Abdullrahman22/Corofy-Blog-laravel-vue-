<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Messege;
use Faker\Generator as Faker;

$factory->define(Messege::class, function (Faker $faker) {
    return [
        'name'  => $faker -> name,
        'phone' => $faker -> phoneNumber ,
        'email' => $faker -> unique()->safeEmail,
        'body'  => $faker -> sentence(75) ,
    ];
});
