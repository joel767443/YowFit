<?php

use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CalendarEntryController;
use App\Http\Controllers\Web\ExerciseController;
use App\Http\Controllers\Web\MealController;
use App\Http\Controllers\Web\ScheduleController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\WeightTrackingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('exercises', ExerciseController::class);
    Route::resource('meals', MealController::class);
    Route::resource('weight-tracking', WeightTrackingController::class);
    Route::resource('calendar-entries', CalendarEntryController::class);
});

