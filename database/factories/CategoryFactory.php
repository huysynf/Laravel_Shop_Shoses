<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;


$factory->define(Category::class, function () {
    return [
       'name'=>'hdasdsa',
        'slug'=>'hnfghh',
        'parent_id'=>null
    ];
});
