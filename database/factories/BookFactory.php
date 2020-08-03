<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'book_title' => $faker->catchPhrase(),
        'stock_quantity' => $faker->randomNumber(2),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 30),
        'author' => $faker->name(),
        'publication_year' => $faker->year(2020),
        //'book_cover_url' => $faker->imageUrl($width = 265, $height = 400) 
    ];
});
