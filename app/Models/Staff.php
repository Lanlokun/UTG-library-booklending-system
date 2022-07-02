<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'address',
    ];

    public function staff_attendances()
    {
        return $this->hasMany(StaffAttendance::class);
    }

    public function student_attendances()
    {
        return $this->hasMany(StudentAttendance::class);
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
