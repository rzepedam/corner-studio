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
$factory->define(CornerStudio\Http\Entities\Client::class, function (Faker\Generator $faker)
{
    $maleSurname   = $faker->lastName;
    $femaleSurname = $faker->lastName;
    $firstName     = $faker->firstName;
    $secondName    = $faker->firstName;

    return [
        'country_id'        => rand(1, 9),
        'marital_status_id' => rand(1, 4),
        'male_surname'      => $maleSurname,
        'female_surname'    => $femaleSurname,
        'first_name'        => $firstName,
        'second_name'       => $secondName,
        'full_name'         => "$firstName $secondName $maleSurname $femaleSurname",
        'rut'               => rand(3, 24) . rand(100, 999) . rand(100, 999) . '-' . rand(1, 9),
        'birthday'          => $faker->date($format = 'd-m-Y', $max = 'now'),
        'is_male'           => $faker->boolean,
        'email'             => $faker->email
    ];
});

$factory->define(CornerStudio\Http\Entities\Plan::class, function (Faker\Generator $faker)
{
    return [
        'name'   => $faker->sentence,
        'amount' => $faker->randomFloat(0, 5490, 49990),
    ];
});

$factory->define(CornerStudio\Http\Entities\Subscription::class, function (Faker\Generator $faker)
{
    $clients  = \CornerStudio\Http\Entities\Client::all();
    $payments = \CornerStudio\Http\Entities\Payment::all();
    $plans    = \CornerStudio\Http\Entities\Plan::all();

    return [
        'client_id'   => $clients->random()->id,
        'payment_id'  => $payments->random()->id,
        'plan_id'     => $plans->random()->id,
        'start_date'  => $faker->date($format = 'd-m-Y', $min = 'now'),
        'end_date'    => $faker->date($format = 'd-m-Y', $max = '+1 month'),
        'num_voucher' => $faker->numberBetween(100000, 999999),
        'payday'      => $faker->date($format = 'd-m-Y', $min = 'now')
    ];
});

$factory->define(CornerStudio\User::class, function (Faker\Generator $faker)
{
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
