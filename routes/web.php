<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\Web\ExerciseController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MealController;
use App\Http\Controllers\Web\ScheduleController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\WeightTrackingController;
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

Route::any('/',[SiteController::class, 'index']);

Auth::routes();

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('exercises', ExerciseController::class);
    Route::resource('meals', MealController::class);
    Route::get('weight-tracking', [WeightTrackingController::class, 'show']);
    Route::get('my-schedule', [ScheduleController::class, 'show']);
});

