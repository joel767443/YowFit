<?php

use App\Http\Controllers\Api\ApiCalendarEntryController;
use App\Http\Controllers\Api\ApiExerciseController;
use App\Http\Controllers\Api\ApiMealController;
use App\Http\Controllers\Api\ApiScheduleController;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiWeightTrackingController;
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

Route::post('login', [ApiUserController::class, "login"]);
Route::post('register', [ApiUserController::class, "register"]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('users', ApiUserController::class);
    Route::resource('schedules', ApiScheduleController::class);
    Route::resource('exercises', ApiExerciseController::class);
    Route::resource('meals', ApiMealController::class);
    Route::resource('weight-tracking', ApiWeightTrackingController::class);
    Route::resource('calendar-entries', ApiCalendarEntryController::class);
});
