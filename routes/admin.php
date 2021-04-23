<?php

// Register Twill routes here (eg. Route::module('posts'))
Route::module('pages');
Route::module('municipalities');
Route::module('farmers');
Route::module('newsItems');
Route::module('projects');

Route::get('/homesettings', 'HomeController@show')->name('homesettings.show');
Route::post('/homesettings', 'HomeController@update')->name('homesettings.update');

