<?php

use App\Http\Controllers\Admin\NewsItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\FarmerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MunicipalityController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\DonationPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomepageController::class, 'view'])->name('homepages.show');
Route::post('/contact', [MailController::class, 'sendMail'])->name('contact.sendMail');
Route::get('/gemeente/{slug}', [MunicipalityController::class, 'view'])->name('municipality.show');
Route::get('/nieuws', [NewsItemController::class, 'view'])->name('newsItems.show');
Route::get('/doneer', [DonationPageController::class, 'view'])->name('donations.show');
Route::get('/betaling', [PaymentController::class, 'info'])->name('payment.info');
Route::post('/betaling', [PaymentController::class, 'new'])->name('payment.new');

Route::name('project.')->group(function () {
    Route::get('/projecten', [ProjectController::class, 'showAll'])->name('showAll');
    Route::post('/projecten', [ProjectController::class, 'filter'])->name('filter');
    Route::get('/project/{slug}', [ProjectController::class, 'view'])->name('show');
});

Route::get('/boer/{slug}', [FarmerController::class, 'view'])->name('farmer.show');

Route::get('/styles', function () {
    return view('site.styles');
});

Route::get('/{slug}', [PageController::class, 'view'])->name('pages.show');
