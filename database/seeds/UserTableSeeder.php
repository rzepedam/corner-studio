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

        \CornerStudio\User::create([
            'first_name'   => 'Roberto',
            'male_surname' => 'Zepeda',
            'email'        => 'robertozepeda@controlqtime.cl',
            'password'     => bcrypt('grupo@lfr@12')
        ]);

        \CornerStudio\User::create([
            'first_name'   => 'Raúl',
            'male_surname' => 'Meza',
            'email'        => 'raulmeza@controlqtime.cl',
            'is_admin'     => 1,
            'password'     => bcrypt('qwerty')
        ]);
    }
}
