<?php

namespace CornerStudio\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use CornerStudio\Http\Entities\Region;
use CornerStudio\Http\Entities\Country;
use CornerStudio\Http\Entities\Province;
use CornerStudio\Http\Entities\Professional;
use CornerStudio\Http\Entities\MaritalStatus;
use CornerStudio\Http\Requests\ProfessionalRequest;

class ProfessionalController extends Controller
{
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
     * @var Professional
     */
    protected $professional;

    /**
     * @var Province
     */
    protected $province;

    /**
     * @var Region
     */
    protected $region;

    /**
     * ProfessionalController constructor.
     *
     * @param Country $country
     * @param Log $log
     * @param MaritalStatus $maritalStatus
     * @param Professional $professional
     * @param Province $province
     * @param Region $region
     */
    public function __construct(Country $country, Log $log, MaritalStatus $maritalStatus, Professional $professional, Province $province, Region $region)
    {
        $this->country       = $country;
        $this->log           = $log;
        $this->maritalStatus = $maritalStatus;
        $this->professional  = $professional;
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
        $professionals = $this->professional->orderBy('id', 'DESC')->paginate(25);

        return view('professionals.index', compact('professionals'));
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

        return view('professionals.create', compact('communes', 'countries', 'maritalStatuses', 'provinces', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProfessionalRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessionalRequest $request)
    {
        request()->request->add(['full_name' => null]);
        DB::beginTransaction();

        try
        {
            $professional = $this->professional->create(request()->all());
            $professional->address()->create(request()->all());
            DB::commit();

            return response()->json(['status' => true, 'url' => '/professionals']);
        } catch ( Exception $e )
        {
            $this->log->error("Error Store Professional: " . $e->getMessage());
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
        $professional = $this->professional->findOrFail($id);

        return view('professionals.show', compact('professional'));
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
        $professional    = $this->professional->with(['address.commune.province.region'])->findOrFail($id);
        $communes        = $this->province->findOrFail($professional->address->commune->province->id)->communes->pluck('name', 'id');
        $countries       = $this->country->pluck('name', 'id');
        $maritalStatuses = $this->maritalStatus->pluck('name', 'id');
        $provinces       = $this->region->findOrFail($professional->address->commune->province->region->id)->provinces->pluck('name', 'id');
        $regions         = $this->region->pluck('name', 'id');

        return view('professionals.edit', compact('professional', 'communes', 'countries', 'maritalStatuses', 'provinces', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfessionalRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionalRequest $request, $id)
    {
        request()->request->add(['full_name' => null]);
        DB::beginTransaction();

        try
        {
            $professional = $this->professional->with(['address'])->findOrFail($id);
            $professional->update(request()->all());
            $professional->address->update(request()->all());

            DB::commit();

            return response()->json(['status' => true, 'url' => '/professionals']);
        } catch ( Exception $e )
        {
            $this->log->error("Error Update Professional: " . $e->getMessage());
            DB::rollBack();

            return response()->json(['status' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $professional = $this->professional->findOrFail($id);
            $professional->activities()->delete();
            $professional->delete();

            return response()->json(['status' => true]);
        } catch ( Exception $e )
        {
            $this->log->error('Error Delete Professional: ' . $e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
