<?php

use App\Http\Controllers\Api\ApiCalendarEntryController;
use App\Http\Controllers\Api\ApiExerciseController;
use App\Http\Controllers\Api\ApiMealController;
use App\Http\Controllers\Api\ApiScheduleController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\MealController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ApiWeightTrackingController;
use App\Http\Controllers\Api\WeightTrackingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, "login"]);
Route::post('register', [UserController::class, "register"]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('meals', MealController::class);
    Route::resource('exercises', ExerciseController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::get('weight-tracking', [WeightTrackingController::class, 'show']);
    Route::post('weight-tracking/log', [WeightTrackingController::class, 'store'])->name('weight-log.store');
    Route::post('logout', [UserController::class, "logout"]);
});
