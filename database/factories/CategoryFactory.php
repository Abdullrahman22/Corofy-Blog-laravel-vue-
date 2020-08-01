<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $string =  $faker -> sentence(2) ; 
    $title  =  str_replace( "." , "" , $string );
    $slug   =  str_replace( " " , "-" , $title );

    return [
        "title" => $title ,   // hrasvel sanalt
        "slug"  => $slug  ,   // hrasvel-sanalt
    ];

});
