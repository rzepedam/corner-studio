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
            'name' => 'Roberto Zepeda',
            'email' => 'robertozepeda@controlqtime.cl',
            'password' => bcrypt('grupo@lfr@12')
        ]);

        \CornerStudio\User::create([
            'name' => 'Raúl Meza',
            'email' => 'raulmeza@controlqtime.cl',
            'password' => bcrypt('qwerty')
        ]);

        \CornerStudio\User::create([
            'name' => 'Vivian Briones',
            'email' => 'brionesvalenzuela.vivian@gmail.com',
            'password' => bcrypt('12345')
        ]);

        \CornerStudio\User::create([
            'name' => 'Nicolás Jusakos',
            'email' => 'njusakos@gmail.com',
            'password' => bcrypt('12345')
        ]);

        \CornerStudio\User::create([
            'name' => 'Carolina Vargas',
            'email' => 'kvz@live.cl',
            'password' => bcrypt('12345')
        ]);
    }
}
