<?php

Route::get('/', ['as' => 'home', 'uses' => function ()
{
    $activities = \CornerStudio\Http\Entities\Activity::all();

    return view('welcome', compact('activities'));
}]);

Route::resource('clients', 'ClientController');
Route::resource('professionals', 'ProfessionalController');
Route::resource('activities', 'ActivityController');
Route::resource('subscriptions', 'SubscriptionController');
Route::resource('schedules', 'ScheduleController');
Route::get('/incomes', ['as' => 'incomes', 'uses' => 'IncomeController@index']);

// Ajax methods -> AjaxController
Route::get('/loadCommunes', 'AjaxController@loadCommunes');
Route::get('/loadProvinces', 'AjaxController@loadProvinces');

