<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'name',
        'email',
        'department'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
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
