<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_copy_id',
        'library_id',
        'student_id',
        'staff_id',
        'date_borrowed',
        'date_expected',
        'date_returned'
    ];
}
