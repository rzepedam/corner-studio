<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use CornerStudio\Http\Entities\Subscription;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscriptionGetTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    function can_display_end_date_with_l_j_F_Y_format_subscription()
    {
        $subscription = factory(Subscription::class)->create(['end_date' => '18-11-2017']);

        $this->assertEquals('sábado 18 noviembre 2017', $subscription->end_date);
    }
}
