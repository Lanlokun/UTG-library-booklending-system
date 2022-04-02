<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'copy_id',
        'book_id',
        'library_id',
        'shelf_id',

    ];
}
