<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        "title" => "Lapins gris argenté",
        "category_id" => "1",
        "user_id" => "1",
        "price" => "300000",
        "picture" => "lapin.jpg",
        "description" => $faker->text,
    ];
});
