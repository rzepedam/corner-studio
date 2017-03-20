<?php

namespace Tests\Feature;

use CornerStudio\Http\Entities\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityCreateTest extends TestCase
{
    use DatabaseTransactions;

    protected $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = factory(Client::class)->create();
    }

    /** @test */
    function create_activity()
    {
        $this->get('activities/create')
            ->assertSee('Crear Nueva Actividad')
            ->assertStatus(200);
    }

}
