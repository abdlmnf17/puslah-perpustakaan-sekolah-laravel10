<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;
    protected $fillable = [
       'description', 'borrowing_id', 'total'

    ];


    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }
}
