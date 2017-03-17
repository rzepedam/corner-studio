<?php

namespace Tests\Feature;

use Tests\TestCase;
use CornerStudio\Http\Entities\Commune;
use CornerStudio\Http\Entities\Country;
use CornerStudio\Http\Entities\MaritalStatus;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientCreateTest extends TestCase
{
    use DatabaseTransactions;

    protected $commune;

    protected $country;

    protected $maritalStatus;

    public function setUp()
    {
        parent::setUp();
        $this->commune       = factory(Commune::class)->create();
        $this->country       = factory(Country::class)->create();
        $this->maritalStatus = factory(MaritalStatus::class)->create();
    }

    /** @test */
    function store_client()
    {
        $data = [
            'male_surname'      => 'Oyarzún',
            'female_surname'    => 'Fernández',
            'first_name'        => 'Esteban',
            'second_name'       => 'Alonso',
            'rut'               => '21984631-2',
            'birthday'          => '18-04-1993',
            'marital_status_id' => $this->maritalStatus->id,
            'country_id'        => $this->country->id,
            'is_male'           => 1,
            'address'           => 'Los Mirasoles 9090',
            'depto'             => '',
            'block'             => '',
            'commune_id'        => $this->commune->id,
            'email'             => 'esteban.oyarzun@prim.cl',
            'phone1'            => '+56974155784',
            'phone2'            => '+56987100290'
        ];

        $this->post('clients', $data)
            ->assertExactJson(['status' => true, 'url' => '/clients']);
    }

}
