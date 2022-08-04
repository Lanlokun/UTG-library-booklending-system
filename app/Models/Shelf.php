<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'capacity',
    ];

    public function book_copies()
    {
        return $this->hasMany(BookCopy::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
