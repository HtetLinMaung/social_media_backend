<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\InnerComment::class, function (Faker $faker) {
    return [
        "description" => $faker->text(),
        "comment_id" => function() {
        	return factory(App\Comment::class)->create()->id;
        },
        "user_id" => function () {
        	return factory(App\User::class)->create()->id;
        }
    ];
}); 
