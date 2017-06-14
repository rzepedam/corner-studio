<?php

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('/home', 'HomeController@index');
    Route::get('passport', function() {
        return view('passport');
    });
    Route::resource('clients', 'ClientController');
    Route::resource('professionals', 'ProfessionalController');
    Route::get('/getAssistances', 'AssistanceController@getAssistances');
    Route::get('/assistances', 'AssistanceController@index');
    Route::get('/assistances/activities', 'AssistanceController@getAssistanceWithFilterActivity');
    Route::resource('activities', 'ActivityController');
    Route::resource('subscriptions', 'SubscriptionController');
    Route::resource('schedules', 'ScheduleController');
    Route::get('incomes', ['as' => 'incomes', 'uses' => 'IncomeController@index']);
    Route::post('/users/submitImage', ['as' => 'users.submitImage', 'uses' => 'UserController@submitImage']);
    Route::resource('users', 'UserController');
    Route::get('biometries', 'BiometryController@index');

    // Ajax methods -> AjaxController
    Route::get('/loadCommunes', 'AjaxController@loadCommunes');
    Route::get('/loadProvinces', 'AjaxController@loadProvinces');
});
