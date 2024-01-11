<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Exercise;
use App\Models\ExerciseTime;
use App\Models\Meal;
use App\Models\Setting;
use App\Models\WorkTime;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\NoReturn;

/**
 * Class SettingController
 */
class SettingController extends Controller
{
    /**
     * @return view
     */
    public function index(): view
    {
        $settings = Setting::where('user_id', Auth::user()->id)->first();
        $exercises = Exercise::all();
        $exerciseTimes = ExerciseTime::whereIn('schedule_id', Auth::user()->schedules->pluck('id'))->get();
        $meals = Meal::all();
        $workTypes = WorkTime::$workTypes;
        return view('admin.setting.index', compact('settings', 'exercises', 'meals', 'workTypes', 'exerciseTimes'));
    }

    /**
     * @param SettingRequest $request
     * @param Setting $setting
     * @return void
     */
    #[NoReturn] public function update(SettingRequest $request, Setting $setting): void
    {
        if ($request->validated('exercise_id')) {
            ExerciseTime::create([
                'exercise_time_from' => $request->validated('exercise_time_from'),
                'exercise_time_to' => $request->validated('exercise_time_to'),
                'schedule_id' => $request->validated('schedule_id'),
                'exercise_id' => $request->validated('exercise_id'),
            ]);
        }
        //$setting->update($request->validated());
    }
}

