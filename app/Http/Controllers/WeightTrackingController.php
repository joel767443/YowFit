<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeightTrackingController extends Controller
{
    public function show()
    {
        return view('admin.weight-tracking.show');
    }
}
