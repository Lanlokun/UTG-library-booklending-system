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
        'more_details'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function book_copies()
    {
        return $this->hasMany(BookCopy::class);
    }

}
