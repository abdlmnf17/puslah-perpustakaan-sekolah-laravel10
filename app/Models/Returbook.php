<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returbook extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrowing_id', 'status', 'description', 'photo'
    ];
    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }
}
