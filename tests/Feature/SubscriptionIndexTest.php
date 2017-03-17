<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscriptionIndexTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    function index_subscription()
    {
        $this->get('subscriptions')
            ->assertStatus(200);
    }
}
