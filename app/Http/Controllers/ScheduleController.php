<?php

namespace CornerStudio\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use CornerStudio\Http\Entities\Activity;
use CornerStudio\Http\Entities\Schedule;

class ScheduleController extends Controller
{
    /**
     * @var Activity
     */
    protected $activity;

    /**
     * @var Schedule
     */
    protected $schedule;

    /**
     * @var Log
     */
    private $log;

    /**
     * ScheduleController constructor.
     *
     * @param Activity $activity
     * @param Log $log
     * @param Schedule $schedule
     */
    public function __construct(Activity $activity, Log $log, Schedule $schedule)
    {
        $this->activity = $activity;
        $this->log      = $log;
        $this->schedule = $schedule;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( request()->ajax() )
        {
            $schedules = $this->schedule->with(['activity.professional'])->get();

            return $schedules;
        }

        $activities = $this->activity->all();

        return view('schedules.index', compact('activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start = Carbon::createFromFormat('Y-m-d H:i', request('start'));
        $end   = Carbon::createFromFormat('Y-m-d H:i', request('end'));

        DB::beginTransaction();
        try
        {
            $activity = $this->activity->findOrFail(request('activity_id'));

            if ( $start < Carbon::parse($activity->getOriginal('start_date')) || $end > Carbon::parse($activity->getOriginal('end_date')) )
            {
                return response()->json([
                    'status' => false,
                    'start'  => $activity->getOriginal('start_date'),
                    'end'    => $activity->getOriginal('end_date')
                ]);
            }

            $activity->schedules()->create(request()->all());
            DB::commit();

            return response()->json(['status' => true]);
        } catch ( Exception $e )
        {
            $this->log->error("Error Store Schedule: " . $e->getMessage());
            DB::rollBack();

            return response()->json(['status' => false]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $start = Carbon::createFromFormat('Y-m-d H:i', request('start'));
        $end   = Carbon::createFromFormat('Y-m-d H:i', request('end'));

        DB::beginTransaction();
        try
        {
            $schedule = $this->schedule->with(['activity'])->findOrFail($id);

            if ( $start < $schedule->activity->getOriginal('start_date') || $end > $schedule->activity->getOriginal('end_date') )
            {
                return response()->json([
                    'status' => false,
                    'start'  => $schedule->activity->getOriginal('start_date'),
                    'end'    => $schedule->activity->getOriginal('end_date')
                ]);
            }

            $schedule->update(request()->all());
            DB::commit();

            return response()->json(['status' => true]);
        } catch ( Exception $e )
        {
            $this->log->error("Error Update Schedule: " . $e->getMessage());
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
            $this->schedule->destroy($id);

            return response()->json(['status' => true]);
        } catch ( Exception $e )
        {
            $this->log->error("Error Delete Schedule: " . $e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
