<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'name',
            'address'
        ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function student_attendances()
    {
        return $this->hasMany(StudentAttendance::class);
    }
    public function staff_attendances()
    {
        return $this->hasMany(StaffAttendance::class);
    }

    public function book_copies()
    {
        return $this->hasMany(BookCopy::class);
    }

    public function borrowStaffs()
    {
        return $this->hasMany(BorrowStaff::class);
    }
    public function borrowStudents()
    {
        return $this->hasMany(BorrowStudent::class);
    }
}
