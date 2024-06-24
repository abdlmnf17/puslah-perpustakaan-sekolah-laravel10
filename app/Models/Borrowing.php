<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_title', 'author', 'release_year', 'borrow_date', 'return_date', 'status', 'description', 'user_id', 'total_fine', 'borrow_number'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Method untuk meng-generate nomor peminjaman
    public static function generateBorrowNumber()
    {
        // Format nomor peminjaman: PEMINJAMAN-BUKU/TANGGAL DAN TAHUN SKRG/TERUS ANGKA ACAK
        $date = now()->format('Ymd'); // Format tanggal
        $random = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT); // Angka acak, padding menjadi 4 digit

        return "PEMINJAMAN-BUKU/{$date}/{$random}";
    }

    // Override metode create untuk meng-generate nomor peminjaman otomatis
    public static function create(array $attributes = [])
    {
        // Tambahkan nomor peminjaman ke atribut yang diberikan sebelum menyimpan
        $attributes['borrow_number'] = self::generateBorrowNumber();

        return static::query()->create($attributes);
    }


}
