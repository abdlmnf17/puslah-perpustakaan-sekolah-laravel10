<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = [
        'nama_buku', 'penulis', 'tahun_rilis',
    ];
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
    public function returbuku()
    {
        return $this->hasMany(Returbuku::class);
    }

}
