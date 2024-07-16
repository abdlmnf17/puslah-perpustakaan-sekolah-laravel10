<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returbuku extends Model
{
    use HasFactory;
    protected $table = 'returbuku';
    protected $fillable = [
        'peminjaman_id', 'status', 'deskripsi', 'photo'
    ];
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
