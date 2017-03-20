<?php

namespace CornerStudio\Http\Controllers;

use Illuminate\Http\Request;
use CornerStudio\Http\Entities\Activity;
use CornerStudio\Http\Entities\Professional;

class ActivityController extends Controller
{
    /**
     * @var Activity
     */
    protected $activity;

    /**
     * @var Professional
     */
    protected $professional;

    /**
     * ActivityController constructor.
     *
     * @param Activity $activity
     * @param Professional $professional
     */
    public function __construct(Activity $activity, Professional $professional)
    {
        $this->activity     = $activity;
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
                        ->get();

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professionals = $this->professional->pluck('full_name', 'id');

        return view('activities.create', compact('professionals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
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
