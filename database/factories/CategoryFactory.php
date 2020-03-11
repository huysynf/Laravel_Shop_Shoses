<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
       'name'=>'hdasdsa'.$faker->name,
        'slug'=>'hnfghh',
        'parent_id'=>null
    ];
});
