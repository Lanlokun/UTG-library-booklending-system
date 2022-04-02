<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'library_id',
        'staff_id',
        'time_in',
        'time_out'
    ];

    public function student()
    {

        return $this->belongsTo(Student::class);

    }
    public function library()
    {

        return $this->belongsTo(Library::class);

    }
    public function staff()
    {

        return $this->belongsTo(Staff::class);

    }
}
