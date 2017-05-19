<?php

namespace CornerStudio\Http\Controllers;

use CornerStudio\Http\Entities\Activity;

class HomeController extends Controller
{
    /**
     * @var Activity
     */
    protected $activity;

    /**
     * Create a new controller instance.
     *
     * @param Activity $activity
     */
    public function __construct(Activity $activity)
    {
        $this->middleware('auth');

        $this->activity = $activity;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = $this->activity->all();

        return view('welcome', compact('activities'));
    }
}
