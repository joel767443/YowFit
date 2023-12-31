<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        return view('admin.setting.index');
    }
}
