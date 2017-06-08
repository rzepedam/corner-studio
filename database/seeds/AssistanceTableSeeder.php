<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssistanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assistances')->truncate();

        factory(\CornerStudio\Http\Entities\Assistance::class, 250)->create();
    }
}
