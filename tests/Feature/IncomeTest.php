<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use CornerStudio\Http\Entities\Activity;
use CornerStudio\Http\Entities\Subscription;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IncomeTest extends TestCase
{
    use DatabaseTransactions;

    protected $date = [];

    protected $activities;

    function setUp()
    {
        parent::setUp();

        // Activities
        $this->activities = factory(Activity::class, 100)->create(['amount' => '5500']);

        // Subscriptions
        factory(Subscription::class)->create(['created_at' => Carbon::parse('-25 days')]);
        factory(Subscription::class)->create(['created_at' => Carbon::parse('-1 day')]);
        factory(Subscription::class)->create(['created_at' => Carbon::parse('-6 days')]);
        factory(Subscription::class)->create(['created_at' => Carbon::parse('-3 months')]);
        factory(Subscription::class)->create(['created_at' => Carbon::parse('-2 months')]);
        factory(Subscription::class)->create(['created_at' => Carbon::parse('-3 days')]);
        factory(Subscription::class)->create(['created_at' => Carbon::parse('-8 months')]);
        factory(Subscription::class)->create(['created_at' => Carbon::parse('-6 months')]);
        factory(Subscription::class)->create(['created_at' => Carbon::parse('-1 month')]);
        factory(Subscription::class)->create(['created_at' => Carbon::parse('-30 days')]);

        // Subscriptions -> Activities
        $i = 0;
        foreach ( Subscription::all() as $subscription )
        {
            for ( $j = 0; $j < 10; $j++ )
            {
                $subscription->activities()->attach($this->activities[ $i ]);
                $i ++;
            }
        }
    }

    /** @test */
    function index_income()
    {
        $now    = Carbon::now();
        $months = Carbon::parse('-3 months');

        $subscriptions = Subscription::with(['activities'])->whereDate('created_at', '>', $months)
            ->whereDate('created_at', '<=', $now)
            ->get();

        $incomes = 0;
        foreach ( $subscriptions as $subscription )
        {
            $incomes += $subscription->activities->sum('amount');
        }

        $this->assertEquals($subscriptions->count(), 7);
        $this->assertEquals($incomes, 385000);
    }
}
