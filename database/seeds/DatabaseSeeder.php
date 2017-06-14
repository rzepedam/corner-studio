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
        $this->call(RegionTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(CommuneTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(MaritalStatusTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(PaymentTableSeeder::class);
        $this->call(UserTableSeeder::class);

        if ( getenv('APP_ENV') != 'production' )
        {
            $this->call(AddressTableSeeder::class);
            $this->call(SubscriptionTableSeeder::class);
            $this->call(ActivityTableSeeder::class);
            $this->call(AssistanceTableSeeder::class);
        }
    }
}
