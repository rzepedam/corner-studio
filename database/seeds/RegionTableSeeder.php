<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->truncate();

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Arica y Parinacota',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Tarapacá',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Antofagasta',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Atacama',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Coquimbo',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Valparaiso',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región Metropolitana de Santiago',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Libertador General Bernardo OHiggins',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región del Maule',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región del Biobío',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de La Araucanía',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Los Ríos',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Los Lagos',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Aisén del General Carlos Ibáñez del Campo',
        ]);

        \CornerStudio\Http\Entities\Region::create([
            'name' => 'Región de Magallanes y de la Antártica Chilena',
        ]);
    }
}
