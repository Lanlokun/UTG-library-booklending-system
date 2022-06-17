<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
//        'student_id',
        'fullName',
        'address',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function student_attendances()
    {
        return $this->hasMany(StudentAttendance::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
