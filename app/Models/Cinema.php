<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
	protected $guarded = ['id'];

    public function movies()
    {
    	return $this->belongsToMany('App\Models\Movie');
    }

    public function showtimes()
    {
    	return $this->hasMany('App\Models\Showtime');
    }
}
