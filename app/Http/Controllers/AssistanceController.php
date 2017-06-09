<?php

namespace CornerStudio\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use CornerStudio\Http\Entities\Client;
use CornerStudio\Http\Entities\Activity;
use CornerStudio\Http\Entities\Schedule;
use CornerStudio\Http\Entities\Assistance;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AssistanceController extends Controller
{
    /**
     * @var Activity
     */
    protected $activity;

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
     * @var Schedule
     */
    protected $schedule;

    /**
     * AssistanceController constructor.
     *
     * @param Activity $activity
     * @param Assistance $assistance
     * @param Client $client
     * @param Log $log
     * @param Schedule $schedule
     */
    public function __construct(Activity $activity, Assistance $assistance, Client $client, Log $log, Schedule $schedule)
    {
        $this->activity   = $activity;
        $this->assistance = $assistance;
        $this->client     = $client;
        $this->log        = $log;
        $this->schedule   = $schedule;
    }

    public function index()
    {
        $activities  = $this->activity->pluck('name', 'id');
        $assistances = $this->assistance
            ->with(['client'])
            ->name(request('search'))
            ->activity(request('activity'))
            ->orderBy('created_at', 'DESC')
            ->paginate(20);

        return view('assistances.index', compact('activities', 'assistances'));
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
            $client = $this->client->with(['assistances', 'subscriptions.activities.schedules'])
                ->whereRut($request->get('rut'))
                ->firstOrFail();

            // Actividades suscritas por cliente (con horario)
            $subscriptionTo = $client->subscriptions->pluck('activities')
                ->collapse()
                ->pluck('schedules')
                ->collapse();

            // Actividades que se realizan en momento de la marca +30 min.
            $mark       = Carbon::parse($request->get('created_at'));
            $limit      = Carbon::parse($mark)->addMinutes(15);
            $activities = $this->schedule->whereBetween('start', [$mark, $limit])->get();

            // Búsqueda de Actividad que el cliente se dirige
            $activity = $activities->intersect($subscriptionTo);

            // Store assistance
            $request->request->add(['activity_id' => $activity->isEmpty() ? null : $activity[0]->activity_id]);
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
