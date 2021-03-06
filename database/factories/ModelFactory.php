<?php

use Carbon\Carbon;

$factory->define(CornerStudio\Http\Entities\Activity::class, function (Faker\Generator $faker)
{
    $randomStart = mt_rand(Carbon::now()->timestamp, Carbon::parse('+3 month')->timestamp);
    $randomEnd   = mt_rand(Carbon::parse('+4 months')->timestamp, Carbon::parse('+12 months')->timestamp);

    return [
        'professional_id' => rand(1, 25),
        'name'            => $faker->sentence($nbWords = 2),
        'amount'          => $faker->numberBetween(9990, 29990),
        'start_date'      => Carbon::createFromFormat('U', $randomStart)->format('Y-m-d'),
        'end_date'        => Carbon::createFromFormat('U', $randomEnd)->format('Y-m-d'),
        'color'           => '#ffff00'
    ];
});

$factory->define(CornerStudio\Http\Entities\Address::class, function (Faker\Generator $faker)
{
    return [
        'addressable_id'   => function ()
        {
            return factory(\CornerStudio\Http\Entities\Client::class)->create()->id;
        },
        'addressable_type' => 'CornerStudio\Http\Entities\Client',
        'commune_id'       => rand(1, 395),
        'address'          => $faker->address,
        'depto'            => '',
        'block'            => '',
        'phone1'           => $faker->e164PhoneNumber,
        'phone2'           => $faker->e164PhoneNumber
    ];
});

$factory->define(CornerStudio\Http\Entities\Assistance::class, function (Faker\Generator $faker)
{
    $clients    = \CornerStudio\Http\Entities\Client::all();
    $activities = \CornerStudio\Http\Entities\Activity::all();
    $client     = $clients->random();
    $mark       = mt_rand(Carbon::parse('-1 month')->timestamp, Carbon::now()->timestamp);

    return [
        'client_id'   => $client->id,
        'activity_id' => $activities->random()->id,
        'rut'         => $client->getOriginal('rut'),
        'created_at'  => Carbon::createFromFormat('U', $mark)->setTimezone('America/Santiago')
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

$factory->define(CornerStudio\Http\Entities\Position::class, function (Faker\Generator $faker)
{
    return [
        'name' => $faker->word
    ];
});

$factory->define(CornerStudio\Http\Entities\Professional::class, function (Faker\Generator $faker)
{
    $maleSurname   = $faker->lastName;
    $femaleSurname = $faker->lastName;
    $firstName     = $faker->firstName;
    $secondName    = $faker->firstName;

    return [
        'position_id'       => factory(\CornerStudio\Http\Entities\Position::class)->create()->id,
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
    $randomStart = mt_rand(Carbon::parse('-12 months')->timestamp, Carbon::now()->timestamp);
    $randomEnd   = mt_rand(Carbon::parse('+10 days')->timestamp, Carbon::parse('+12 months')->timestamp);
    $payments    = \CornerStudio\Http\Entities\Payment::all();

    return [
        'client_id'   => rand(1, 25),
        'payment_id'  => $payments->random()->id,
        'end_date'    => Carbon::createFromFormat('U', $randomEnd)->format('d-m-Y'),
        'num_voucher' => $faker->numberBetween(100000, 999999),
        'payday'      => $faker->numberBetween(1, 30),
        'created_at'  => Carbon::createFromFormat('U', $randomStart)
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
