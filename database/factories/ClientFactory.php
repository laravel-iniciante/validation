<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'name'                  => $faker->name,
        // 'document_number'       => $faker->name,
        'email'                 => $faker->email,
        'phone'                 => $faker->phoneNumber,
        'defaulter'             => rand(0,1),
        'date_birth'            => $faker->date(),
        'sex'                   => rand(1,10) % 2 == 0 ? 'm': 'f',
        'marital_status'        => rand(1,3),
        'phisical_disability'   => rand(1,10) % 2 == 0 ? $faker->word: null,
    ];
});