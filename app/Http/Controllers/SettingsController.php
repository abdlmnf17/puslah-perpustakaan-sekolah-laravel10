<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;


class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'webname' => 'required|string|max:30',
            'description' => 'nullable|string|max:220',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file logo
            'favicon' => 'nullable|mimes:ico|max:2048', // Validasi untuk file favicon
        ], [
            'webname.required' => 'Nama harus diisi.',
            'webname.string' => 'Nama  harus berupa teks.',
            'webname.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'description.max' => 'description tidak boleh lebih dari :max karakter.',
            'logo.image' => 'Logo harus berupa file gambar.',
            'logo.mimes' => 'Logo harus dalam format jpeg, png, jpg, atau gif.',
            'logo.max' => 'Ukuran logo tidak boleh lebih dari :max kilobyte.',
            'favicon.mimes' => 'Favicon harus dalam format .ico dan berukuran 32x32',
            'favicon.max' => 'Ukuran favicon tidak boleh lebih dari :max kilobyte.',
        ]);

        $setting = Setting::first();

        if (!$setting) {
            throw new \Exception('Pengaturan tidak ditemukan.');
        }

        $setting->webname = $request->input('webname');
        $setting->description = $request->input('description');

        // Handle unggah logo jika ada file yang diunggah
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logo', 'public'); // Simpan file logo di folder 'public/logos'

            // Hapus logo lama jika ada
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            // Simpan path logo yang baru di database
            $setting->logo = $logoPath;
        }

        // Handle unggah favicon jika ada file yang diunggah
        // Handle unggah favicon jika ada file yang diunggah
    if ($request->hasFile('favicon')) {
        $favicon = $request->file('favicon');
        $faviconPath = $favicon->storeAs('favicons', 'favicon.ico', 'public'); // Simpan file favicon dengan nama favicon.ico di folder 'public/favicons'

        // Hapus favicon lama jika ada
        if ($setting->favicon) {
            Storage::disk('public')->delete($setting->favicon);
        }

        // Simpan path favicon yang baru di database
        $setting->favicon = 'favicons/favicon.ico'; // Simpan path relatif ke favicon.ico di folder 'public/favicons'
    }

        $setting->save();

        if ($setting->wasChanged()) {
            return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
        } else {
            return redirect()->route('settings.index')->with('error', 'Tidak ada perubahan yang disimpan.');
        }
    }
}
