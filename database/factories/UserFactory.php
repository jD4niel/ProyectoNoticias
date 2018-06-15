<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'=> $faker->firstName,
        'email'=> $faker->unique()->safeEmail,
        'password'=> $faker->password,
        'last_name'=> $faker->lastName,
        'second_last_name'=> $faker->lastName,
        'phone_number'=> $faker->phoneNumber,
        'role_id'=> 2
    ];
});
