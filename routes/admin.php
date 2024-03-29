<?php

// Register Twill routes here (eg. Route::module('posts'))

use Illuminate\Support\Facades\Route;

Route::module('pages');
Route::module('municipalities');
Route::module('farmers');
Route::module('newsItems');
Route::module('projects');
Route::module('homepages');
Route::module('donationPages');

Route::name('homepage')->get('/homepage', 'HomepageController@admin');
Route::name('donationPage')->get('/donate', 'DonationPageController@admin');
