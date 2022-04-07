<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'library_id',
        'student_id',
        'time_in',
        'time_out'
    ];
    
    public function library()
    {

        return $this->belongsTo(Library::class);

    }
    public function student()
    {

        return $this->belongsTo(Student::class);

    }

    protected $casts = [
        'time_in' => 'datetime',
        'time_out' => 'datetime'
    ];
}
