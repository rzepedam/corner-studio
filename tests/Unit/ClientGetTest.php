<?php

namespace Tests\Unit;

use Tests\TestCase;
use CornerStudio\Http\Entities\Client;
use CornerStudio\Http\Entities\Region;
use CornerStudio\Http\Entities\Address;
use CornerStudio\Http\Entities\Commune;
use CornerStudio\Http\Entities\Province;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientGetTest extends TestCase
{
    use DatabaseTransactions;

    protected $client;

    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    function can_display_rut_with_dash_and_points_client()
    {
        $client = factory(Client::class)->create(['rut' => '7533818-k']);

        $this->assertEquals('7.533.818-k', $client->rut);
    }

    /** @test */
    function can_display_birthday_with_l_j_F_Y_format_client()
    {
        $client = factory(Client::class)->create(['birthday' => '20-07-1978']);

        $this->assertEquals('jueves 20 julio 1978', $client->birthday);
    }

    /** @test */
    function can_display_is_male_true_as_string_client()
    {
        $client = factory(Client::class)->create(['is_male' => '1']);

        $this->assertEquals('Masculino', $client->is_male);
    }

    /** @test */
    function can_display_is_male_false_as_string_client()
    {
        $client = factory(Client::class)->create(['is_male' => '0']);

        $this->assertEquals('Femenino', $client->is_male);
    }

    /** @test */
    function can_display_address_with_commune_province_region_client()
    {
        $address = factory(Address::class)->create([
            'commune_id' => factory(Commune::class)->create([
                'name'        => 'Pozo Almonte',
                'province_id' => factory(Province::class)->create([
                    'name'      => 'El Tamarugal',
                    'region_id' => factory(Region::class)->create(['name' => 'Región de Tarapacá'])->id
                ])->id
            ])->id,
            'address'    => 'Palacio Riesco 3819'
        ]);

        $this->assertEquals('Palacio Riesco 3819, Pozo Almonte. Región de Tarapacá', $address->address);
    }
}
