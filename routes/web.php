<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\EventTypeController;

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


Auth::routes();



Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', [ProvinceController::class, 'index'])->name('home');
    Route::get('/', [ProvinceController::class, 'index']);

    Route::resource('report', ReportController::class);
    Route::resource('province', ProvinceController::class);
    Route::resource('event_types', EventTypeController::class);


    Route::get('/activities/{event_type?}', [ReportController::class, 'event_type'])->name('activities');
});