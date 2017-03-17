<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->truncate();

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 1,
            'name'      => 'Arica',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 1,
            'name'      => 'Parinacota',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 2,
            'name'      => 'Iquique',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 2,
            'name'      => 'El Tamarugal',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 3,
            'name'      => 'Antofagasta',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 3,
            'name'      => 'El Loa',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 3,
            'name'      => 'Tocopilla',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 4,
            'name'      => 'Chañaral',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 4,
            'name'      => 'Copiapó',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 4,
            'name'      => 'Huasco',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 5,
            'name'      => 'Choapa',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 5,
            'name'      => 'Elqui',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 5,
            'name'      => 'Limarí',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 6,
            'name'      => 'Isla de Pascua',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 6,
            'name'      => 'Los Andes',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 6,
            'name'      => 'Petorca',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 6,
            'name'      => 'Quillota',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 6,
            'name'      => 'San Antonio',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 6,
            'name'      => 'San Felipe de Aconcagua',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 6,
            'name'      => 'Valparaiso',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 7,
            'name'      => 'Chacabuco',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 7,
            'name'      => 'Cordillera',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 7,
            'name'      => 'Maipo',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 7,
            'name'      => 'Melipilla',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 7,
            'name'      => 'Santiago',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 7,
            'name'      => 'Talagante',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 8,
            'name'      => 'Cachapoal',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 8,
            'name'      => 'Cardenal Caro',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 8,
            'name'      => 'Colchagua',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 9,
            'name'      => 'Cauquenes',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 9,
            'name'      => 'Curicó',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 9,
            'name'      => 'Linares',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 9,
            'name'      => 'Talca',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 10,
            'name'      => 'Arauco',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 10,
            'name'      => 'Bio Bío',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 10,
            'name'      => 'Concepción',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 10,
            'name'      => 'Ñuble',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 11,
            'name'      => 'Cautín',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 11,
            'name'      => 'Malleco',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 12,
            'name'      => 'Valdivia',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 12,
            'name'      => 'Ranco',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 13,
            'name'      => 'Chiloé',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 13,
            'name'      => 'Llanquihue',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 13,
            'name'      => 'Osorno',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 13,
            'name'      => 'Palena',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 14,
            'name'      => 'Aisén',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 14,
            'name'      => 'Capitán Prat',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 14,
            'name'      => 'Coihaique',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 14,
            'name'      => 'General Carrera',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 15,
            'name'      => 'Antártica Chilena',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 15,
            'name'      => 'Magallanes',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 15,
            'name'      => 'Tierra del Fuego',
        ]);

        \CornerStudio\Http\Entities\Province::create([
            'region_id' => 15,
            'name'      => 'Última Esperanza',
        ]);
    }
}
