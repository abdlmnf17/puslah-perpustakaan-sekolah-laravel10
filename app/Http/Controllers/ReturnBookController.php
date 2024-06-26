<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Returbook;
use App\Models\Setting;
use App\Models\User;
use App\Models\Borrowing;

class ReturnBookController extends Controller
{
    public function index(Request $request)
    {

        $settings = Setting::first();
        $pengembalian = Returbook::query();

        if (auth()->user()->role === 'siswa') {
            $pengembalian->whereHas('borrowing', function ($query) {
                $query->where('user_id', auth()->user()->id);
            });
        }

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $pengembalian->whereHas('borrowing', function ($query) use ($searchTerm) {
                $query->where('book_title', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->has('name') && !empty($request->name)) {
            $searchTermName = $request->name;
            $pengembalian->whereHas('borrowing.user', function ($query) use ($searchTermName) {
                $query->where('name', 'like', '%' . $searchTermName . '%');
            });
        }

        if ($request->has('status') && !empty($request->status)) {
            $status = $request->status;
            $pengembalian->where('status', $status);
        }

        $pengembalian = $pengembalian->get(); // Ambil semua data yang telah difilter

        return view('returnbook.index', compact('pengembalian'));
    }

    public function create()
    {
        $user = auth()->user();


        $peminjaman = Borrowing::where('user_id', $user->id)->get();

        return view('returnbook.create', compact('peminjaman'));
    }


    public function show(string $id)
    {
        $pengembalian = Returbook::findOrFail($id);


        return view('returnbook.show', compact('pengembalian'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'borrowing_id' => 'required',
            'status' => 'nullable',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,gif|max:2048', // Contoh validasi untuk foto
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Menyimpan foto ke direktori yang ditentukan
        }

        // Simpan data berdasarkan logika yang sesuai dengan struktur data Anda
        Returbook::create([
            'borrowing_id' => $request->input('borrowing_id'),
            'status' => 'PENDING',
            'description' => 'Belum Disetujui',
            'photo' => $photoPath,
        ]);

        return redirect()->route('pengembalian-buku.index')
            ->with('success', 'Data pengembalian buku berhasil disimpan. Silahkan tunggu persetujuan dari admin');
    }

    public function edit(string $id)
    {
        $pengembalian = Returbook::findOrFail($id);

        return view('returnbook.edit', compact('pengembalian'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([

            'status' => 'required',
            'description' => 'nullable|string',

        ]);

        $pengembalian = Returbook::findOrFail($id);

        $pengembalian->status = $validatedData['status'];
        $pengembalian->description = $validatedData['description'];


        $pengembalian->save();

        return redirect()->route('pengembalian-buku.index')
            ->with('success', 'Data pengembalian buku berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        $pengembalian = Returbook::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('pengembalian-buku.index')
            ->with('success', 'Data pengembalian buku berhasil dihapus.');
    }
}
