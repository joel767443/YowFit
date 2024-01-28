<?php

use App\Http\Controllers\Web\ExerciseController;
use App\Http\Controllers\Web\ScheduleTimeController;
use App\Http\Controllers\Web\ExerciseTypeController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MealController;
use App\Http\Controllers\Web\SiteController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\WeightTrackingController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::any('/',[SiteController::class, 'index'])->name('site.index');

Auth::routes();

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::group(['middleware' => ['role:' . User::ROLE_ADMIN]], function () {
        Route::resource('users', UserController::class);
        Route::resource('exercises', ExerciseController::class);
        Route::resource('scheduleTimes', ScheduleTimeController::class);
        Route::resource('exercise-types', ExerciseTypeController::class);
        Route::resource('meals', MealController::class);
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('weight-tracking', [WeightTrackingController::class, 'show'])->name('weight-tracking.show');
    Route::get('weight-tracking/log', [WeightTrackingController::class, 'log'])->name('weight-tracking.index');
    Route::post('weight-tracking/log', [WeightTrackingController::class, 'store'])->name('weight-tracking.store');
    Route::get('my-schedule', [ScheduleTimeController::class, 'mySchedule'])->name('schedule.index');
    Route::post('schedule-times/{scheduleTime}', [ScheduleTimeController::class, 'update'])->name('schedule_times.update');
    Route::post('schedule-times', [ScheduleTimeController::class, 'store'])->name('schedule_times.store');
});

