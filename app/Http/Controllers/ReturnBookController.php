<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Returbuku;
use App\Models\Setting;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;

class ReturnBookController extends Controller
{
    public function index(Request $request)
    {

        $settings = Setting::first();
        $pengembalian = Returbuku::query();

        if (auth()->user()->role === 'siswa') {
            $pengembalian->whereHas('peminjaman', function ($query) {
                $query->where('user_id', auth()->user()->id);
            });
        }

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $pengembalian->whereHas('peminjaman.buku', function ($query) use ($searchTerm) {
                $query->where('nama_buku', 'like', '%' . $searchTerm . '%');
            });
        }


        if ($request->has('name') && !empty($request->name)) {
            $searchTermName = $request->name;
            $pengembalian->whereHas('peminjaman.user', function ($query) use ($searchTermName) {
                $query->where('nama', 'like', '%' . $searchTermName . '%');
            });
        }

        if ($request->has('status') && !empty($request->status)) {
            $status = $request->status;
            $pengembalian->where('status', $status);
        }

        $pengembalian = $pengembalian->get();

        return view('returnbook.index', compact('pengembalian'));
    }

    public function create()
    {
        $user = auth()->user();


        $peminjaman = Peminjaman::where('user_id', $user->id)->get();

        return view('returnbook.create', compact('peminjaman'));
    }


    public function show(string $id)
    {
        $pengembalian = Returbuku::findOrFail($id);


        return view('returnbook.show', compact('pengembalian'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'borrowing_id' => 'required',
            'status' => 'nullable',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); //
        }

        Returbuku::create([
            'peminjaman_id' => $request->input('borrowing_id'),
            'status' => 'PENDING',
            'deskripsi' => 'Belum Disetujui',
            'photo' => $photoPath,
        ]);

        return redirect()->route('pengembalian-buku.index')
            ->with('success', 'Data pengembalian buku berhasil disimpan. Silahkan tunggu persetujuan dari admin');
    }

    public function edit(string $id)
    {
        $pengembalian = Returbuku::findOrFail($id);

        return view('returnbook.edit', compact('pengembalian'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([

            'status' => 'required',
            'description' => 'nullable|string',

        ]);

        $pengembalian = Returbuku::findOrFail($id);

        $pengembalian->status = $validatedData['status'];
        $pengembalian->deskripsi = $validatedData['description'];


        $pengembalian->save();

        return redirect()->route('pengembalian-buku.index')
            ->with('success', 'Data pengembalian buku berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        $pengembalian = Returbuku::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('pengembalian-buku.index')
            ->with('success', 'Data pengembalian buku berhasil dihapus.');
    }
}
