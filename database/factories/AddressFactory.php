<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'country'=>$faker->country,
        'state'=>$faker->streetName,
        'city'=>$faker->city,
        'colony'=>$faker->streetName,
        'postal_code'=>$faker->postcode
    ];
});
