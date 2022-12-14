<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;

use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function () {
    return [
        'name' => 'huy',
        'email' => 'admin@admin.com',
        'email_verified_at' => now(),
        'password' => 'password', // password
        'remember_token' => Str::random(10),
        'image'=>'default.jpg',
        'phone'=>'03371112000',
        'gender'=>1,
        'address'=>'hn',
    ];
});
