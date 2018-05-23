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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Admin::class, function (Faker\Generator $faker) {

    // We create a User model first before we create an Admin model.
    $user = App\User::create([
        'username' => $faker->unique()->username,
        'password' => bcrypt('password'),
        'type' => 'admin',      // admin or member
        'remember_token' => str_random(10),
    ]);

    return [
        'user_id' => $user->id,
        'email' => $faker->unique()->safeEmail,
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'contact_number' => $faker->numerify('09#########'),
        'address' => $faker->address,
        'position' => $faker->randomElement(['General Manager', 'Credit Committee', 'Chairman of the Baord', 'Programmer'])
    ];
});
