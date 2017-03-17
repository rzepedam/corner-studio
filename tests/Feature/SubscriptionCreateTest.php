<?php

namespace Tests\Feature;

use CornerStudio\Http\Entities\Address;
use CornerStudio\Http\Entities\Payment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscriptionCreateTest extends TestCase
{
    use DatabaseTransactions;

    protected $address;

    protected $payment;

    public function setUp()
    {
        parent::setUp();
        $this->address = factory(Address::class)->create();
        $this->payment = factory(Payment::class)->create();
    }

    /** @test */
    function create_subscription()
    {
        $this->get('subscriptions/create')
            ->assertStatus(200);
    }

    /** @test */
    function store_subscription()
    {
        $data = [
            'client_id'   => $this->address->client->id,
            'payment_id'  => $this->payment->id,
            'end_date'    => '15-08-2017',
            'num_voucher' => '89729821',
            'payday'      => '10'
        ];

        $this->post('subscriptions', $data)
            ->assertExactJson(['status' => true, 'url' => '/subscriptions']);
    }
}
