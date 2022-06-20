<?php

namespace App\Models;

use Carbon\Carbon;
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
        'time_in' => 'datetime:H:i',
        'time_out' => 'datetime:H:i'
    ];

    protected  function setTimeInAttribute($value){
        $this->attributes['time_in'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }
}
