<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{

    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'tgl_peminjaman', 'tgl_pengembalian', 'status', 'deskripsi', 'user_id', 'total_denda', 'no_peminjaman', 'buku_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

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
        $attributes['no_peminjaman'] = self::generateBorrowNumber();

        return static::query()->create($attributes);
    }
}
