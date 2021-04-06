<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'book_id',
        'date_of_borrowing',
        'date_expected_to_pay'
    ];

    public function books ()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function customers ()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
