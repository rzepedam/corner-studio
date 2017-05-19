<?php

namespace CornerStudio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use CornerStudio\Http\Entities\Client;
use CornerStudio\Http\Entities\Assistance;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AssistanceController extends Controller
{
    /**
     * @var Assistance
     */
    protected $assistance;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Log
     */
    protected $log;

    /**
     * AssistanceController constructor.
     *
     * @param Assistance $assistance
     * @param Client $client
     * @param Log $log
     */
    public function __construct(Assistance $assistance, Client $client, Log $log)
    {
        $this->assistance = $assistance;
        $this->client     = $client;
        $this->log        = $log;
    }

    public function index()
    {
        $assistances = $this->assistance->with(['client'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('assistances.index', compact('assistances'));
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rut'        => ['required'],
            'created_at' => ['required', 'unique:assistances,created_at']
        ]);

        try
        {
            $client = $this->client->with(['assistances'])->whereRut($request->get('rut'))->firstOrFail();
            $client->assistances()->create($request->all());

            return response()->json(['status' => true], 201);
        } catch ( \Exception $e )
        {
            $this->log->error("Error Store Assistances: " . $e->getMessage());
            if ( $e instanceof ModelNotFoundException )
            {
                $e = new NotFoundHttpException($e->getMessage(), $e);

                return response()->json(['error' => 'Model not found'], 404);
            }

            return response()->json(['status' => false], 500);
        }
    }
}
