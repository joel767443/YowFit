<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = [
            "Morning" => [
                '5:00:00' => "wake up time",
                '5:00:01' => "Exercise",
                '6:00:00' => "Shower",
                '7:00:00' => "Shower",
                '7:30:00' => "Work",
            ],
            "Afternoon" => [
                "12:00:00" => 'Lunch time',
                "13:00:00" => 'Work',
                "17:00:00" => 'Relax',
            ],
            "Evening" => [
                '18:00:00' => "Relaxing time",
                '19:00:00' => "Wind down",
                '21:00:00' => "Sleep time",
            ],
        ];

        return view('admin.setting.index', compact('data'));
    }
}
