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
        factory(\CornerStudio\Http\Entities\Activity::class, 30)->create();

        $activities    = \CornerStudio\Http\Entities\Activity::all();
        $subscriptions = \CornerStudio\Http\Entities\Subscription::all();

        foreach ( $activities as $activity )
        {
            $activity->subscriptions()->attach($subscriptions->random());
        }
    }
}
