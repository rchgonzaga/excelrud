<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Import::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'filename' => $faker->name,
        'extension' => $faker->fileExtension,
        'size' => $faker->numberBetween(1000, 10000),
        'status' => $faker->numberBetween(App\Import::STATUS_QUEUED, App\Import::STATUS_DONE),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    $userId = factory(App\User::class)->create()->id;

    return [
        'user_id' => $userId,
        'lm' => $faker->numberBetween(),
        'name' => $faker->name,
        'category' => $faker->domainName,
        'free_shipping' => $faker->boolean,
        'description' => $faker->text,
        'price' => $faker->randomFloat()
    ];
});