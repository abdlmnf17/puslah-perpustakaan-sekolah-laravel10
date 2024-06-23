<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_title', 'author', 'release_year', 'borrow_date', 'return_date', 'status', 'description', 'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
