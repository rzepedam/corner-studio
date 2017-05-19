<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        \CornerStudio\Http\Entities\User::create([
            'name' => 'Roberto Zepeda',
            'email' => 'robertozepeda@controlqtime.cl',
            'password' => bcrypt('grupo@lfr@12')
        ]);

        \CornerStudio\Http\Entities\User::create([
            'name' => 'Raúl Meza',
            'email' => 'raulmeza@controlqtime.cl',
            'password' => bcrypt('qwerty')
        ]);
    }
}
