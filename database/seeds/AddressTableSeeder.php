<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->truncate();

        factory(\CornerStudio\Http\Entities\Address::class, 25)->create();

        factory(\CornerStudio\Http\Entities\Address::class, 25)->create([
            'addressable_id' => function () {
                return factory(\CornerStudio\Http\Entities\Professional::class)->create()->id;
            },
            'addressable_type' => 'CornerStudio\Http\Entities\Professional'
        ]);
    }
}
