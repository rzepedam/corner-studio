<?php

namespace Tests\Feature;

use CornerStudio\Http\Entities\Client;
use CornerStudio\Http\Entities\Professional;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityCreateTest extends TestCase
{
    use DatabaseTransactions;

    protected $professional;

    public function setUp()
    {
        parent::setUp();
        $this->professional = factory(Professional::class)->create();
    }

    /** @test */
    function create_activity()
    {
        $this->get('activities/create')
            ->assertSee($this->professional->full_name)
            ->assertSee('Crear Nueva Actividad');
    }

}
