<?php

/* ----------- Authentication Routes --------------- */
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::group(['middleware' => ['auth:api']], function () {
    /* ----------- User Routes --------------- */
    Route::resource('users', 'UserController')->except(['create', 'edit']);
    Route::resource('user-notify-token', 'UserNotifyTokenController')->except(['create', 'edit']);
    Route::resource('campaigns', 'CampaingController')->except(['create', 'edit']);
    Route::get('campaigns-accept/{id}', 'CampaingController@accept');
});

/* ----------- Provinces Routes --------------- */
Route::get('provinces/{id}/locations', 'ProvinceController@showLocationsProvince');
Route::resource('provinces', 'ProvinceController')->except(['create', 'edit']);

/* ----------- Blood Types Routes --------------- */
Route::resource('blood_types', 'BloodTypeController')->except(['create', 'edit']);

/* ----------- Locations Routes --------------- */
Route::resource('locations', 'LocationController')->except(['create', 'edit']);
Route::resource('hospitals', 'HospitalController')->except(['create', 'edit']);
