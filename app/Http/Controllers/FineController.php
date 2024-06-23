<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fine;
use App\Models\Borrowing;

class FineController extends Controller
{
    public function create()
    {
        $borrowings = Borrowing::all();
        return view('fine.create', compact('borrowings'));
    }

       /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'borrowing_id' => 'required|exists:borrowings,id',
            'total' => 'required|numeric',
        ]);

        Fine::create([
            'description' => $validatedData['description'],
            'borrowing_id' => $validatedData['borrowing_id'],
            'total' => $validatedData['total'],
        ]);

        return redirect()->route('peminjaman-buku.index')->with('success', 'Denda Peminjaman buku berhasil ditambahkan.');
    }



}
