<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\FarmerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MunicipalityController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Models\Project;

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

Route::post('/contact', [MailController::class, 'sendMail'])->name('contact.sendMail');
Route::get('gemeente/{slug}', [MunicipalityController::class, 'view'])->name('municipality.show');
Route::get('boer/{slug}', [FarmerController::class, 'view'])->name('farmer.show');
Route::get('/projecten', [ProjectController::class, 'showAll'])->name('project.showAll');
Route::post('/projecten', [ProjectController::class, 'filter'])->name('project.filter');
Route::get('project/{slug}', [ProjectController::class, 'view'])->name('project.show');
Route::get('/{slug}', [PageController::class, 'view'])->name('pages.show');
