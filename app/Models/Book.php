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
        'edition',
        'category_id',
        'publisher_id',
        'author_1',
        'author_2',
        'etla',
        'place_of_pub',
        'year',
        'isbn',
        'class_no',
        'no_of_copies',
        'more_details'
    ];
}
