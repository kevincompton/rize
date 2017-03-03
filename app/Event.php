<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function chimes()
    {
        return $this->morphMany('App\Chime', 'chimeable');
    }
    
}
