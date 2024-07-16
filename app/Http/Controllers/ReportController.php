<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use PDF;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('report.index', compact('peminjaman'));
    }

    public function generatePDF(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $tanggal_mulai = Carbon::parse($request->input('start_date'));
        $tanggal_selesai = Carbon::parse($request->input('end_date'));

        $peminjaman = Peminjaman::whereBetween('tgl_peminjaman', [$tanggal_mulai, $tanggal_selesai])->get();

        $pdf = PDF::loadView('report.print', compact('peminjaman', 'tanggal_mulai', 'tanggal_selesai'));

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporan_peminjaman_'.$tanggal_mulai->format('Y-m-d').'_to_'.$tanggal_selesai->format('Y-m-d').'.pdf');
    }
}
