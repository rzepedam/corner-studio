<?php

namespace CornerStudio\Http\Controllers;

use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use CornerStudio\Http\Entities\Client;
use CornerStudio\Http\Entities\Region;
use CornerStudio\Http\Entities\Country;
use CornerStudio\Http\Entities\MaritalStatus;

class ClientController extends Controller
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Country
     */
    protected $country;

    /**
     * @var Log
     */
    protected $log;

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
     * @param Country $country
     * @param Log $log
     * @param MaritalStatus $maritalStatus
     * @param Region $region
     */
    public function __construct(Client $client, Country $country, Log $log, MaritalStatus $maritalStatus, Region $region)
    {
        $this->client        = $client;
        $this->country       = $country;
        $this->log           = $log;
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
        $countries       = $this->country->pluck('name', 'id');

        return view('clients.create', compact('countries', 'maritalStatuses', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->request->add(['full_name' => null]);
        DB::beginTransaction();

        try
        {
            $client = $this->client->create(request()->all());
            $client->address()->create(request()->all());
            DB::commit();

            return response()->json(['status' => true, 'url' => '/clients']);
        } catch ( Exception $e )
        {
            $this->log->error("Error Store Client: " . $e->getMessage());
            DB::rollBack();

            return response()->json(['status' => false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = $this->client->findOrFail($id);

        return view('clients.show', compact('client'));
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
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
