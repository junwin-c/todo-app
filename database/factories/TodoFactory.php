<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    // $faker = Faker\Factory::create('id_ID');
    $list = ['makan', 'mandi', 'tidur', 'coding', 'olahraga', 'chill'];
    return [
        'task' => $faker->randomElement($list),
    ];
});
