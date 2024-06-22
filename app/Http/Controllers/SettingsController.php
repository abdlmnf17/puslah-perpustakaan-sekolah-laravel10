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

        $validatedData = $request->validate([
            'nama_web' => 'required|string|max:30',
            'deskripsi' => 'nullable|string|max:220',
        ], [
            'nama_web.required' => 'Nama website harus diisi.',
            'nama_web.string' => 'Nama website harus berupa teks.',
            'nama_web.max' => 'Nama website tidak boleh lebih dari :max karakter.',
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari :max karakter.',
        ]);

        $setting = Setting::first();

        if (!$setting) {
            throw new \Exception('Pengaturan tidak ditemukan.');
        }

        $setting->nama_web = $validatedData['nama_web'];
        $setting->deskripsi = $validatedData['deskripsi'];
        $setting->save();

        if ($setting->wasChanged()) {
            return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
        } else {
            return redirect()->route('settings.index')->with('error', 'Tidak ada perubahan yang disimpan.');
        }
    }
}
