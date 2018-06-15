<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->colorName,
        'text'=>$faker->realText(250),
        'img_src'=>$faker->randomElement(["deporte.jpg" , "mexico.jpg","agua.jpg" , "lluvia.jpg"]),
        'fecha'=>$faker->date('Y-m-d'),
        'user_id'=>$faker->numberBetween(1,30),
        'address_id'=>$faker->numberBetween(1,3),
        'category_id'=>$faker->numberBetween(1,8)
    ];
});
