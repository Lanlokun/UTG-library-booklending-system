<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'library_id',
        'staff_id',
        'time_in',
        'time_out'
    ];

    public function library()
    {

        return $this->belongsTo(Library::class);

    }


    public function staff()
    {

        return $this->belongsTo(Staff::class);

    }

    protected $casts = [
        'time_in' => 'datetime',
        'time_out' => 'datetime'
    ];
}
