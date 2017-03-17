<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommuneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communes')->truncate();

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 1,
            'name'        => 'Arica',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 1,
            'name'        => 'Camarones',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 2,
            'name'        => 'General Lagos',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 2,
            'name'        => 'Putre',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 3,
            'name'        => 'Alto Hospicio',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 3,
            'name'        => 'Iquique',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 4,
            'name'        => 'Camiña',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 4,
            'name'        => 'Colchane',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 4,
            'name'        => 'Huara',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 4,
            'name'        => 'Pica',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 4,
            'name'        => 'Pozo Almonte',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 5,
            'name'        => 'Antofagasta',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 5,
            'name'        => 'Mejillones',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 5,
            'name'        => 'Sierra Gorda',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 5,
            'name'        => 'Taltal',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 6,
            'name'        => 'Calama',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 6,
            'name'        => 'Ollague',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 6,
            'name'        => 'San Pedro de Atacama',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 7,
            'name'        => 'María Elena',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 7,
            'name'        => 'Tocopilla',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 8,
            'name'        => 'Chañaral',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 8,
            'name'        => 'Diego de Almagro',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 9,
            'name'        => 'Caldera',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 9,
            'name'        => 'Copiapó',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 9,
            'name'        => 'Tierra Amarilla',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 10,
            'name'        => 'Alto del Carmen',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 10,
            'name'        => 'Freirina',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 10,
            'name'        => 'Huasco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 10,
            'name'        => 'Vallenar',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 11,
            'name'        => 'Canela',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 11,
            'name'        => 'Illapel',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 11,
            'name'        => 'Los Vilos',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 11,
            'name'        => 'Salamanca',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 12,
            'name'        => 'Andacollo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 12,
            'name'        => 'Coquimbo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 12,
            'name'        => 'La Higuera',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 12,
            'name'        => 'La Serena',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 12,
            'name'        => 'Paihuaco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 12,
            'name'        => 'Vicuña',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 13,
            'name'        => 'Combarbalá',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 13,
            'name'        => 'Monte Patria',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 13,
            'name'        => 'Ovalle',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 13,
            'name'        => 'Punitaqui',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 13,
            'name'        => 'Río Hurtado',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 14,
            'name'        => 'Isla de Pascua',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 15,
            'name'        => 'Calle Larga',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 15,
            'name'        => 'Los Andes',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 15,
            'name'        => 'Rinconada',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 15,
            'name'        => 'San Esteban',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 16,
            'name'        => 'La Ligua',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 16,
            'name'        => 'Papudo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 16,
            'name'        => 'Petorca',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 16,
            'name'        => 'Zapallar',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 17,
            'name'        => 'Hijuelas',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 17,
            'name'        => 'La Calera',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 17,
            'name'        => 'La Cruz',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 17,
            'name'        => 'Limache',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 17,
            'name'        => 'Nogales',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 17,
            'name'        => 'Olmué',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 17,
            'name'        => 'Quillota',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 18,
            'name'        => 'Algarrobo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 18,
            'name'        => 'Cartagena',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 18,
            'name'        => 'El Quisco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 18,
            'name'        => 'El Tabo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 18,
            'name'        => 'San Antonio',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 18,
            'name'        => 'Santo Domingo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 19,
            'name'        => 'Catemu',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 19,
            'name'        => 'Llaillay',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 19,
            'name'        => 'Panquehue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 19,
            'name'        => 'Putaendo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 19,
            'name'        => 'San Felipe',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 19,
            'name'        => 'Santa María',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 20,
            'name'        => 'Casablanca',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 20,
            'name'        => 'Concón',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 20,
            'name'        => 'Juan Fernández',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 20,
            'name'        => 'Puchuncaví',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 20,
            'name'        => 'Quilpué',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 20,
            'name'        => 'Quintero',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 20,
            'name'        => 'Valparaíso',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 20,
            'name'        => 'Villa Alemana',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 20,
            'name'        => 'Viña del Mar',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 21,
            'name'        => 'Colina',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 21,
            'name'        => 'Lampa',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 21,
            'name'        => 'Tiltil',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 22,
            'name'        => 'Pirque',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 22,
            'name'        => 'Puente Alto',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 22,
            'name'        => 'San José de Maipo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 23,
            'name'        => 'Buin',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 23,
            'name'        => 'Calera de Tango',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 23,
            'name'        => 'Paine',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 23,
            'name'        => 'San Bernardo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 24,
            'name'        => 'Alhué',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 24,
            'name'        => 'Curacaví',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 24,
            'name'        => 'María Pinto',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 24,
            'name'        => 'Melipilla',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 24,
            'name'        => 'San Pedro',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Cerrillos',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Cerro Navia',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Conchalí',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'El Bosque',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Estación Central',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Huechuraba',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Independencia',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'La Cisterna',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'La Granja',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'La Florida',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'La Pintana',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'La Reina',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Las Condes',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Lo Barnechea',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Lo Espejo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Lo Prado',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Macul',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Maipú',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Ñuñoa',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Pedro Aguirre Cerda',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Peñalolén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Providencia',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Pudahuel',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Quilicura',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Quinta Normal',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Recoleta',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Renca',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'San Miguel',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'San Joaquín',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'San Ramón',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Santiago',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 25,
            'name'        => 'Vitacura',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 26,
            'name'        => 'El Monte',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 26,
            'name'        => 'Isla de Maipo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 26,
            'name'        => 'Padre Hurtado',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 26,
            'name'        => 'Peñaflor',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 26,
            'name'        => 'Talagante',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Codegua',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Coínco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Coltauco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Doñihue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Graneros',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Las Cabras',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Machalí',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Malloa',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Mostazal',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Olivar',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Peumo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Pichidegua',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Quinta de Tilcoco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Rancagua',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Rengo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'Requínoa',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 27,
            'name'        => 'San Vicente de Tagua Tagua',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 28,
            'name'        => 'La Estrella',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 28,
            'name'        => 'Litueche',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 28,
            'name'        => 'Marchihue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 28,
            'name'        => 'Navidad',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 28,
            'name'        => 'Peredones',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 28,
            'name'        => 'Pichilemu',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 29,
            'name'        => 'Chépica',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 29,
            'name'        => 'Chimbarongo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 29,
            'name'        => 'Lolol',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 29,
            'name'        => 'Nancagua',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 29,
            'name'        => 'Palmilla',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 29,
            'name'        => 'Peralillo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 29,
            'name'        => 'Placilla',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 29,
            'name'        => 'Pumanque',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 29,
            'name'        => 'San Fernando',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 29,
            'name'        => 'Santa Cruz',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 30,
            'name'        => 'Cauquenes',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 30,
            'name'        => 'Chanco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 30,
            'name'        => 'Pelluhue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 31,
            'name'        => 'Curicó',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 31,
            'name'        => 'Hualañé',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 31,
            'name'        => 'Licantén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 31,
            'name'        => 'Molina',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 31,
            'name'        => 'Rauco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 31,
            'name'        => 'Romeral',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 31,
            'name'        => 'Sagrada Familia',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 31,
            'name'        => 'Teno',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 31,
            'name'        => 'Vichuquén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 32,
            'name'        => 'Colbún',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 32,
            'name'        => 'Linares',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 32,
            'name'        => 'Longaví',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 32,
            'name'        => 'Parral',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 32,
            'name'        => 'Retiro',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 32,
            'name'        => 'San Javier',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 32,
            'name'        => 'Villa Alegre',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 32,
            'name'        => 'Yerbas Buenas',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 33,
            'name'        => 'Constitución',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 33,
            'name'        => 'Curepto',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 33,
            'name'        => 'Empedrado',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 33,
            'name'        => 'Maule',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 33,
            'name'        => 'Pelarco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 33,
            'name'        => 'Pencahue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 33,
            'name'        => 'Río Claro',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 33,
            'name'        => 'San Clemente',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 33,
            'name'        => 'San Rafael',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 33,
            'name'        => 'Talca',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 34,
            'name'        => 'Arauco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 34,
            'name'        => 'Cañete',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 34,
            'name'        => 'Contulmo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 34,
            'name'        => 'Curanilahue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 34,
            'name'        => 'Lebu',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 34,
            'name'        => 'Los Álamos',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 34,
            'name'        => 'Tirúa',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Alto Biobío',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Antuco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Cabrero',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Laja',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Los Ángeles',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Mulchén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Nacimiento',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Negrete',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Quilaco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Quilleco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'San Rosendo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Santa Bárbara',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Tucapel',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 35,
            'name'        => 'Yumbel',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Chiguayante',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Concepción',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Coronel',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Florida',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Hualpén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Hualqui',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Lota',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Penco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'San Pedro de La Paz',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Santa Juana',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Talcahuano',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 36,
            'name'        => 'Tomé',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Bulnes',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Chillán',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Chillán Viejo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Cobquecura',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Coelemu',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Coihueco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'El Carmen',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Ninhue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Ñiquen',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Pemuco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Pinto',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Portezuelo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Quillón',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Quirihue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Ránquil',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'San Carlos',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'San Fabián',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'San Ignacio',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'San Nicolás',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Treguaco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 37,
            'name'        => 'Yungay',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Carahue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Cholchol',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Cunco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Curarrehue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Freire',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Galvarino',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Gorbea',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Lautaro',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Loncoche',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Melipeuco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Nueva Imperial',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Padre Las Casas',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Perquenco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Pitrufquén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Pucón',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Puerto Saavedra',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Temuco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Teodoro Schmidt',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Toltén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Vilcún',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 38,
            'name'        => 'Villarrica',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Angol',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Collipulli',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Curacautín',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Ercilla',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Lonquimay',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Los Sauces',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Lumaco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Purén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Renaico',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Traiguén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 39,
            'name'        => 'Victoria',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 40,
            'name'        => 'Corral',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 40,
            'name'        => 'Lanco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 40,
            'name'        => 'Los Lagos',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 40,
            'name'        => 'Máfil',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 40,
            'name'        => 'Mariquina',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 40,
            'name'        => 'Paillaco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 40,
            'name'        => 'Panguipulli',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 40,
            'name'        => 'Valdivia',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 41,
            'name'        => 'Futrono',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 41,
            'name'        => 'La Unión',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 41,
            'name'        => 'Lago Ranco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 41,
            'name'        => 'Río Bueno',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 42,
            'name'        => 'Ancud',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 42,
            'name'        => 'Castro',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 42,
            'name'        => 'Chonchi',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 42,
            'name'        => 'Curaco de Vélez',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 42,
            'name'        => 'Dalcahue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 42,
            'name'        => 'Puqueldón',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 42,
            'name'        => 'Queilén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 42,
            'name'        => 'Quemchi',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 42,
            'name'        => 'Quellón',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 42,
            'name'        => 'Quinchao',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 43,
            'name'        => 'Calbuco',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 43,
            'name'        => 'Cochamó',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 43,
            'name'        => 'Fresia',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 43,
            'name'        => 'Frutillar',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 43,
            'name'        => 'Llanquihue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 43,
            'name'        => 'Los Muermos',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 43,
            'name'        => 'Maullín',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 43,
            'name'        => 'Puerto Montt',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 43,
            'name'        => 'Puerto Varas',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 44,
            'name'        => 'Osorno',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 44,
            'name'        => 'Puerto Octay',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 44,
            'name'        => 'Purranque',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 44,
            'name'        => 'Puyehue',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 44,
            'name'        => 'Río Negro',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 44,
            'name'        => 'San Juan de la Costa',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 44,
            'name'        => 'San Pablo',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 45,
            'name'        => 'Chaitén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 45,
            'name'        => 'Futaleufú',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 45,
            'name'        => 'Hualaihué',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 45,
            'name'        => 'Palena',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 46,
            'name'        => 'Aisén',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 46,
            'name'        => 'Cisnes',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 46,
            'name'        => 'Guaitecas',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 47,
            'name'        => 'Cochrane',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 47,
            'name'        => 'Ohiggins',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 47,
            'name'        => 'Tortel',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 48,
            'name'        => 'Coyhaique',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 48,
            'name'        => 'Lago Verde',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 49,
            'name'        => 'Chile Chico',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 49,
            'name'        => 'Río Ibáñez',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 50,
            'name'        => 'Antártica',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 50,
            'name'        => 'Cabo de Hornos',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 51,
            'name'        => 'Laguna Blanca',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 51,
            'name'        => 'Punta Arenas',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 51,
            'name'        => 'Río Verde',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 51,
            'name'        => 'San Gregorio',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 52,
            'name'        => 'Porvenir',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 52,
            'name'        => 'Primavera',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 52,
            'name'        => 'Timaukel',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 53,
            'name'        => 'Puerto Natales',
        ]);

        \CornerStudio\Http\Entities\Commune::create([
            'province_id' => 53,
            'name'        => 'Torres del Paine',
        ]);
    }
}
