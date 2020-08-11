<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Database\Eloquent\Model;
use App\Major;
use App\Subject;
use Faker\Generator as Faker;
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

$factory->define(Major::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(Subject::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'time_total' => $faker->randomDigit,
        'test_type' => $faker->randomDigit,
        'major_id' => Major::all(['id'])->random(),

    ];
});
