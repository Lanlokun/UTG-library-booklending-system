<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'borrower_id',
        'is_staff',
        'date_borrowed',
        'date_expected',
        'date_returned'
    ];
}
