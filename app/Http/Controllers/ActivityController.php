<?php

namespace CornerStudio\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use CornerStudio\Http\Entities\Color;
use CornerStudio\Http\Entities\Activity;
use CornerStudio\Http\Entities\Professional;

class ActivityController extends Controller
{
    /**
     * @var Activity
     */
    protected $activity;

    /**
     * @var Color
     */
    protected $color;

    /**
     * @var Log
     */
    protected $log;

    /**
     * @var Professional
     */
    protected $professional;

    /**
     * ActivityController constructor.
     *
     * @param Activity $activity
     * @param Color $color
     * @param Log $log
     * @param Professional $professional
     */
    public function __construct(Activity $activity, Color $color, Log $log, Professional $professional)
    {
        $this->activity     = $activity;
        $this->color        = $color;
        $this->log          = $log;
        $this->professional = $professional;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = $this->activity->with(['professional'])
            ->orderBy('end_date', 'ASC')
            ->paginate(20);

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colorsAll     = $this->color->pluck('color');
        $colorsUsed    = $this->activity->pluck('color')->unique();
        $professionals = $this->professional->pluck('full_name', 'id');
        $colors        = $colorsAll->diff($colorsUsed);

        return view('activities.create', compact('colors', 'professionals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try
        {
            $this->activity->create(request()->all());

            return response()->json(['status' => true, 'url' => '/activities']);
        } catch ( Exception $e )
        {
            $this->log->error("Error Store Activity: " . $e->getMessage());

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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
