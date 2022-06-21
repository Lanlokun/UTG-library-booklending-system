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
    public function setTimeInAttribute($value)
    {
        if($value)
        {
            $this->attributes['time_in'] =  Carbon::parse($value);
        }
        else
        {
            return $value;
        }

    }

    public function setTimeOutAttribute($value)
    {
        if($value)
        {
            $this->attributes['time_out'] =  Carbon::parse($value);
        }
        else
        {
            return $value;
        }
    }
    protected $casts = [
        'time_in' => 'datetime:H:i',
        'time_out' => 'datetime:H:i'
    ];

}
