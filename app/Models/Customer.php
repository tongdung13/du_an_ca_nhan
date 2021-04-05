<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'customer_code',
        'school',
        'class',
        'address',
        'dob',
        'email',
        'cmnd'
    ];

    public function borrows ()
    {
        return $this->belongsTo(Borrow::class, 'customer_id');
    }
}
