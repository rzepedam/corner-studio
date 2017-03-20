<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clients', 'ClientController');
Route::resource('subscriptions', 'SubscriptionController');
Route::resource('activities', 'ActivityController');
