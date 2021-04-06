<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'image',
        'status',
        'description'
    ];

    public function borrows ()
    {
        return $this->belongsTo(Borrow::class, 'book_id');
    }
}
