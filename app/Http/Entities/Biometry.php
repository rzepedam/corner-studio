<?php

namespace CornerStudio\Http\Entities;

use GuzzleHttp\Client;

class Biometry
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Biometry constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('BIOMETRY_URL'),
        ]);
    }

    /**
     * @return \Psr\Http\Message\StreamInterface
     */
    public function all()
    {
        return json_decode($this->client->post('getPeopleForClient/', [
            'form_params' => [
                'secret_key' => env('BIOMETRY_KEY'),
                'client'     => env('BIOMETRY_CLIENT'),
                'place'      => env('BIOMETRY_PLACE'),
            ],
        ])->getBody());
    }

    /**
     * @param $client
     */
    public function create($client)
    {
        $this->client->post('createOrUpdatePerson/', [
            'form_params' => [
                'secret_key' => env('BIOMETRY_KEY'),
                'client'     => env('BIOMETRY_CLIENT'),
                'place'      => env('BIOMETRY_PLACE'),
                'action'     => 'add',
                'passport'   => $client->rut,
                'first_name' => $client->first_name,
                'last_name'  => $client->male_surname,
            ],
        ])->getBody();
    }

    /**
     * @param $client
     */
    public function delete($client)
    {
        $rut = str_replace('.', '', $client->rut);
        $this->client->post('createOrUpdatePerson/', [
            'form_params' => [
                'secret_key' => env('BIOMETRY_KEY'),
                'client'     => env('BIOMETRY_CLIENT'),
                'place'      => env('BIOMETRY_PLACE'),
                'action'     => 'delete',
                'passport'   => $rut,
            ],
        ])->getBody();
    }
}
