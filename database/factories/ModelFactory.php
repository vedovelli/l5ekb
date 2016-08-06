<?php

$factory->define(Louis\Models\Sale::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 101),
        'item' => $faker->word,
    ];
});

$factory->define(Louis\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween(18, 65),
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
