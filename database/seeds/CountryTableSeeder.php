<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->truncate();

        \CornerStudio\Http\Entities\Country::create([
            'name' => 'Argentina',
        ]);

        \CornerStudio\Http\Entities\Country::create([
            'name' => 'Bolivia',
        ]);

        \CornerStudio\Http\Entities\Country::create([
            'name' => 'Colombia',
        ]);

        \CornerStudio\Http\Entities\Country::create([
            'name' => 'Chile',
        ]);

        \CornerStudio\Http\Entities\Country::create([
            'name' => 'Ecuador',
        ]);

        \CornerStudio\Http\Entities\Country::create([
            'name' => 'Perú',
        ]);

        \CornerStudio\Http\Entities\Country::create([
            'name' => 'Paraguay',
        ]);

        \CornerStudio\Http\Entities\Country::create([
            'name' => 'Uruguay',
        ]);

        \CornerStudio\Http\Entities\Country::create([
            'name' => 'Venezuela',
        ]);
    }
}
