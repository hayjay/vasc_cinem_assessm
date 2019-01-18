<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = ['id'];

    public function cinemas()
    {
    	return $this->belongsToMany('App\Models\Cinema');
    }

    public function showtimes()
    {
    	return $this->hasMany('App\Models\Showtime');
    }
}
