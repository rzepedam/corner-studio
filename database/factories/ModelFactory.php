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
$factory->define(CornerStudio\Http\Entities\Address::class, function (Faker\Generator $faker)
{
    $communes = \CornerStudio\Http\Entities\Commune::all();

    return [
        'client_id'  => factory(\CornerStudio\Http\Entities\Client::class)->create()->id,
        'commune_id' => $communes->random()->id,
        'address'    => $faker->address,
        'depto'      => '',
        'block'      => '',
        'phone1'     => $faker->e164PhoneNumber,
        'phone2'     => $faker->e164PhoneNumber
    ];
});

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
        'rut'               => rand(3, 24) . '.' . rand(100, 999) . '.' . rand(100, 999) . '-' . rand(1, 9),
        'birthday'          => $faker->date($format = 'd-m-Y', $max = 'now'),
        'is_male'           => $faker->randomElement(['1', '2']),
        'email'             => $faker->email
    ];
});

$factory->define(CornerStudio\Http\Entities\Commune::class, function (Faker\Generator $faker)
{
    return [
        'name'        => $faker->word,
        'province_id' => factory(\CornerStudio\Http\Entities\Province::class)->create()->id
    ];
});

$factory->define(CornerStudio\Http\Entities\Country::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->word
    ];
});

$factory->define(CornerStudio\Http\Entities\MaritalStatus::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->word
    ];
});

$factory->define(CornerStudio\Http\Entities\Payment::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->word
    ];
});

$factory->define(CornerStudio\Http\Entities\Province::class, function (Faker\Generator $faker)
{
    return [
        'name'      => $faker->word,
        'region_id' => factory(\CornerStudio\Http\Entities\Region::class)->create()->id
    ];
});

$factory->define(CornerStudio\Http\Entities\Region::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->word,
    ];
});

$factory->define(CornerStudio\Http\Entities\Subscription::class, function (Faker\Generator $faker)
{
    $clients  = \CornerStudio\Http\Entities\Client::all();
    $payments = \CornerStudio\Http\Entities\Payment::all();

    return [
        'client_id'   => $clients->random()->id,
        'payment_id'  => $payments->random()->id,
        'start_date'  => $faker->date($format = 'd-m-Y', $min = 'now'),
        'end_date'    => $faker->date($format = 'd-m-Y', $max = '+1 month'),
        'num_voucher' => $faker->numberBetween(100000, 999999),
        'payday'      => $faker->numberBetween(1, 30)
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
