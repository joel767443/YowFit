<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
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
        return view('admin.setting.index', ['settings' => Setting::where('user_id', Auth::user()->id)->first()]);
    }

    /**
     * @param SettingRequest $request
     * @param Setting $setting
     * @return void
     */
    #[NoReturn] public function update(SettingRequest $request, Setting $setting): void
    {
        $setting->update($request->validated());
    }
}
