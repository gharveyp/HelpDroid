<?php

$factory->define(App\Broadcast::class, function (Faker\Generator $faker) {
    return [
        "message" => $faker->name,
        "severity" => collect(["LOW","MEDIUM","HIGH",])->random(),
    ];
});
