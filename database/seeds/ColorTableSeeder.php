<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->truncate();

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#E57373',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#F06292',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#BA68C8',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#9575CD',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#7986CB',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#64B5F6',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#4FC3F7',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#4DD0E1',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#4DB6AC',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#81C784',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#AED581',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#DCE775',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#FFF176',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#FFB74D',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#FF8A65',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#A1887F',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#E0E0E0',
        ]);

        \CornerStudio\Http\Entities\Color::create([
            'color' => '#90A4AE',
        ]);
    }
}
