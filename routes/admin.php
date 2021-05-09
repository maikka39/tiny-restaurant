<?php

// Register Twill routes here (eg. Route::module('posts'))

use Illuminate\Support\Facades\Route;

Route::module('pages');
Route::module('municipalities');
Route::module('farmers');
Route::module('newsItems');
Route::module('projects');
Route::module('homepages');

Route::name('homepage')->get('/homepage', 'HomepageController@admin');

Route::name('homesettings.')->group(function () {
    Route::get('/homesettings', 'HomeController@show')->name('show');
    Route::post('/homesettings', 'HomeController@update')->name('update');
});
