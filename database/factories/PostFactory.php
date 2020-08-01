<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    
    $string =  $faker -> sentence(2) ; 
    $title  =  str_replace( "." , "" , $string );
    $slug   =  str_replace( " " , "-" , $title );

    return [
        "title"       => $title ,
        "slug"        => $slug  ,
        "body"        => $faker -> sentence(50) ,
        'img' => "img_" . rand(1,10) . ".jpg",   // img_10.jpg   
        "category_id" => rand(1,10),  // num of categories
    ];

});
