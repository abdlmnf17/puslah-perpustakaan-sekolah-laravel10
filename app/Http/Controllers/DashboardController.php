<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
class DashboardController extends Controller
{
    public function index()
    {

        $setting = Setting::where('key', 'app_name')->first();
        $appName = $setting ? $setting->value : 'Default App Name';

        return view('layouts.app', ['appName' => $appName]);
    }
}
