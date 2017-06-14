<?php

use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->truncate();
        $activities = [
            'Powerpump', 'Entrenamiento Personal', 'Pilates', 'Método Hipopresivo', 'Step', 'Tonificación',
            'TRX', 'Armony', 'Ciclo Indoor', 'Salsa', 'Spinning', 'Yoga',
            'Aeróbica', 'Baile Deportivo', 'Tai Chi Básico', 'Tai Chi Avanzado', 'Running', 'Kunxg Fú'
        ];
        $colors     = [
            '#E57373', '#F06292', '#BA68C8', '#9575CD', '#7986CB', '#64B5F6',
            '#4FC3F7', '#4DD0E1', '#4DB6AC', '#81C784', '#AED581', '#DCE775',
            '#FFF176', '#FFB74D', '#FF8A65', '#A1887F', '#E0E0E0', '#90A4AE'
        ];
        for ( $i = 0; $i < count($activities); $i++ )
        {
            factory(\CornerStudio\Http\Entities\Activity::class)->create([
                'name'  => $activities[ $i ],
                'color' => $colors[ $i ]
            ]);
        }

        $activities    = \CornerStudio\Http\Entities\Activity::all();
        $subscriptions = \CornerStudio\Http\Entities\Subscription::all();

        foreach ( $activities as $activity )
        {
            $activity->subscriptions()->attach($subscriptions->random());
        }
    }
}
