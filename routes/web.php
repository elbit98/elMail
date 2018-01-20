<?php

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/', 'BunchController@index');
    Route::get('/home', 'BunchController@index')->name('home');
    Route::resource('bunch', 'BunchController');
    Route::resource('subscriber', 'SubscriberController');
    Route::group(['prefix' => 'bunch/{bunch_id}/', 'as' => 'bunch::'], function () {
    Route::resource('subscriber', 'SubscriberController');
    });
    Route::resource('templates', 'TemplateController');
    Route::resource('campaigns', 'CampaignController');
    Route::get('/campaigns/{campaign}/send', 'CampaignController@send');
    Route::get('/campaigns/{campaign}/preview', 'CampaignController@preview');
});
