<?php

namespace CornerStudio\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use CornerStudio\Http\Entities\Client;
use CornerStudio\Http\Entities\Region;
use CornerStudio\Http\Entities\Country;
use CornerStudio\Http\Entities\Biometry;
use CornerStudio\Http\Entities\Province;
use CornerStudio\Http\Requests\ClientRequest;
use CornerStudio\Http\Entities\MaritalStatus;

class ClientController extends Controller
{
    /**
     * @var Biometry
     */
    protected $biometry;

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
     * @var Province
     */
    protected $province;

    /**
     * @var Region
     */
    protected $region;

    /**
     * ClientController constructor.
     *
     * @param Biometry $biometry
     * @param Client $client
     * @param Country $country
     * @param Log $log
     * @param MaritalStatus $maritalStatus
     * @param Province $province
     * @param Region $region
     */
    public function __construct(Biometry $biometry, Client $client, Country $country, Log $log, MaritalStatus $maritalStatus, Province $province, Region $region)
    {
        $this->biometry      = $biometry;
        $this->client        = $client;
        $this->country       = $country;
        $this->log           = $log;
        $this->maritalStatus = $maritalStatus;
        $this->province      = $province;
        $this->region        = $region;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->client
            ->name(request('search'))
            ->orderBy('id', 'DESC')
            ->paginate(20);

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
        $regionsAll      = $this->region->get();
        $regions         = $regionsAll->pluck('name', 'id');
        $provincesAll    = $this->region->findOrFail($regionsAll->first()['id'])->provinces;
        $provinces       = $provincesAll->pluck('name', 'id');
        $communes        = $this->province->findOrFail($provincesAll->first()['id'])->communes->pluck('name', 'id');
        $countries       = $this->country->pluck('name', 'id');

        return view('clients.create', compact('communes', 'countries', 'maritalStatuses', 'provinces', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        request()->request->add(['full_name' => null]);
        DB::beginTransaction();

        try
        {
            $client = $this->client->create(request()->all());
            $client->address()->create(request()->all());
            $this->biometry->create($client);
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
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client          = $this->client->with(['address.commune.province.region'])->findOrFail($id);
        $communes        = $this->province->findOrFail($client->address->commune->province->id)->communes->pluck('name', 'id');
        $countries       = $this->country->pluck('name', 'id');
        $maritalStatuses = $this->maritalStatus->pluck('name', 'id');
        $provinces       = $this->region->findOrFail($client->address->commune->province->region->id)->provinces->pluck('name', 'id');
        $regions         = $this->region->pluck('name', 'id');

        return view('clients.edit', compact('client', 'communes', 'countries', 'maritalStatuses', 'provinces', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        request()->request->add(['full_name' => null]);
        DB::beginTransaction();

        try
        {
            $client = $this->client->with(['address'])->findOrFail($id);
            $client->update(request()->all());
            $client->address->update(request()->all());

            DB::commit();

            return response()->json(['status' => true, 'url' => '/clients']);
        } catch ( Exception $e )
        {
            $this->log->error("Error Update Client: " . $e->getMessage());
            DB::rollBack();

            return response()->json(['status' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try
        {
            $client = $this->client->findOrFail($id);
            $this->biometry->delete($client);
            $client->subscriptions()->delete();
            $client->delete();
            DB::commit();

            return response()->json(['status' => true]);
        } catch ( Exception $e )
        {
            $this->log->error('Error Delete Client: ' . $e->getMessage());
            DB::rollBack();

            return response()->json(['status' => false]);
        }
    }
}
