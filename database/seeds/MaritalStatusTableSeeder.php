<?php

use Illuminate\Database\Seeder;

class MaritalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marital_statuses')->truncate();

        \CornerStudio\Http\Entities\MaritalStatus::create([
            'name' => 'Soltero',
        ]);

        \CornerStudio\Http\Entities\MaritalStatus::create([
            'name' => 'Casado',
        ]);

        \CornerStudio\Http\Entities\MaritalStatus::create([
            'name' => 'Viudo',
        ]);

        \CornerStudio\Http\Entities\MaritalStatus::create([
            'name' => 'Separado',
        ]);
    }
}
