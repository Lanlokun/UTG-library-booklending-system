<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'place_of_pub',
        'publishers',
        'year',
        'isbn',
        'class_no',
        'no_of_copies',
        'shelf_id'
    ];
}
