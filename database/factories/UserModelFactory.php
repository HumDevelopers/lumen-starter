<?php

use Illuminate\Support\Facades\Hash;

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'login' => $faker->firstNameMale,
        'email' => $faker->email,
        'password' => Hash::make('123456')
    ];
});
