<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Exercise;
use App\Models\Meal;
use App\Models\Setting;
use App\Models\WorkTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $meals = Meal::all();
        $workTypes = WorkTime::$workTypes;
        return view('admin.setting.index', compact('settings', 'exercises', 'meals', 'workTypes'));
    }

    /**
     * @param SettingRequest $request
     * @param Setting $setting
     * @return void
     */
    #[NoReturn] public function update(SettingRequest $request, Setting $setting): void
    {
//        dd($request->validated());
        $setting->update($request->validated());
    }
}


//"exercise_times" => "[{"schedule_id":1},{"schedule_id":1},{"schedule_id":1}]"
