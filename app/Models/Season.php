<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'tmdb_id',
        'name',
        'slug',
        'poster_path',
        'season_number',
        'tv_show_id',

    ];

    public function setNameAttribute($value)
    {

        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function episode()
    {
        return $this->hasMany(Episode::class);
    }


}
