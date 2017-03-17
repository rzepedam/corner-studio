<?php

namespace Tests\Unit;

use Tests\TestCase;
use CornerStudio\Http\Entities\Client;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientSetTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    function can_formatted_rut_client()
    {
        factory(Client::class)->create(['rut' => '23.387.461-2']);

        $this->assertDatabaseHas('clients', [
            'rut' => '23387461-2'
        ]);
    }

    /** @test */
    function can_formatted_birthday_client()
    {
        factory(Client::class)->create(['birthday' => '31-01-1993']);

        $this->assertDatabaseHas('clients', [
            'birthday' => '1993-01-31'
        ]);
    }

    /** @test */
    function can_formatted_is_male_true_client()
    {
        $client = factory(Client::class)->create(['is_male' => '1']);

        $this->assertTrue($client->getOriginal('is_male'));
    }

    /** @test */
    function can_formatted_is_male_false_client()
    {
        $client = factory(Client::class)->create(['is_male' => '0']);

        $this->assertFalse($client->getOriginal('is_male'));
    }
}
