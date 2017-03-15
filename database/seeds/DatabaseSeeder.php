<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountryTableSeeder::class);
        $this->call(MaritalStatusTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(PaymentTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(SubscriptionTableSeeder::class);
    }
}
