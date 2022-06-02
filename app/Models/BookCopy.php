<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'number',
            'book_id',
            'library_id',
            'shelf_id',

        ];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function shelf()
    {
        return $this->belongsTo(Shelf::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }



}
