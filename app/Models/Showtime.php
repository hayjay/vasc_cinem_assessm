<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    protected $guarded = [];

    public function cinema()
    {
    	return $this->belongsTo('App\Models\Cinema');
    }

    public function movie()
    {
    	return $this->belongsTo('App\Models\Movie');
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = Carbon::parse($value)->format('H:i');
    }

    public function getStartTimeAttribute($value)
    {
        if ($value) return Carbon::parse($value)->format('H:i');
    } 

     public function setStopTimeAttribute($value)
    {
        $this->attributes['stop_time'] = Carbon::parse($value)->format('H:i');
    }

    public function getStopTimeAttribute($value)
    {
        if ($value) return Carbon::parse($value)->format('H:i');
    }  
}
