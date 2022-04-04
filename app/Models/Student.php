<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'mat_number',
        'department',
        'email'
        
        
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}