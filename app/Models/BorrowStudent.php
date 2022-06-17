<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowStudent extends Model
{
    use HasFactory;

    protected $fillable = [

        'book_copy_id',
        'library_id',
        'student_id',
        'date_borrowed',
        'date_expected',
        'date_returned'
    ];

    public function book_copy()
    {
        return $this->belongsTo(BookCopy::class);
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    protected $casts = [
        'date_borrowed' => 'datetime',
        'date_expected' => 'datetime',
        'date_returned' => 'datetime'
    ];
}
