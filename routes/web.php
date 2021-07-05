<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\FieldsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;

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
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index']);

    Route::resource('report', ReportController::class);
    Route::resource('province', ProvinceController::class);
    Route::resource('event_types', EventTypeController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('field', FieldsController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('image', ImageController::class);


    Route::get('/activities/{event_type?}', [ReportController::class, 'event_type'])->name('activities');
    Route::get('/activities/province/{province_id}/{event_type_id}', [ReportController::class, 'province_activity'])->name('activities.province');
    Route::post('/specific_report', [ReportController::class, 'specific_report'])->name('specific_report');
    Route::post('/readonly_report', [ReportController::class, 'readonly_specific_report'])->name('readonly_report');
    // Route::get('/images', [ReportController::class, 'load_all_images'])->name('images');
});