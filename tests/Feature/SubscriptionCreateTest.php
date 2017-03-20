<?php

namespace Tests\Feature;

use CornerStudio\Http\Entities\Activity;
use CornerStudio\Http\Entities\Address;
use CornerStudio\Http\Entities\Client;
use CornerStudio\Http\Entities\Payment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscriptionCreateTest extends TestCase
{
    use DatabaseTransactions;

    protected $client;

    protected $payment;

    protected $activity;

    public function setUp()
    {
        parent::setUp();
        $this->client   = factory(Client::class)->create();
        $this->payment  = factory(Payment::class)->create();
        $this->activity = factory(Activity::class)->create();
    }

    /** @test */
    function create_subscription()
    {
        $this->get('subscriptions/create')
            ->assertSee($this->client->full_name)
            ->assertSee($this->payment->name)
            ->assertSee($this->activity->name)
            ->assertSee('Crear Nueva Suscripción');
    }

    /** @test */
    function store_subscription()
    {
        $data = [
            'client_id'   => $this->client->id,
            'payment_id'  => $this->payment->id,
            'activities'  => [3, 4, 7, 9],
            'end_date'    => '15-08-2017',
            'num_voucher' => '89729821',
            'payday'      => '10'
        ];

        $this->post('subscriptions', $data)
            ->assertExactJson(['status' => true, 'url' => '/subscriptions']);

        $this->assertDatabaseHas('subscriptions', [
            'client_id'   => $this->client->id,
            'payment_id'  => $this->payment->id,
            'end_date'    => '2017-08-15',
            'num_voucher' => '89729821',
            'payday'      => '10'
        ]);

        $this->assertDatabaseHas('activity_subscription', [
            'activity_id' => 3,
        ]);

        $this->assertDatabaseHas('activity_subscription', [
            'activity_id' => 4,
        ]);

        $this->assertDatabaseHas('activity_subscription', [
            'activity_id' => 7,
        ]);

        $this->assertDatabaseHas('activity_subscription', [
            'activity_id' => 9,
        ]);
    }
}
