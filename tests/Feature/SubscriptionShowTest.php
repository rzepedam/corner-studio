<?php

namespace Tests\Feature;

use CornerStudio\Http\Entities\Subscription;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscriptionShowTest extends TestCase
{
    use DatabaseTransactions;

    protected $subscription;

    public function setUp()
    {
        parent::setUp();
        $this->subscription = factory(Subscription::class)->create();
    }

    /** @test */
    function show_subscription()
    {
        $this->get('subscriptions/' . $this->subscription->id)
            ->assertStatus(200);
    }
}
