<?php

$factory->define(App\Safezone::class, function (Faker\Generator $faker) {
    return [
        "lat" => $faker->name,
        "lng" => $faker->name,
        "address" => $faker->name,
        "place_name" => $faker->name,
    ];
});
