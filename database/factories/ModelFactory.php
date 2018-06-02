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
        'position' => $faker->randomElement(['General Manager', 'Credit Committee', 'Chairman of the Board', 'Programmer']),
        'photo_url' => $faker->imageUrl(100, 100),
    ];
});

$factory->define(App\Member::class, function (Faker\Generator $faker) {

    // We create a User model first before we create an Admin model.
    $user = App\User::create([
        'username' => $faker->unique()->username,
        'password' => bcrypt('password'),
        'type' => 'member',      // admin or member
        'remember_token' => str_random(10),
    ]);

    return [
        'user_id' => $user->id,
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'civil_status' => $faker->randomElement(['single', 'married', 'widow', 'widower ']),
        'birthday' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years', $timezone = null),
        'mobile_number' => $faker->numerify('09#########'),
        'gender' => $faker->randomElement(['male', 'female']),
        'present_address' => $faker->address,
        'permanent_address' => $faker->address,
        'tax_identification_number' => $faker->numerify('#########000'),
        'employer' => $faker->company,
        'employer_address' => $faker->address,
        'position' => $faker->jobTitle,
        'department' => $faker->randomElement(['Indormation Technology', 'Finance', 'Sales', 'Production', 'Quality Assurance']),
        'employment_date' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = '-2 years' ,$timezone =null),
        'salary' => $faker->numerify('##000.00'),
        'other_source_of_income' => 'none',
        'number_of_dependents' => $faker->randomDigit(),
    ];

});
