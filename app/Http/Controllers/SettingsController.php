<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {

        $settings = Setting::first();

        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_web' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);


        $setting = Setting::first();
        $setting->nama_web = $request->nama_web;
        $setting->deskripsi = $request->deskripsi;
        $setting->save();

        return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
