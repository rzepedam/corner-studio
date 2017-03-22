<?php

Route::get('/', ['as' => 'home', 'uses' => function ()
{
    $activities = \CornerStudio\Http\Entities\Activity::all();

    return view('welcome', compact('activities'));
}]);

Route::resource('clients', 'ClientController');
Route::resource('subscriptions', 'SubscriptionController');
Route::resource('activities', 'ActivityController');
Route::resource('schedules', 'ScheduleController');
