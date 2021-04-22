<?php

// Register Twill routes here (eg. Route::module('posts'))
Route::module('pages');
Route::module('municipalities');
Route::module('farmers');
Route::module('newsItems');
Route::module('projects');

Route::name('settings')->get('/settings/{section}', 'CustomSettingsController@index');
Route::name('settings.update')->post('/settings/{section}', 'CustomSettingController@update');
