<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'description' => $faker->text(),
        'user_id' => function() {
        	return factory(App\User::class)->create()->id;
        }
    ];
});
