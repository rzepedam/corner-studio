<?php

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('/home', 'HomeController@index');
    Route::resource('clients', 'ClientController');
    Route::resource('professionals', 'ProfessionalController');
    Route::resource('activities', 'ActivityController');
    Route::resource('subscriptions', 'SubscriptionController');
    Route::resource('schedules', 'ScheduleController');
    Route::get('/incomes', ['as' => 'incomes', 'uses' => 'IncomeController@index']);

    // Ajax methods -> AjaxController
    Route::get('/loadCommunes', 'AjaxController@loadCommunes');
    Route::get('/loadProvinces', 'AjaxController@loadProvinces');
});
