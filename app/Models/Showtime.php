<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    protected $guarded = ['id'];

    public function cinema()
    {
    	return $this->belongsTo('App\Models\Cinema');
    }

    public function movie()
    {
    	return $this->belongsTo('App\Models\Movie');
    }
}
