<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use CornerStudio\Http\Entities\Subscription;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscriptionSetTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    function can_formatted_start_date_subscription()
    {
        factory(Subscription::class)->create(['start_date' => '']);
        $now = Carbon::now()->format('Y-m-d');

        $this->assertDatabaseHas('subscriptions', [
            'start_date' => $now
        ]);
    }

    /** @test */
    function can_formatted_end_date_subscription()
    {
        factory(Subscription::class)->create(['end_date' => '19-08-2017']);

        $this->assertDatabaseHas('subscriptions', [
            'end_date' => '2017-08-19'
        ]);
    }
}
