<?php

// Register Twill routes here (eg. Route::module('posts'))
Route::module('pages');
Route::module('municipalities');
Route::module('farmers');
Route::module('newsItems');
Route::module('projects');

Route::name('homesettings.')->group(function () {
    Route::get('/homesettings', 'HomeController@show')->name('show');
    Route::post('/homesettings', 'HomeController@update')->name('update'); 
});