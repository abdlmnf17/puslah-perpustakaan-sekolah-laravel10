<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReturnBookController;
use App\Models\Borrowing;
use App\Models\Returbook;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {



    Route::get('/peminjaman-buku', [BorrowingController::class, 'index'])->name('peminjaman-buku.index');
    Route::get('/peminjaman-buku/create', [BorrowingController::class, 'create'])->name('peminjaman-buku.create');
    Route::get('/peminjaman-buku/{id}', [BorrowingController::class, 'show'])->name('peminjaman-buku.show');
    Route::post('/peminjaman-buku', [BorrowingController::class, 'store'])->name('peminjaman-buku.store');

    Route::get('/pengembalian-buku', [ReturnbookController::class, 'index'])->name('pengembalian-buku.index');
    Route::get('/pengembalian-buku/create', [ReturnbookController::class, 'create'])->name('pengembalian-buku.create');
    Route::get('/pengembalian-buku/{id}', [ReturnbookController::class, 'show'])->name('pengembalian-buku.show');
    Route::post('/pengembalian-buku', [ReturnbookController::class, 'store'])->name('pengembalian-buku.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});
Route::middleware('auth', 'admin')->group(function () {

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('/peminjaman-buku/{id}/edit', [BorrowingController::class, 'edit'])->name('peminjaman-buku.edit');
    Route::put('/peminjaman-buku/{id}', [BorrowingController::class, 'update'])->name('peminjaman-buku.update');
    Route::delete('/peminjaman-buku/{id}', [BorrowingController::class, 'destroy'])->name('peminjaman-buku.destroy');

    Route::get('/pengembalian-buku/{id}/edit', [ReturnbookController::class, 'edit'])->name('pengembalian-buku.edit');
    Route::put('/pengembalian-buku/{id}', [ReturnbookController::class, 'update'])->name('pengembalian-buku.update');
    Route::delete('/pengembalian-buku/{id}', [ReturnbookController::class, 'destroy'])->name('pengembalian-buku.destroy');
    Route::put('/settings/add', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
    Route::get('/laporan-pdf', [ReportController::class, 'generatePDF'])->name('laporan.cetak');

});

require __DIR__.'/auth.php';
