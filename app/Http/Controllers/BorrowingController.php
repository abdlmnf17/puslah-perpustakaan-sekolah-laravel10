<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Setting;
use App\Models\User;
use App\Models\Fine;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $settings = Setting::first();
        $peminjaman = Borrowing::query();

        // Filter peminjaman sesuai dengan role pengguna
        if (auth()->user()->role === 'siswa') {
            $peminjaman->where('user_id', auth()->user()->id);
        }

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $peminjaman->where('book_title', 'like', '%' . $searchTerm . '%');
        }

        if ($request->has('name') && !empty($request->name)) {
            $searchTermName = $request->name;
            $peminjaman->whereHas('user', function ($query) use ($searchTermName) {
                $query->where('name', 'like', '%' . $searchTermName . '%');
            });
        }

        if ($request->has('status') && !empty($request->status)) {
            $status = $request->status;
            $peminjaman->where('status', $status);
        }

        $peminjaman = $peminjaman->paginate(10);

        return view('borrowing.index', compact('peminjaman'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('borrowing.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
            'book_title' => 'required|string',
            'author' => 'required|string',
            'release_year' => 'required|string',
        ]);


        Borrowing::create([
            'user_id' => $validatedData['user_id'],
            'book_title' => $validatedData['book_title'],
            'release_year' => $validatedData['release_year'],
            'author' => $validatedData['author'],
            'borrow_date' => $validatedData['borrow_date'],
            'return_date' => $validatedData['return_date'],
            'status' => 'PENDING',
            'description' => 'Menunggu Persetujuan Admin',
            'total_fine' => 0.00,
        ]);


        return redirect()->route('peminjaman-buku.index')->with('success', 'Peminjaman buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrowing = Borrowing::findOrFail($id);
        // Ambil fine yang terkait dengan peminjaman ini
        $fines = $borrowing->fine; // asumsikan ada relasi fine di model Borrowing

        $users = User::all();

        return view('borrowing.show', compact('borrowing', 'users', 'fines'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $users = User::all();

        return view('borrowing.edit', compact('borrowing', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            // 'user_id' => 'required|exists:users,id',
            // 'borrow_date' => 'required|date',
            // 'return_date' => 'required|date|after:borrow_date',
            // 'book_title' => 'required|string',
            // 'author' => 'required|string',
            // 'release_year' => 'required|string',
            'status' => 'required',
            'description' => 'nullable|string',
            'total_fine' => 'required|numeric',
        ]);

        $borrowing = Borrowing::findOrFail($id);

        // $borrowing->user_id = $validatedData['user_id'];
        // $borrowing->borrow_date = $validatedData['borrow_date'];
        // $borrowing->return_date = $validatedData['return_date'];
        // $borrowing->book_title = $validatedData['book_title'];
        // $borrowing->author = $validatedData['author'];
        // $borrowing->release_year = $validatedData['release_year'];
        $borrowing->status = $validatedData['status'];
        $borrowing->description = $validatedData['description'];
        $borrowing->total_fine = $validatedData['total_fine'];

        $borrowing->save();

        return redirect()->route('peminjaman-buku.index')
            ->with('success', 'Data peminjaman buku berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = Borrowing::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman-buku.index')
            ->with('success', 'Data peminjaman buku berhasil dihapus.');
    }

    
}
