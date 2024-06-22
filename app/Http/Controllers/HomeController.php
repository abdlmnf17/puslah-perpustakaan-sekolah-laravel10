<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class HomeController extends Controller
{
public function index()
 {
    $settings = Setting::first();
    return view('dashboard', compact('settings'));

}
}
