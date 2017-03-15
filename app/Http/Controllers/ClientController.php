<?php

namespace CornerStudio\Http\Controllers;

use CornerStudio\Http\Entities\MaritalStatus;
use CornerStudio\Http\Entities\Region;
use Illuminate\Http\Request;
use CornerStudio\Http\Entities\Client;

class ClientController extends Controller
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var MaritalStatus
     */
    protected $maritalStatus;

    /**
     * @var Region
     */
    protected $region;

    /**
     * ClientController constructor.
     * @param Client $client
     * @param MaritalStatus $maritalStatus
     * @param Region $region
     */
    public function __construct(Client $client, MaritalStatus $maritalStatus, Region $region)
    {
        $this->client        = $client;
        $this->maritalStatus = $maritalStatus;
        $this->region        = $region;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->client->all();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maritalStatuses = $this->maritalStatus->pluck('name', 'id');
        $regions         = $this->region->pluck('name', 'id');

        return view('clients.create', compact('maritalStatuses', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
